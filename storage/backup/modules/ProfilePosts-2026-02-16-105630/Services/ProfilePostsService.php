<?php

namespace Flute\Modules\ProfilePosts\Services;

use Flute\Core\Database\Entities\User;
use Flute\Core\Modules\Notifications\Services\NotificationService;
use Flute\Modules\ProfilePosts\database\Entities\ProfileCommentReaction;
use Flute\Modules\ProfilePosts\database\Entities\ProfilePost;
use Flute\Modules\ProfilePosts\database\Entities\ProfilePostComment;
use Flute\Modules\ProfilePosts\database\Entities\ProfilePostReaction;
use Throwable;

class ProfilePostsService
{
    protected NotificationService $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function getPostsByWallUser(int $wallUserId, int $limit = 10, int $offset = 0): array
    {
        return ProfilePost::query()
            ->where('wall_user_id', $wallUserId)
            ->orderBy('created_at', 'DESC')
            ->limit($limit)
            ->offset($offset)
            ->load('wallUser')
            ->load('author')
            ->load('author.roles')
            ->load('reactions.user')
            ->load('comments.user')
            ->load('comments.user.roles')
            ->load('comments.reactions')
            ->fetchAll();
    }

    public function getPost(int $id, bool $fresh = false): ?ProfilePost
    {
        if ($fresh) {
            orm()->getHeap()->clean();
        }

        return ProfilePost::query()
            ->where('id', $id)
            ->load('wallUser')
            ->load('author')
            ->load('author.roles')
            ->load('reactions.user')
            ->load('comments.user')
            ->load('comments.user.roles')
            ->load('comments.reactions')
            ->fetchOne();
    }

    public function canPostOnWall(User $author, User $wallUser): array
    {
        if ($author->isBlocked()) {
            return ['allowed' => false, 'reason' => __('profile_posts.errors.you_are_banned')];
        }

        if ($author->id === $wallUser->id) {
            return ['allowed' => true, 'reason' => null];
        }

        return ['allowed' => true, 'reason' => null];
    }

    public function createPost(User $author, User $wallUser, string $content, ?string $image = null): ProfilePost
    {
        $post = new ProfilePost();
        $post->author = $author;
        $post->wallUser = $wallUser;
        $post->content = $content;
        $post->image = $image;
        $post->saveOrFail();

        if ($author->id !== $wallUser->id && config('profile_posts.notifications.post', true)) {
            $this->sendNotification(
                $wallUser,
                __('profile_posts.notifications.new_post_title'),
                __('profile_posts.notifications.new_post_content', ['user' => $author->name])
            );
        }

        return $post;
    }

    public function getPostsCount(int $wallUserId): int
    {
        return ProfilePost::query()
            ->where('wall_user_id', $wallUserId)
            ->count();
    }

    public function deletePost(ProfilePost $post): bool
    {
        foreach ($post->comments as $comment) {
            $comment->delete();
        }

        foreach ($post->reactions as $reaction) {
            $reaction->delete();
        }

        return $post->delete();
    }

    /**
     * Set reaction with explicit action.
     *
     * @param string $emojiId Emoji identifier (e.g. 'heart', 'fire')
     * @param string $action 'add' or 'remove'
     */
    public function setReaction(ProfilePost $post, User $user, string $emojiId, string $action): array
    {
        if (!ProfilePostReaction::isValidEmojiId($emojiId)) {
            return ['success' => false, 'error' => 'invalid_emoji'];
        }

        if (!in_array($action, ['add', 'remove'], true)) {
            return ['success' => false, 'error' => 'invalid_action'];
        }

        orm()->getHeap()->clean();

        $postId = $post->id;
        $userId = $user->id;

        if ($action === 'remove') {
            $existingReaction = ProfilePostReaction::query()
                ->where('post_id', $postId)
                ->where('user_id', $userId)
                ->where('emoji_id', $emojiId)
                ->fetchOne();

            if ($existingReaction) {
                try {
                    $existingReaction->delete();
                } catch (Throwable $e) {
                    logs()->error('ProfilePosts reaction delete failed: ' . $e->getMessage());
                }
            }

            orm()->getHeap()->clean();

            return ['success' => true, 'action' => 'removed', 'emojiId' => $emojiId];
        }

        // action === 'add'
        $userReactionsCount = ProfilePostReaction::query()
            ->where('post_id', $postId)
            ->where('user_id', $userId)
            ->count();

        $maxPerPost = (int) config('profile_posts.reactions.max_per_post', 3);

        if ($userReactionsCount >= $maxPerPost) {
            return ['success' => false, 'error' => 'max_reached'];
        }

        $existing = ProfilePostReaction::query()
            ->where('post_id', $postId)
            ->where('user_id', $userId)
            ->where('emoji_id', $emojiId)
            ->fetchOne();

        if ($existing) {
            return ['success' => true, 'action' => 'already_exists', 'emojiId' => $emojiId];
        }

        try {
            $reaction = new ProfilePostReaction();
            $reaction->post_id = $post->id;
            $reaction->user_id = $user->id;
            $reaction->emoji_id = $emojiId;
            $reaction->saveOrFail();
        } catch (Throwable $e) {
            if (is_debug()) {
                throw $e;
            }

            logs()->error('ProfilePosts reaction save failed: ' . $e->getMessage());

            return ['success' => false, 'error' => 'save_failed'];
        }

        orm()->getHeap()->clean();

        return ['success' => true, 'action' => 'added', 'emojiId' => $emojiId];
    }

