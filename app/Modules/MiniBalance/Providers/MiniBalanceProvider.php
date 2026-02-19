<?php

namespace Flute\Modules\MiniBalance\Providers;

use Flute\Core\Support\ModuleServiceProvider;
use Flute\Core\Template\Template;

class MiniBalanceProvider extends ModuleServiceProvider
{
    public array $extensions = [];

    public function boot(\DI\Container $container): void
    {
        if (!user()->isLoggedIn() || is_admin_path()) {
            return;
        }

        $this->bootstrapModule();

        $this->loadViews('Resources/views', 'mini-balance');

        $this->loadScss('Resources/assets/scss/main.scss');

        $template = $container->get(Template::class);

        if (method_exists($template, 'prependTemplateToSection')) {
            $template->prependTemplateToSection('navbar-actions', 'mini-balance::index');
        } else {
            $template->prependToSection('navbar-actions', $template->render('mini-balance::index'));
        }
    }

    public function register(\DI\Container $container): void
    {
    }
}
