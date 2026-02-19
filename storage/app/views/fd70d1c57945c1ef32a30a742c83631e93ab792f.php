<!DOCTYPE html>
<html lang="<?php echo e(app()->getLang()); ?>" data-theme="<?php echo e(cookie()->get('theme', 'dark')); ?>"
    data-color-scheme="<?php echo e(cookie()->get('color-scheme', 'default')); ?>">

<head hx-head="append">
    <title>
        <?php echo $__env->yieldContent('title', __(page()->title ?? config('app.name'))); ?>
        <?php if (! empty(trim($__env->yieldContent('title')))): ?>
            - <?php echo e(config('app.name')); ?>

        <?php endif; ?>
    </title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <meta name="view-transition" content="same-origin">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="auth" id="auth" content="<?php echo e(user()->isLoggedIn()); ?>">
    <meta name="application-name" content="<?php echo e(config('app.name')); ?>">
    <meta name="apple-mobile-web-app-title" content="<?php echo e(config('app.name')); ?>">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="color-scheme" content="dark light">
    <meta name="supported-color-schemes" content="dark light">

    <?php echo $__env->yieldPushContent('head'); ?>

    <?php if(isset($sections['head'])): ?>
        <?php echo $sections['head']; ?>

    <?php endif; ?>

    <meta name="description" content="<?php echo e(__(page()->description ?? '')); ?>">
    <meta name="keywords" content="<?php echo e(page()->keywords ?? ''); ?>">
    <meta name="robots" content="<?php echo e(page()->robots ?? ''); ?>">
    <meta property="og:title" content="<?php echo e(__(page()->og_title ?? '')); ?>">
    <meta property="og:description" content="<?php echo e(__(page()->og_description ?? '')); ?>">
    <meta property="og:image" content="<?php echo e(page()->og_image); ?>">

    <meta name="htmx-config"
        content='{
        "defaultFocusScroll": false,
        "scrollIntoViewOnBoost": false,
        "refreshOnHistoryMiss": true,
        "historyCacheSize": 0
    }'>
    <meta name="site_url" content="<?php echo e(config('app.url')); ?>">

    <link rel="icon" type="image/x-icon" href="<?php echo asset('favicon.ico'); ?>">

    <?php echo $__env->yieldPushContent('styles'); ?>

    <?php if(isset($sections['styles'])): ?>
        <?php echo $sections['styles']; ?>

    <?php endif; ?>

    
    <?php if(request()->htmx()->isHtmxRequest()): ?>
        <?php echo $__env->yieldPushContent('scripts'); ?>

        <?php if(isset($sections['scripts'])): ?>
            <?php echo $sections['scripts']; ?>

        <?php endif; ?>
    <?php endif; ?>

    <?php if(!request()->htmx()->isHtmxRequest()): ?>
        <link rel="stylesheet" href="<?php echo asset('assets/fonts/manrope/manrope.css'); ?>">
        <link rel="stylesheet" href="<?php echo asset('animate'); ?>" type='text/css'>
        <link rel="stylesheet" href="<?php echo asset('grid'); ?>" type='text/css'>
        <link rel="stylesheet" href="<?php echo asset('assets/css/libs/filepond.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo asset('assets/css/libs/easymde.min.css'); ?>">

        
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction('Core/Modules/Admin/Resources/assets/sass/admin.scss', false); ?>

        <script src="<?php echo asset('assets/js/htmx/core.js'); ?>"></script>
        <script src="<?php echo e(Clickfwd\Yoyo\Services\Configuration::yoyoSrc()); ?>"></script>

        <script src="<?php echo asset('assets/js/htmx/head.js'); ?>"></script>
        <script src="<?php echo asset('assets/js/htmx/idiomorph.js'); ?>"></script>

        <script src="<?php echo asset('assets/js/htmx/loadingState.js'); ?>"></script>

        <?php echo Clickfwd\Yoyo\Services\Configuration::javascriptInitCode() ?>
    <?php endif; ?>

    <script>
        (function() {
            function updateThemeColor() {
                var m = document.querySelector('meta[name="theme-color"]#theme-color-meta');
                if (!m) {
                    m = document.createElement('meta');
                    m.setAttribute('name', 'theme-color');
                    m.id = 'theme-color-meta';
                    document.head.appendChild(m)
                }
                var bg = getComputedStyle(document.documentElement).getPropertyValue('--background').trim() ||
                '#1c1c1e';
                m.setAttribute('content', bg);
                var ms1 = document.querySelector('meta[name="msapplication-TileColor"]');
                if (ms1) {
                    ms1.setAttribute('content', bg)
                }
                var ms2 = document.querySelector('meta[name="msapplication-navbutton-color"]');
                if (ms2) {
                    ms2.setAttribute('content', bg)
                }
            }
            document.addEventListener('DOMContentLoaded', updateThemeColor);
            var o = new MutationObserver(updateThemeColor);
            o.observe(document.documentElement, {
                attributes: true,
                attributeFilter: ['data-theme']
            });
            window.addEventListener('flute:theme-changed', updateThemeColor);
        })();
    </script>