    /**
     * Get reaction counts grouped by emoji ID
     */
    public function getReactionCounts(int $postId): array
    {
        $reactions = ProfilePostReaction::query()
            ->where('post_id', $postId)
            ->fetchAll();

        $counts = [];
        foreach ($reactions as $reaction) {
            $id = $reaction->emoji_id;
            $counts[$id] = ($counts[$id] ?? 0) + 1;
        }
        arsort($counts);

        return $counts;
    }

    /**
     * Get user's reaction emoji IDs for a post
     */
    public function getUserReactionIds(int $postId, int $userId): array
    {
        $reactions = ProfilePostReaction::query()
            ->where('post_id', $postId)
            ->where('user_id', $userId)
            ->fetchAll();

        return array_map(static fn ($r) => $r->emoji_id, $reactions);
    }

    public function addComment(ProfilePost $post, User $user, string $content): ProfilePostComment
    {
        $comment = new ProfilePostComment();
        $comment->post = $post;
        $comment->user = $user;
        $comment->content = $content;
        $comment->saveOrFail();

        if ($user->id !== $post->author->id && config('profile_posts.notifications.comment', true)) {
            $this->sendNotification(
                $post->author,
                __('profile_posts.notifications.new_comment_title'),
                __('profile_posts.notifications.new_comment_content', ['user' => $user->name])
            );
        }

        return $comment;
    }

    public function deleteComment(ProfilePostComment $comment): bool
    {
        $reactions = ProfileCommentReaction::query()
            ->where('comment_id', $comment->id)
            ->fetchAll();
        foreach ($reactions as $reaction) {
            $reaction->delete();
        }

        return $comment->delete();
    }

    public function getComment(int $id): ?ProfilePostComment
    {
        return ProfilePostComment::query()
            ->where('id', $id)
            ->load('post')
            ->load('user')
            ->fetchOne();
    }

    /**
     * Set reaction on a comment with explicit action.
     */
    public function setCommentReaction(ProfilePostComment $comment, User $user, string $emojiId, string $action): array
    {
        if (!ProfilePostReaction::isValidEmojiId($emojiId)) {
            return ['success' => false, 'error' => 'invalid_emoji'];
        }

        if (!in_array($action, ['add', 'remove'], true)) {
            return ['success' => false, 'error' => 'invalid_action'];
        }

        orm()->getHeap()->clean();

        $commentId = $comment->id;
        $userId = $user->id;

        if ($action === 'remove') {
            $existingReaction = ProfileCommentReaction::query()
                ->where('comment_id', $commentId)
                ->where('user_id', $userId)
                ->where('emoji_id', $emojiId)
                ->fetchOne();

            if ($existingReaction) {
                try {
                    $existingReaction->delete();
                } catch (Throwable $e) {
                    logs()->error('ProfilePosts comment reaction delete failed: ' . $e->getMessage());
                }
            }

            orm()->getHeap()->clean();

            return ['success' => true, 'action' => 'removed', 'emojiId' => $emojiId];
        }

        // action === 'add'
        $userReactionsCount = ProfileCommentReaction::query()
            ->where('comment_id', $commentId)
            ->where('user_id', $userId)
            ->count();

        $maxPerPost = (int) config('profile_posts.reactions.max_per_post', 3);

        if ($userReactionsCount >= $maxPerPost) {
            return ['success' => false, 'error' => 'max_reached'];
        }

        $existing = ProfileCommentReaction::query()
            ->where('comment_id', $commentId)
            ->where('user_id', $userId)
            ->where('emoji_id', $emojiId)
            ->fetchOne();

        if ($existing) {
            return ['success' => true, 'action' => 'already_exists', 'emojiId' => $emojiId];
        }

        try {
            $reaction = new ProfileCommentReaction();
            $reaction->comment_id = $comment->id;
            $reaction->user_id = $user->id;
            $reaction->emoji_id = $emojiId;
            $reaction->saveOrFail();
        } catch (Throwable $e) {
            if (is_debug()) {
                throw $e;
            }

            logs()->error('ProfilePosts comment reaction save failed: ' . $e->getMessage());

            return ['success' => false, 'error' => 'save_failed'];
        }

        orm()->getHeap()->clean();

        return ['success' => true, 'action' => 'added', 'emojiId' => $emojiId];
    }

    /**
     * Get reaction counts for a comment
     */
    public function getCommentReactionCounts(int $commentId): array
    {
        $reactions = ProfileCommentReaction::query()
            ->where('comment_id', $commentId)
            ->fetchAll();

        $counts = [];
        foreach ($reactions as $reaction) {
            $id = $reaction->emoji_id;
            $counts[$id] = ($counts[$id] ?? 0) + 1;
        }
        arsort($counts);

        return $counts;
    }

    /**
     * Get user's reaction emoji IDs for a comment
     */
    public function getUserCommentReactionIds(int $commentId, int $userId): array
    {
        $reactions = ProfileCommentReaction::query()
            ->where('comment_id', $commentId)
            ->where('user_id', $userId)
            ->fetchAll();

        return array_map(static fn ($r) => $r->emoji_id, $reactions);
    }

    protected function sendNotification(User $recipient, string $title, string $content): void
    {
        try {
            $this->notificationService->create(
                $recipient->id,
                'profile_post',
                $title,
                $content
            );
        } catch (Throwable $e) {
            logs()->warning('Failed to send profile posts notification: ' . $e->getMessage());
        }
    }
}
