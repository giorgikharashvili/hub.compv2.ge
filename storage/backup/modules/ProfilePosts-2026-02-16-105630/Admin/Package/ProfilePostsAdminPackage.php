<?php

namespace Flute\Modules\ProfilePosts\Admin\Package;

use Flute\Admin\Support\AbstractAdminPackage;

class ProfilePostsAdminPackage extends AbstractAdminPackage
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadRoutesFromFile('routes.php');
    }

    public function getPermissions(): array
    {
        return ['admin', 'admin.profile_posts'];
    }

    public function getMenuItems(): array
    {
        return [
            [
                'icon' => 'ph.bold.note-pencil-bold',
                'title' => __('profile_posts.admin.settings'),
                'url' => url('/admin/profile-posts/settings'),
            ],
        ];
    }

    public function getPriority(): int
    {
        return 106;
    }
}