</head>

<body hx-ext="head-support, loading-states, morph" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
    'sidebar-collapsed' =>
        cookie()->get('admin-sidebar-collapsed', 'false') === 'true' &&
        !user()->device()->isMobile(),
]) ?>">
    <?php echo $__env->renderWhen(!request()->htmx()->isHtmxRequest(), 'admin::layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

    <?php if(!request()->htmx()->isHtmxRequest()): ?>
        <main>
    <?php endif; ?>
    <?php echo $__env->renderWhen(!request()->htmx()->isHtmxRequest(), 'admin::layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

    <?php echo $__env->renderWhen(!request()->htmx()->isHtmxRequest(), 'admin::partials.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

    <?php echo $__env->yieldContent('before-content'); ?>

    <?php if(isset($sections['before-content'])): ?>
        <?php echo $sections['before-content']; ?>

    <?php endif; ?>

    <?php echo $__env->make('admin::partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(is_development() && !request()->htmx()->isHtmxRequest()): ?>
        <div class="container mt-2">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.alert','data' => ['type' => 'warning','onlyBorders' => true,'withClose' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'warning','onlyBorders' => true,'withClose' => 'false']); ?>
                <?php echo e(__('def.debug_message')); ?> (development mode)
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="main-animation <?php if(cookie()->get('container-width', 'normal') === 'wide'): ?> container-wide <?php endif; ?> container" id="main"
        hx-history-elt>
        <?php echo $__env->yieldPushContent('content'); ?>

        <?php if(isset($sections['content'])): ?>
            <?php echo $sections['content']; ?>

        <?php endif; ?>

        <footer class="d-flex flex-center flex-column text-muted mb-4 mt-4" hx-swap="none">
            <p>
                © <?php echo e(date('Y')); ?> Flute. Version: <strong><?php echo e(app()->getVersion()); ?></strong>.
            </p>
            <p>Developed by <a class="hover-accent" href="https://github.com/FlamesONE" target="_blank">Flames</a> with
                <span class="secret-confetti cursor-pointer" id="secret-confetti">❤️</span>.
            </p>
            <?php
                $startTime = microtime(true);
                $executionTime = round($startTime - FLUTE_START, 2);
                $times = [];

                foreach (app()->getBootTimes() as $key => $value) {
                    $key = explode('\\', $key);
                    $key = end($key);
                    $key = str_replace('ServiceProvider', '', $key);
                    $times[] = "[{$key}] {$value}ms";
                }
            ?>
            <small class="text-muted mt-3">Booted in <strong
                    data-tooltip="<?php echo implode("\n", $times); ?>"><?php echo e($executionTime); ?></strong> seconds

                <?php if($executionTime > 1): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.popover','data' => ['content' => ''.__('admin.performance_info').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['content' => ''.__('admin.performance_info').'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php endif; ?>
            </small>
        </footer>
    </div>

    <?php echo $__env->renderWhen(!request()->htmx()->isHtmxRequest(), 'admin::layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
    <?php if(!request()->htmx()->isHtmxRequest()): ?>
        </main>
    <?php endif; ?>

    <?php echo $__env->yieldPushContent('content-after'); ?>

    <?php if(isset($sections['content-after'])): ?>
        <?php echo $sections['content-after']; ?>

    <?php endif; ?>

    <?php if(!request()->htmx()->isHtmxRequest()): ?>
        <div id="alerts-container">
            <?php echo $__env->yieldPushContent('toast-container'); ?>

            <?php if(isset($sections['toast-container'])): ?>
                <?php echo $sections['toast-container']; ?>

            <?php endif; ?>
        </div>

        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.right-sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('right-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

        <?php echo $__env->make('admin::partials.confirmation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin::partials.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin::partials.scrollup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin::partials.customization', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php if(!request()->htmx()->isHtmxRequest()): ?>
        <footer>
            <?php
                if (is_debug()) {
                    Tracy\Debugger::renderLoader();
                }
            ?>

            <?php echo $__env->yieldPushContent('footer'); ?>

            <?php if(isset($sections['footer'])): ?>
                <?php echo $sections['footer']; ?>

            <?php endif; ?>

            <?php echo $__env->make('admin::components.richtext-icons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </footer>

        <script src="<?php echo asset('assets/js/libs/a11y-dialog.js'); ?>" defer></script>
        <script src="<?php echo asset('assets/js/libs/floating.js'); ?>" defer></script>
        <script src="<?php echo asset('jquery'); ?>" defer></script>
        <script src="<?php echo asset('assets/js/app.js'); ?>" defer></script>
        <script src="<?php echo asset('assets/js/libs/filepond-image-preview.js'); ?>" defer></script>
        <script src="<?php echo asset('assets/js/libs/filepond-validate.js'); ?>" defer></script>
        <script src="<?php echo asset('assets/js/libs/filepond.js'); ?>" defer></script>
        <script src="<?php echo asset('assets/js/libs/notyf.js'); ?>" defer></script>
        <script src="<?php echo asset('assets/js/libs/nprogress.js'); ?>" defer></script>
        <script src="<?php echo asset('assets/js/libs/sortable.js'); ?>" defer></script>
        <script src="<?php echo asset('assets/js/libs/confetti.js'); ?>" defer></script>
        <script src="<?php echo asset('assets/js/libs/tom-select.js'); ?>" defer></script>
        <script src="<?php echo asset('assets/js/libs/easymde.js'); ?>" defer></script>
        <!-- <script src="<?php echo asset('assets/js/libs/flatpickr.js'); ?>" defer></script> -->
        <script src="<?php echo asset('assets/js/libs/pickr.js'); ?>" defer></script>

        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction('Core/Modules/Admin/Resources/assets/js/helpers.js', false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction('Core/Modules/Admin/Resources/assets/js/modals.js', false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction('Core/Modules/Admin/Resources/assets/js/tabs.js', false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction('Core/Modules/Admin/Resources/assets/js/popover.js', false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction('Core/Modules/Admin/Resources/assets/js/columns.js', false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction('Core/Modules/Admin/Resources/assets/js/selection.js', false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction('Core/Modules/Admin/Resources/assets/js/script.js', false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction('Core/Modules/Admin/Resources/assets/js/sidebar.js', false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction('Core/Modules/Admin/Resources/assets/js/sortable.js', false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction('Core/Modules/Admin/Resources/assets/js/search.js', false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction('Core/Modules/Admin/Resources/assets/js/secret.js', false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction('Core/Modules/Admin/Resources/assets/js/scrollup.js', false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction('Core/Modules/Admin/Resources/assets/js/select.js', false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction('Core/Modules/Admin/Resources/assets/js/table-search.js', false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction('Core/Modules/Admin/Resources/assets/js/richtext.js', false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction('Core/Modules/Admin/Resources/assets/js/customization.js', false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction('Core/Modules/Admin/Resources/assets/js/confirm.js', false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction('Core/Modules/Admin/Resources/assets/js/input.js', false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction('Core/Modules/Admin/Resources/assets/js/dirty.js', false); ?>

        <?php echo $__env->make('admin::partials.toasts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldPushContent('scripts'); ?>

        <?php if(isset($sections['scripts'])): ?>
            <?php echo $sections['scripts']; ?>

        <?php endif; ?>
    <?php endif; ?>
</body>

</html>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Core/Modules/Admin/Resources/views/app.blade.php ENDPATH**/ ?>