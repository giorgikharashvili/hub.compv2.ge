<?php

namespace Flute\Modules\SteamEnter\Providers;

use Flute\Core\Support\ModuleServiceProvider;
use Flute\Core\Template\Template;

class SteamEnterProvider extends ModuleServiceProvider
{
    public array $extensions = [];

    public function boot(\DI\Container $container): void
    {
        $this->bootstrapModule();

        if (!user()->isLoggedIn() || is_admin_path()) {
            return;
        }

        if (!user()->hasSocialNetwork('Steam')) {
            $template = $container->get(Template::class);

            $this->loadViews('Resources/views', 'steamenter');
            $this->loadScss('Resources/assets/scss/main.scss');

            if (method_exists($template, 'prependYoyoToSection')) {
                $template->prependYoyoToSection('before-content', 'enter-steam');
            } else {
                $template->prependToSection('before-content', $template->render('enter-steam'));
            }
        }
    }

    public function register(\DI\Container $container): void
    {
    }
}
