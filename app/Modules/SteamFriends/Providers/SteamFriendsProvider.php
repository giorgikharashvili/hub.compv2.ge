<?php

namespace Flute\Modules\SteamFriends\Providers;

use Flute\Core\Modules\Profile\Services\ProfileTabService;
use Flute\Core\Support\ModuleServiceProvider;
use Flute\Modules\SteamFriends\Tabs\SteamFriendsTab;

class SteamFriendsProvider extends ModuleServiceProvider
{
    public array $extensions = [];

    public function boot(\DI\Container $container) : void
    {
        if (!config('app.steam_api')) {
            logs()->warning('Steam API is not configured for SteamFriends module');
            return;
        }

        $this->bootstrapModule();

        $this->loadViews('Resources/views', 'steam-friends');

        $this->loadScss('Resources/assets/scss/main.scss');

        $profileTabService = $container->get(ProfileTabService::class);

        $profileTabService->registerTab(new SteamFriendsTab());
    }

    public function register(\DI\Container $container) : void
    {
    }
}