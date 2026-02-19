<?php

namespace Flute\Modules\ProfilePosts\Controllers;

use Flute\Core\Database\Entities\User;
use Flute\Core\Router\Annotations\Middleware;
use Flute\Core\Router\Annotations\Route;
use Flute\Core\Support\BaseController;
use Flute\Core\Support\FileUploader;
use Flute\Modules\ProfilePosts\database\Entities\ProfilePostReaction;
use Flute\Modules\ProfilePosts\Services\ProfilePostsService;
use Throwable;

#[Middleware('csrf')]
class ProfilePostsController extends BaseController
{
    protected ProfilePostsService $postsService;

    protected FileUploader $fileUploader;

    public function __construct(ProfilePostsService $postsService, FileUploader $fileUploader)
    {
        $this->postsService = $postsService;
        $this->fileUploader = $fileUploader;
    }

    #[Route('/profile-posts/wall/{wallUserId}', name: 'profile_posts.list', methods: ['GET'])]
    public function list(int $wallUserId)
    {
        $wallUser = rep(User::class)->findByPK($wallUserId);
        if (!$wallUser) {
            return $this->error(__('profile_posts.errors.user_not_found'), 404);
        }

        $page = max(1, (int) request()->input('page', 1));
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $posts = $this->postsService->getPostsByWallUser($wallUserId, $limit, $offset);
        $total = $this->postsService->getPostsCount($wallUserId);
        $hasMore = $offset + count($posts) < $total;

        $isWallOwner = user()->isLoggedIn() && user()->id === $wallUserId;
        $canPost = $this->checkCanPost($wallUser);

        if (request()->htmx()->isHtmxRequest()) {
            return $this->htmxRender('profile-posts::components.list', compact('posts', 'wallUser', 'isWallOwner', 'canPost', 'hasMore', 'page'))
                ->setReswap('innerHTML transition:true');
        }

        return view('profile-posts::index', compact('posts', 'wallUser', 'isWallOwner', 'canPost', 'hasMore', 'page'));
    }

    #[Route('/profile-posts/create/{wallUserId}', name: 'profile_posts.create', methods: ['POST'])]
    public function create(int $wallUserId)
    {
        if (!user()->isLoggedIn()) {
            return $this->htmxToastNoSwap(__('def.auth_required'), 403);
        }

        $wallUser = rep(User::class)->findByPK($wallUserId);
        if (!$wallUser) {
            return $this->htmxToastNoSwap(__('profile_posts.errors.user_not_found'), 404);
        }

        $author = user()->getCurrentUser();
        $canPostResult = $this->postsService->canPostOnWall($author, $wallUser);
        if (!$canPostResult['allowed']) {
            return $this->htmxToastNoSwap($canPostResult['reason'], 403);
        }

        $content = trim((string) request()->input('content'));
        $minLength = (int) config('profile_posts.wall.min_length', 1);
        $maxLength = (int) config('profile_posts.wall.max_length', 5000);

        if (!validator()->validate(['content' => $content], ['content' => "required|min-str-len:{$minLength}|max-str-len:{$maxLength}"])) {
            $errors = validator()->getErrors();

            return $this->htmxToastNoSwap($errors->first('content') ?? __('def.validation_error'), 422);
        }

        if (!$this->checkRateLimit('posts', (int) config('profile_posts.rate_limit.posts', 5))) {
            return $this->htmxToastNoSwap(__('profile_posts.errors.rate_limited'), 429);
        }

        $imagePath = null;
        $uploadedFile = request()->files->get('image');
        if ($uploadedFile && $uploadedFile->isValid() && config('profile_posts.images.enabled', true)) {
            try {
                $maxSize = (int) config('profile_posts.images.max_size', 5);
                $imagePath = $this->fileUploader->uploadImage($uploadedFile, $maxSize);
            } catch (Throwable $e) {
                return $this->htmxToastNoSwap($e->getMessage(), 422);
            }
        }

        $this->postsService->createPost($author, $wallUser, $content, $imagePath);
        $this->toast(__('profile_posts.messages.created'), 'success');

        $posts = $this->postsService->getPostsByWallUser($wallUserId, 10, 0);
        $isWallOwner = user()->id === $wallUserId;
        $canPost = $this->checkCanPost($wallUser);

        return $this->htmxRender('profile-posts::components.list', compact('posts', 'wallUser', 'isWallOwner', 'canPost'))
            ->setRetarget('#profile-posts-list')
            ->setReswap('innerHTML transition:true')
            ->setAfterSwapTriggers(['profile-posts:created' => true]);
    }

