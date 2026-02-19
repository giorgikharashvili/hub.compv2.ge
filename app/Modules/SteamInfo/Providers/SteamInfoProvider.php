<?php

namespace Flute\Modules\SteamInfo\Providers;

use Flute\Core\Modules\Profile\Events\ProfileRenderEvent;
use Flute\Core\Support\ModuleServiceProvider;
use Flute\Modules\SteamInfo\Listeners\ProfileListener;

class SteamInfoProvider extends ModuleServiceProvider
{
    public array $extensions = [];

    public function boot(\DI\Container $container) : void
    {
        $this->bootstrapModule();

        $this->loadViews('Resources/views', 'steam-info');

        $this->loadScss('Resources/assets/scss/main.scss');

        events()->addListener(ProfileRenderEvent::NAME, [ProfileListener::class, 'handle']);
    }

    public function register(\DI\Container $container) : void
    {
    }
}