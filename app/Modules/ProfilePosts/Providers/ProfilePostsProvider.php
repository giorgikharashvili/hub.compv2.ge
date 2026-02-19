<?php

namespace Flute\Modules\ProfilePosts\Providers;

use Flute\Core\Modules\Profile\Services\ProfileTabService;
use Flute\Core\Services\ConfigurationService;
use Flute\Core\Support\ModuleServiceProvider;
use Flute\Modules\ProfilePosts\Admin\Package\ProfilePostsAdminPackage;
use Flute\Modules\ProfilePosts\Services\ProfilePostsService;
use Flute\Modules\ProfilePosts\Tabs\ProfilePostsTab;

class ProfilePostsProvider extends ModuleServiceProvider
{
    public array $extensions = [];

    public function boot(\DI\Container $container): void
    {
        $this->bootstrapModule();

        $configPath = path('app/Modules/ProfilePosts/Resources/config/profile_posts.php');
        if (file_exists($configPath)) {
            app(ConfigurationService::class)->loadCustomConfig($configPath, 'profile_posts');
        }

        $container->set(ProfilePostsService::class, \DI\autowire(ProfilePostsService::class));

        $this->loadViews('Resources/views', 'profile-posts');

        $this->loadScss('Resources/assets/scss/main.scss');

        $jsFile = template()->getTemplateAssets()->assetFunction(
            path('app/Modules/ProfilePosts/Resources/assets/js/profile-posts.js')
        );
        template()->prependToSection('footer', $jsFile);

        $profileTabService = $container->get(ProfileTabService::class);
        $profileTabService->registerTab(new ProfilePostsTab());

        $this->loadPackage(new ProfilePostsAdminPackage());
    }

    public function register(\DI\Container $container): void
    {
    }
}