    #[Route('/profile-posts/{id}', name: 'profile_posts.delete', methods: ['DELETE'])]
    public function delete(int $id)
    {
        if (!user()->isLoggedIn()) {
            return $this->error(__('def.auth_required'), 403);
        }

        $post = $this->postsService->getPost($id);
        if (!$post) {
            return $this->error(__('profile_posts.errors.not_found'), 404);
        }

        if (!user()->can('admin.profile_posts') && $post->author->id !== user()->id && $post->wallUser->id !== user()->id) {
            return $this->error(__('def.access_denied'), 403);
        }

        $this->postsService->deletePost($post);

        if (request()->htmx()->isHtmxRequest()) {
            $this->toast(__('profile_posts.messages.deleted'), 'success');

            return $this->htmxRender('profile-posts::components.empty-card', ['id' => $id])
                ->setReswap('outerHTML transition:true');
        }

        return response()->json(['success' => true]);
    }

    #[Route('/profile-posts/{id}/react', name: 'profile_posts.react', methods: ['POST'])]
    public function react(int $id)
    {
        if (!user()->isLoggedIn()) {
            return $this->error(__('def.auth_required'), 403);
        }

        if (!config('profile_posts.reactions.enabled', true)) {
            return $this->error(__('profile_posts.errors.reactions_disabled'), 403);
        }

        $post = $this->postsService->getPost($id, true);
        if (!$post) {
            return $this->error(__('profile_posts.errors.not_found'), 404);
        }

        $emojiId = (string) request()->input('emojiId');
        if (!ProfilePostReaction::isValidEmojiId($emojiId)) {
            return $this->error(__('profile_posts.errors.invalid_reaction'), 422);
        }

        $action = (string) request()->input('action', 'add');
        if (!in_array($action, ['add', 'remove'], true)) {
            return $this->error(__('profile_posts.errors.invalid_action'), 422);
        }

        if (!$this->checkRateLimit('reactions', (int) config('profile_posts.rate_limit.reactions', 30))) {
            return $this->error(__('profile_posts.errors.rate_limited'), 429);
        }

        $result = $this->postsService->setReaction($post, user()->getCurrentUser(), $emojiId, $action);

        if (!$result['success']) {
            $errorKey = $result['error'] ?? 'unknown';
            $errorMessages = [
                'max_reached' => __('profile_posts.errors.max_reactions_reached'),
                'invalid_emoji' => __('profile_posts.errors.invalid_reaction'),
                'invalid_action' => __('profile_posts.errors.invalid_action'),
            ];

            return $this->error($errorMessages[$errorKey] ?? __('def.unknown_error'), 422);
        }

        // Get fresh data
        $reactionCounts = $this->postsService->getReactionCounts($id);
        $userReactionIds = $this->postsService->getUserReactionIds($id, user()->id);

        if (request()->htmx()->isHtmxRequest()) {
            $post = $this->postsService->getPost($id, true);
            $isWallOwner = $post->wallUser->id === user()->id;

            return $this->htmxRender('profile-posts::components.card', compact('post', 'isWallOwner'))
                ->setReswap('outerHTML transition:true');
        }

        return response()->json([
            'success' => true,
            'action' => $result['action'] ?? null,
            'emojiId' => $emojiId,
            'reactions' => $reactionCounts,
            'userReactions' => $userReactionIds,
            'emojiMap' => ProfilePostReaction::getAvailableEmojis(),
        ]);
    }

    #[Route('/profile-posts/{id}/comment', name: 'profile_posts.comment', methods: ['POST'])]
    public function comment(int $id)
    {
        if (!user()->isLoggedIn()) {
            return $this->htmxToastNoSwap(__('def.auth_required'), 403);
        }

        if (!config('profile_posts.comments.enabled', true)) {
            return $this->htmxToastNoSwap(__('profile_posts.errors.comments_disabled'), 403);
        }

        $post = $this->postsService->getPost($id);
        if (!$post) {
            return $this->error(__('profile_posts.errors.not_found'), 404);
        }

        $userEntity = user()->getCurrentUser();
        if ($userEntity->isBlocked()) {
            return $this->htmxToastNoSwap(__('profile_posts.errors.you_are_banned'), 403);
        }

        $content = trim((string) request()->input('content'));
        $maxLength = (int) config('profile_posts.comments.max_length', 1000);

        if (!validator()->validate(['content' => $content], ['content' => "required|min-str-len:1|max-str-len:{$maxLength}"])) {
            return $this->htmxToastNoSwap(__('profile_posts.errors.comment_required'), 422);
        }

        if (!$this->checkRateLimit('comments', (int) config('profile_posts.rate_limit.comments', 10))) {
            return $this->htmxToastNoSwap(__('profile_posts.errors.rate_limited'), 429);
        }

        $this->postsService->addComment($post, $userEntity, $content);

        if (request()->htmx()->isHtmxRequest()) {
            $post = $this->postsService->getPost($id, true);
            $isWallOwner = $post->wallUser->id === user()->id;

            return $this->htmxRender('profile-posts::components.card', compact('post', 'isWallOwner'))
                ->setReswap('outerHTML transition:true');
        }

        return response()->json(['success' => true]);
    }

