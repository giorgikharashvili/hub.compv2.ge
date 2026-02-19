<?php

namespace Flute\Modules\Banners\Providers;

use Flute\Core\Support\ModuleServiceProvider;
use Flute\Modules\Banners\Widgets\BannersWidget;
use Flute\Modules\Banners\Http\Controllers\BannersController;

class BannersProvider extends ModuleServiceProvider
{
    public array $extensions = [];

    public function boot(\DI\Container $container): void
    {
        $this->bootstrapModule();

        $this->loadViews('Resources/views', 'banners');
        $this->loadTranslations();

        $this->loadScss('Resources/assets/scss/banners.scss');

        $jsFile = template()->getTemplateAssets()->assetFunction(
            path('app/Modules/Banners/Resources/assets/js/banners.js')
        );

        template()->addStyle(url('assets/css/libs/swiper.min.css'));
        template()->addScript(url('assets/js/libs/swiper.js'));

        template()->prependToSection('footer', $jsFile);

        router()->group([
            'prefix' => 'api/banners',
            'middleware' => ['auth', 'can:admin.system']
        ], function () {
            router()->post('upload', [BannersController::class, 'uploadImage']);
        });
    }

    public function register(\DI\Container $container): void {}
}
