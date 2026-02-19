<?php

namespace Flute\Modules\SteamFriends\Tabs;

use Flute\Core\Database\Entities\User;
use Flute\Core\Modules\Profile\Support\ProfileTab;
use Flute\Modules\SteamFriends\Services\SteamFriendsService;

class SteamFriendsTab extends ProfileTab
{
    public function getId() : string
    {
        return 'steam-friends';
    }

    public function getPath() : string
    {
        return 'steam-friends';
    }

    public function getTitle() : string
    {
        return __('steamfriends.title');
    }

    public function getIcon() : string|null
    {
        return 'ph.regular.users';
    }

    public function getContent(User $user) : string
    {
        $steamFriendsService = app()->get(SteamFriendsService::class);

        $steamSocial = $user->getSocialNetwork('Steam');

        return view('steam-friends::index', [
            'friends' => $steamSocial ? $steamFriendsService->getFriends($steamSocial->value) : []
        ])->render();
    }
}