    #[Route('/profile-posts/comment/{id}', name: 'profile_posts.comment.delete', methods: ['DELETE'])]
    public function deleteComment(int $id)
    {
        if (!user()->isLoggedIn()) {
            return $this->error(__('def.auth_required'), 403);
        }

        $comment = $this->postsService->getComment($id);
        if (!$comment) {
            return $this->error(__('profile_posts.errors.not_found'), 404);
        }

        $canDelete = user()->can('admin.profile_posts')
            || $comment->user->id === user()->id
            || $comment->post->author->id === user()->id
            || $comment->post->wallUser->id === user()->id;

        if (!$canDelete) {
            return $this->error(__('def.access_denied'), 403);
        }

        $postId = $comment->post->id;
        $this->postsService->deleteComment($comment);

        if (request()->htmx()->isHtmxRequest()) {
            $post = $this->postsService->getPost($postId, true);
            $isWallOwner = $post->wallUser->id === user()->id;

            return $this->htmxRender('profile-posts::components.card', compact('post', 'isWallOwner'))
                ->setReswap('outerHTML transition:true');
        }

        return response()->json(['success' => true]);
    }

    #[Route('/profile-posts/comment/{id}/react', name: 'profile_posts.comment.react', methods: ['POST'])]
    public function reactToComment(int $id)
    {
        if (!user()->isLoggedIn()) {
            return $this->error(__('def.auth_required'), 403);
        }

        if (!config('profile_posts.reactions.enabled', true)) {
            return $this->error(__('profile_posts.errors.reactions_disabled'), 403);
        }

        $comment = $this->postsService->getComment($id);
        if (!$comment) {
            return $this->error(__('profile_posts.errors.not_found'), 404);
        }

        $userEntity = user()->getCurrentUser();
        if ($userEntity->isBlocked()) {
            return $this->error(__('profile_posts.errors.you_are_banned'), 403);
        }

        $emojiId = (string) request()->input('emojiId');
        if (!ProfilePostReaction::isValidEmojiId($emojiId)) {
            return $this->error(__('profile_posts.errors.invalid_reaction'), 422);
        }

        $action = (string) request()->input('action');
        if (!in_array($action, ['add', 'remove'], true)) {
            return $this->error(__('profile_posts.errors.invalid_action'), 422);
        }

        if (!$this->checkRateLimit('reactions', (int) config('profile_posts.rate_limit.reactions', 30))) {
            return $this->error(__('profile_posts.errors.rate_limited'), 429);
        }

        $result = $this->postsService->setCommentReaction($comment, $userEntity, $emojiId, $action);

        if (!$result['success']) {
            $errorMsg = match ($result['error'] ?? 'unknown') {
                'max_reached' => __('profile_posts.errors.max_reactions_reached'),
                'invalid_emoji' => __('profile_posts.errors.invalid_reaction'),
                default => __('def.unknown_error'),
            };

            return $this->error($errorMsg, 422);
        }

        $reactionCounts = $this->postsService->getCommentReactionCounts($id);
        $userReactionIds = $this->postsService->getUserCommentReactionIds($id, user()->id);

        return response()->json([
            'success' => true,
            'action' => $result['action'] ?? null,
            'emojiId' => $emojiId,
            'reactions' => $reactionCounts,
            'userReactions' => $userReactionIds,
            'emojiMap' => ProfilePostReaction::getAvailableEmojis(),
        ]);
    }

    protected function checkRateLimit(string $type, int $limit): bool
    {
        if (user()->can('admin.boss')) {
            return true;
        }

        $key = "profile_posts_{$type}_" . user()->id;
        $lockDir = path('storage/app/cache/locks');
        if (!is_dir($lockDir)) {
            @mkdir($lockDir, 0o755, true);
        }

        $lockFile = $lockDir . '/' . md5($key) . '.lock';
        $lockHandle = @fopen($lockFile, 'c');

        if ($lockHandle && flock($lockHandle, LOCK_EX)) {
            $attempts = (int) cache()->get($key, 0);
            if ($attempts >= $limit) {
                flock($lockHandle, LOCK_UN);
                fclose($lockHandle);

                return false;
            }

            cache()->set($key, $attempts + 1, 60);

            flock($lockHandle, LOCK_UN);
            fclose($lockHandle);

            return true;
        }

        if ($lockHandle) {
            fclose($lockHandle);
        }

        $attempts = (int) cache()->get($key, 0);
        if ($attempts >= $limit) {
            return false;
        }

        cache()->set($key, $attempts + 1, 60);

        return true;
    }

    protected function htmxToastNoSwap(string $message, int $status = 422, string $type = 'error'): \Symfony\Component\HttpFoundation\Response
    {
        $this->toast($message, $type);

        if (request()->htmx()->isHtmxRequest()) {
            return response()->noContent($status, ['HX-Reswap' => 'none']);
        }

        return $this->error($message, $status);
    }

    protected function checkCanPost(User $wallUser): array
    {
        if (!user()->isLoggedIn()) {
            return ['allowed' => false, 'reason' => __('def.auth_required')];
        }

        $author = user()->getCurrentUser();

        return $this->postsService->canPostOnWall($author, $wallUser);
    }
}
