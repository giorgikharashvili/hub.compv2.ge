<!DOCTYPE html>
<html lang="<?php echo e(strtolower(app()->getLang())); ?>"
    <?php if(config('app.change_theme', true)): ?> data-theme="<?php echo e(cookie()->get('theme', config('app.default_theme', 'dark'))); ?>" <?php else: ?> data-theme="<?php echo e(config('app.default_theme', 'dark')); ?>" <?php endif; ?>>

<head hx-head="append">
    <title>
        <?php echo $__env->yieldContent('title', __(empty(page()->title) ? config('app.name') : page()->title)); ?>

        <?php if (! empty(trim($__env->yieldContent('title')))): ?>
            - <?php echo e(config('app.name')); ?>

        <?php endif; ?>

        <?php if(page()->title): ?>
            - <?php echo e(config('app.name')); ?>

        <?php endif; ?>
    </title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport"
        content="minimum-scale=1, initial-scale=1, width=device-width, shrink-to-fit=no, user-scalable=no, viewport-fit=cover">
    <meta name="view-transition" content="same-origin">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="auth" id="auth" content="<?php echo e(user()->isLoggedIn()); ?>">
    <meta name="google" content="notranslate" />

    <meta name="description" content="<?php echo $__env->yieldContent('description', __(empty(page()->description) ? config('app.description') : page()->description)); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords', page()->keywords ?? config('app.keywords')); ?>">
    <meta name="robots"
        content="<?php if(config('app.maintenance_mode')): ?> noindex, nofollow <?php else: ?> <?php echo $__env->yieldContent('robots', page()->robots ?? config('app.robots', 'index, follow')); ?> <?php endif; ?>">
    <meta name="author" content="Flames">

    <meta property="og:title" content="<?php echo $__env->yieldContent('title', __(empty(page()->title) ? config('app.name') : page()->title)); ?>">
    <meta property="og:description" content="<?php echo $__env->yieldContent('description', __(empty(page()->description) ? config('app.description') : page()->description)); ?>">
    <meta property="og:image" content="<?php echo $__env->yieldContent('og_image', page()->og_image ?? asset('assets/img/social-image.png')); ?>">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta property="og:type" content="<?php echo $__env->yieldContent('og_type', 'website'); ?>">
    <meta property="og:site_name" content="<?php echo e(config('app.name')); ?>">
    <meta property="og:locale" content="<?php echo e(strtolower(app()->getLang())); ?>">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $__env->yieldContent('title', __(empty(page()->title) ? config('app.name') : page()->title)); ?>">
    <meta name="twitter:description" content="<?php echo $__env->yieldContent('description', __(empty(page()->description) ? config('app.description') : page()->description)); ?>">
    <meta name="twitter:image" content="<?php echo $__env->yieldContent('twitter_image', page()->og_image ?? asset('assets/img/social-image.png')); ?>">

    <meta name="htmx-config"
        content='{
        "defaultFocusScroll": false,
        "scrollIntoViewOnBoost": false,
        "refreshOnHistoryMiss": true,
        "historyCacheSize": 0
    }'>
    <meta name="site_url" content="<?php echo e(config('app.url')); ?>">

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "<?php echo $__env->yieldContent('schema_type', 'WebPage'); ?>",
        "name": "<?php echo $__env->yieldContent('title', __(page()->title ?? config('app.name'))); ?>",
        "description": "<?php echo $__env->yieldContent('description', __(page()->description ?? config('app.description'))); ?>",
        "url": "<?php echo e(url()->current()); ?>",
        "inLanguage": "<?php echo e(strtolower(app()->getLang())); ?>",
        "isPartOf": {
            "@type": "WebSite",
            "name": "<?php echo e(config('app.name')); ?>",
            "url": "<?php echo e(config('app.url')); ?>"
        }
    }
    </script>

    <?php echo $__env->yieldContent('meta'); ?>
    <?php echo $__env->yieldPushContent('head'); ?>

    <?php if(isset($sections['head'])): ?>
        <?php echo $sections['head']; ?>

    <?php endif; ?>

    <link rel="icon" type="image/x-icon" href="<?php echo asset('favicon.ico'); ?>">
    <link rel="canonical" href="<?php echo $__env->yieldContent('canonical', url()->current()); ?>">
    <link rel="alternate" href="<?php echo e(url()->current()); ?>" hreflang="x-default">

    <?php $__currentLoopData = config('lang.available'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <link rel="alternate" href="<?php echo e(url()->addParams(['lang' => $lang])); ?>" hreflang="<?php echo e(strtolower($lang)); ?>">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php echo $__env->make('flute::partials.background', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(tt('assets/sass/app.scss'), false); ?>

        <script src="<?php echo asset('assets/js/htmx/core.js'); ?>"></script>
        <script src="<?php echo e(Clickfwd\Yoyo\Services\Configuration::yoyoSrc()); ?>"></script>

        <script src="<?php echo asset('assets/js/htmx/head.js'); ?>"></script>
        <script src="<?php echo asset('assets/js/htmx/idiomorph.js'); ?>"></script>

        <script src="<?php echo asset('assets/js/htmx/loadingState.js'); ?>"></script>

        <?php echo Clickfwd\Yoyo\Services\Configuration::javascriptInitCode() ?>
    <?php endif; ?>

    <?php echo $__env->make('flute::partials.colors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body hx-ext="head-support, loading-states, morph" hx-headers='{"X-CSRF-Token": "<?php echo e(csrf_token()); ?>"}' itemscope
    itemtype="https://schema.org/WebPage">
    <?php if (\Illuminate\Support\Facades\Blade::check('can', 'admin.pages')): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.page-edit-nav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('page-edit-nav'); ?>
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
    <?php endif; ?>

    <?php echo $__env->renderWhen(!request()->htmx()->isHtmxRequest(), 'flute::layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

    <main id="main" class="main-animation" hx-history-elt>
        <?php echo $__env->renderWhen(!request()->htmx()->isHtmxRequest(), 'flute::partials.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

        <?php echo $__env->yieldPushContent('before-content'); ?>

        <?php if(isset($sections['before-content'])): ?>
            <?php echo $sections['before-content']; ?>

        <?php endif; ?>

        <?php echo $__env->make('flute::partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldPushContent('content'); ?>

        <?php if(isset($sections['content'])): ?>
            <?php echo $sections['content']; ?>

        <?php endif; ?>
    </main>

    <?php echo $__env->yieldPushContent('content-after'); ?>

    <?php if(isset($sections['content-after'])): ?>
        <?php echo $sections['content-after']; ?>

    <?php endif; ?>

    <?php if(!request()->htmx()->isHtmxRequest()): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.right-sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

        <div id="alerts-container">
            <?php echo $__env->yieldPushContent('toast-container'); ?>

            <?php if(isset($sections['toast-container'])): ?>
                <?php echo $sections['toast-container']; ?>

            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div id="modals">
        <?php echo $__env->yieldPushContent('modals'); ?>

        <?php if(isset($sections['modals'])): ?>
            <?php echo $sections['modals']; ?>

        <?php endif; ?>
    </div>

    <?php echo $__env->renderWhen(!request()->htmx()->isHtmxRequest(), 'flute::layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

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
        </footer>

        <script src="<?php echo asset('assets/js/libs/a11y-dialog.js'); ?>" defer></script>
        <script src="<?php echo asset('assets/js/libs/floating.js'); ?>" defer></script>
        <script src="<?php echo asset('jquery'); ?>"></script>
        <script src="<?php echo asset('assets/js/app.js'); ?>" defer></script>
        <script src="<?php echo asset('assets/js/libs/filepond-image-preview.js'); ?>" defer></script>
        <script src="<?php echo asset('assets/js/libs/filepond-validate.js'); ?>" defer></script>
        <script src="<?php echo asset('assets/js/libs/filepond.js'); ?>" defer></script>
        <script src="<?php echo asset('assets/js/libs/notyf.js'); ?>" defer></script>
        <script src="<?php echo asset('assets/js/libs/nprogress.js'); ?>" defer></script>

        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(tt('assets/scripts/libs/simplebar.js'), false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(tt('assets/scripts/libs/choices.js'), false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(tt('assets/scripts/libs/tinycolor.js'), false); ?>

        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(tt('assets/scripts/helpers.js'), false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(tt('assets/scripts/bottom-sheet.js'), false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(tt('assets/scripts/user-card.js'), false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(tt('assets/scripts/tabs.js'), false); ?>

        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(tt('assets/scripts/app.js'), false); ?>

        <?php echo $__env->yieldPushContent('scripts'); ?>

        <?php if(isset($sections['scripts'])): ?>
            <?php echo $sections['scripts']; ?>

        <?php endif; ?>
    <?php endif; ?>
</body>

</html>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/layouts/error.blade.php ENDPATH**/ ?>