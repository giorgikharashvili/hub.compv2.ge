<?php

namespace Flute\Modules\ProfilePosts\Tabs;

use Flute\Core\Database\Entities\User;
use Flute\Core\Modules\Profile\Support\ProfileTab;
use Flute\Modules\ProfilePosts\Services\ProfilePostsService;

class ProfilePostsTab extends ProfileTab
{
    public function getId(): string
    {
        return 'profile-posts';
    }

    public function getPath(): string
    {
        return 'wall';
    }

    public function getTitle(): string
    {
        return __('profile_posts.tab.title');
    }

    public function getIcon(): ?string
    {
        return 'ph.regular.note-pencil';
    }

    public function getOrder(): int
    {
        return 50;
    }

    public function getContent(User $user): string
    {
        $postsService = app()->get(ProfilePostsService::class);

        $posts = $postsService->getPostsByWallUser($user->id, 10, 0);
        $total = $postsService->getPostsCount($user->id);
        $hasMore = count($posts) < $total;
        $isWallOwner = user()->isLoggedIn() && user()->id === $user->id;
        $page = 1;

        $canPost = ['allowed' => false, 'reason' => __('def.auth_required')];
        if (user()->isLoggedIn()) {
            $author = rep(User::class)->findByPK(user()->id);
            $canPost = $postsService->canPostOnWall($author, $user);
        }

        return view('profile-posts::index', [
            'posts' => $posts,
            'wallUser' => $user,
            'isWallOwner' => $isWallOwner,
            'canPost' => $canPost,
            'hasMore' => $hasMore,
            'page' => $page,
        ])->render();
    }
}
