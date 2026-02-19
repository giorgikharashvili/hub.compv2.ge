<!DOCTYPE html>
<html lang="<?php echo e(strtolower(app()->getLang())); ?>"
    <?php if(config('app.change_theme', true)): ?> data-theme="<?php echo e(cookie()->get('theme', config('app.default_theme', 'dark'))); ?>"
    <?php else: ?> data-theme="<?php echo e(config('app.default_theme', 'dark')); ?>" <?php endif; ?>>

<head hx-head="append">
    <?php
        // --- Title ---
        $_final_title = page()->title;
        if (empty($_final_title) && \Illuminate\Support\Facades\View::hasSection('title')) {
            $_final_title = trim(\Illuminate\Support\Facades\View::yieldContent('title'));
        }
        if (empty($_final_title)) {
            $_final_title = config('app.name');
        }
        $_final_title = __($_final_title);

        // --- Description ---
        $_final_description = page()->description;
        if (empty($_final_description) && \Illuminate\Support\Facades\View::hasSection('description')) {
            $_final_description = trim(\Illuminate\Support\Facades\View::yieldContent('description'));
        }
        if (empty($_final_description)) {
            $_final_description = config('app.description');
        }
        $_final_description = __($_final_description);

        // --- Keywords ---
        $_final_keywords = page()->keywords;
        if (empty($_final_keywords) && \Illuminate\Support\Facades\View::hasSection('keywords')) {
            $_final_keywords = trim(\Illuminate\Support\Facades\View::yieldContent('keywords'));
        }
        if (empty($_final_keywords)) {
            $_final_keywords = config('app.keywords');
        }

        // --- Robots ---
        if (config('app.maintenance_mode')) {
            $_final_robots = 'noindex, nofollow';
        } else {
            $_final_robots = page()->robots;
            if (empty($_final_robots) && \Illuminate\Support\Facades\View::hasSection('robots')) {
                $_final_robots = trim(\Illuminate\Support\Facades\View::yieldContent('robots'));
            }
            if (empty($_final_robots)) {
                $_final_robots = config('app.robots', 'index, follow');
            }
        }

        // --- OG Image ---
        $_final_og_image = page()->og_image;
        if (empty($_final_og_image) && \Illuminate\Support\Facades\View::hasSection('og_image')) {
            $_final_og_image = trim(\Illuminate\Support\Facades\View::yieldContent('og_image'));
        }
        if (empty($_final_og_image)) {
            $_final_og_image = asset('assets/img/social-image.png');
        }

        // --- Twitter Image ---
        $_final_twitter_image = page()->og_image;
        if (empty($_final_twitter_image) && \Illuminate\Support\Facades\View::hasSection('twitter_image')) {
            $_final_twitter_image = trim(\Illuminate\Support\Facades\View::yieldContent('twitter_image'));
        }
        if (empty($_final_twitter_image)) {
            $_final_twitter_image = asset('assets/img/social-image.png');
        }

        // --- HX Detect ---
        $isPartialRequest = request()->htmx()->isHtmxRequest() || request()->htmx()->isBoosted();

        // --- Theme colors ---
        $__colors = app('flute.view.manager')->getColors();
        $lightThemeBg = $__colors['light']['--background'] ?? '#ffffff';
        $darkThemeBg = $__colors['dark']['--background'] ?? '#1c1c1e';
        $currentTheme = config('app.change_theme', true)
            ? cookie()->get('theme', config('app.default_theme', 'dark'))
            : config('app.default_theme', 'dark');
        $currentThemeBg = $currentTheme === 'light' ? $lightThemeBg : $darkThemeBg;
    ?>
    <title>
        <?php echo e($_final_title); ?>

    </title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport"
        content="minimum-scale=1, initial-scale=1, width=device-width, shrink-to-fit=no, user-scalable=no, viewport-fit=cover">
    <meta name="view-transition" content="same-origin">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="auth" id="auth" content="<?php echo e(user()->isLoggedIn() ? 'true' : 'false'); ?>">
    <meta name="auth-token" content="<?php echo e(md5(user()->isLoggedIn() . '_' . (user()->isLoggedIn() ? user()->id : ''))); ?>">
    <meta name="google" content="notranslate" />
    <meta name="default-theme" content="<?php echo e(config('app.default_theme', 'dark')); ?>">
    <meta name="change-theme" content="<?php echo e(config('app.change_theme', true) ? 'true' : 'false'); ?>">
    <meta name="description" content="<?php echo e($_final_description); ?>">
    <meta name="keywords" content="<?php echo e($_final_keywords); ?>">
    <meta name="robots" content="<?php echo e($_final_robots); ?>">
    <meta name="author" content="Flames">
    <meta name="application-name" content="<?php echo e(config('app.name')); ?>">
    <meta name="apple-mobile-web-app-title" content="<?php echo e(config('app.name')); ?>">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="color-scheme" content="dark light">
    <meta name="supported-color-schemes" content="dark light">
    <meta name="msapplication-TileColor" content="<?php echo e($currentThemeBg); ?>">
    <meta name="msapplication-navbutton-color" content="<?php echo e($currentThemeBg); ?>">
    <meta name="theme-color" id="theme-color-meta" content="<?php echo e($currentThemeBg); ?>">
    <meta name="theme-color" content="<?php echo e($lightThemeBg); ?>" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="<?php echo e($darkThemeBg); ?>" media="(prefers-color-scheme: dark)">

    <meta property="og:title" content="<?php echo e($_final_title); ?>">
    <meta property="og:description" content="<?php echo e($_final_description); ?>">
    <meta property="og:image" content="<?php echo e($_final_og_image); ?>">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta property="og:type" content="<?php echo $__env->yieldContent('og_type', 'website'); ?>">
    <meta property="og:site_name" content="<?php echo e(config('app.name')); ?>">
    <meta property="og:locale" content="<?php echo e(strtolower(app()->getLang())); ?>">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo e($_final_title); ?>">
    <meta name="twitter:description" content="<?php echo e($_final_description); ?>">
    <meta name="twitter:image" content="<?php echo e($_final_twitter_image); ?>">

    <meta name="htmx-config"
        content='{
        "defaultFocusScroll": false,
        "scrollIntoViewOnBoost": false,
        "refreshOnHistoryMiss": true,
        "getCacheBusterParam": false,
        "historyCacheSize": 0
    }'>
    <meta name="site_url" content="<?php echo e(config('app.url')); ?>">

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "<?php echo $__env->yieldContent('schema_type', 'WebPage'); ?>",
        "name": "<?php echo e($_final_title); ?>",
        "description": "<?php echo e($_final_description); ?>",
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
    <link rel="canonical" href="<?php echo e(url()->current()); ?>">
    <link rel="alternate" href="<?php echo e(url()->current()); ?>" hreflang="x-default">

    <?php $__currentLoopData = config('lang.available'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <link rel="alternate" href="<?php echo e(url()); ?>?lang=<?php echo e($lang); ?>" hreflang="<?php echo e(strtolower($lang)); ?>">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php echo $__env->make('flute::partials.background', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldPushContent('styles'); ?>

    <?php if(isset($sections['styles'])): ?>
        <?php echo $sections['styles']; ?>

    <?php endif; ?>

    
    <?php if($isPartialRequest): ?>
        <?php echo $__env->yieldPushContent('scripts'); ?>

        <?php if(isset($sections['scripts'])): ?>
            <?php echo $sections['scripts']; ?>

        <?php endif; ?>
    <?php endif; ?>

    <?php if(!$isPartialRequest): ?>
        <link rel="stylesheet" href="<?php echo asset('assets/fonts/manrope/manrope.css'); ?>">
        <link rel="stylesheet" href="<?php echo asset('animate'); ?>" type='text/css'>
        <link rel="stylesheet" href="<?php echo asset('grid'); ?>" type='text/css'>
        <link rel="stylesheet" href="<?php echo asset('assets/css/libs/filepond.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo asset('assets/css/libs/easymde.min.css'); ?>">

        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(tt('assets/sass/app.scss'), false); ?>

        <script src="<?php echo asset('assets/js/htmx/core.js'); ?>"></script>
        <script src="<?php echo e(Clickfwd\Yoyo\Services\Configuration::yoyoSrc()); ?>"></script>

        <script src="<?php echo asset('assets/js/htmx/head.js'); ?>"></script>
        <script src="<?php echo asset('assets/js/htmx/response-targets.js'); ?>"></script>
        <script src="<?php echo asset('assets/js/htmx/idiomorph.js'); ?>"></script>

        <?php if (\Illuminate\Support\Facades\Blade::check('can', 'admin.pages')): ?>
            <script src="<?php echo asset('assets/js/libs/gridstack.js'); ?>" defer></script>

            <link rel="stylesheet" href="<?php echo asset('assets/css/libs/gridstack.min.css'); ?>">
        <?php endif; ?>

        <script src="<?php echo asset('assets/js/htmx/loadingState.js'); ?>"></script>

        <?php echo Clickfwd\Yoyo\Services\Configuration::javascriptInitCode() ?>
    <?php endif; ?>

    <?php echo $__env->make('flute::partials.colors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                    '<?php echo e($currentThemeBg); ?>';
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

<body hx-ext="head-support, loading-states, morph, response-targets" hx-history="false"
    hx-headers='{"X-CSRF-Token": "<?php echo e(csrf_token()); ?>"}' itemscope itemtype="https://schema.org/WebPage">

    <?php if(!$isPartialRequest): ?>
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
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.page-edit-controls','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('page-edit-controls'); ?>
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
    <?php endif; ?>

    <?php echo $__env->renderWhen(!$isPartialRequest, 'flute::layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

    <?php if(!$isPartialRequest): ?>
        <?php if (\Illuminate\Support\Facades\Blade::check('can', 'admin.pages')): ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.page-edit-widgets','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('page-edit-widgets'); ?>
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
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.page-colors','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('page-colors'); ?>
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
            <?php echo $__env->make('flute::partials.page-edit-onboarding', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if (\Illuminate\Support\Facades\Blade::check('can', 'admin.boss')): ?>
            <?php echo $__env->make('flute::partials.admin-onboarding', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endif; ?>

    <main id="main" class="main-animation" hx-history-elt>
        <?php echo $__env->renderWhen(!$isPartialRequest, 'flute::partials.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

        <?php echo $__env->yieldPushContent('before-content'); ?>

        <?php if(isset($sections['before-content'])): ?>
            <?php echo $sections['before-content']; ?>

        <?php endif; ?>

        <?php if(is_debug() || is_development()): ?>
            <?php echo $__env->make('flute::components.debug-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php echo $__env->make('flute::partials.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('flute::partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('flute::partials.widgets', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php
            $hasContentWidget = false;
            if (!empty(page()->getBlocks())) {
                foreach (page()->getBlocks() as $block) {
                    if ($block->getWidget() === 'Content') {
                        $hasContentWidget = true;
                        break;
                    }
                }
            }
        ?>

        <?php if(empty(page()->getBlocks()) || !$hasContentWidget): ?>
            <?php echo $__env->yieldPushContent('content'); ?>

            <?php if(isset($sections['content'])): ?>
                <?php echo $sections['content']; ?>

            <?php endif; ?>
        <?php endif; ?>

        <?php if (\Illuminate\Support\Facades\Blade::check('can', 'admin.pages')): ?>
            <?php echo $__env->make('flute::partials.no-widgets', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </main>

    <?php echo $__env->yieldPushContent('content-after'); ?>

    <?php if(isset($sections['content-after'])): ?>
        <?php echo $sections['content-after']; ?>

    <?php endif; ?>

    <?php
        try {
            echo view('flute::partials.confirmation')->render();
        } catch (\Throwable $e) {
            logs()->error('Layout partial error (confirmation): ' . $e->getMessage(), ['exception' => $e]);
        }
    ?>

    <?php if(!$isPartialRequest): ?>
        <div id="alerts-container">
            <?php echo $__env->yieldPushContent('toast-container'); ?>

            <?php if(isset($sections['toast-container'])): ?>
                <?php echo $sections['toast-container']; ?>

            <?php endif; ?>
        </div>

        <?php
            try {
                echo view('flute::components.right-sidebar')->render();
            } catch (\Throwable $e) {
                logs()->error('Layout component error (right-sidebar): ' . $e->getMessage(), ['exception' => $e]);
            }
        ?>
        <?php
            try {
                echo view('flute::components.tab-bar')->render();
            } catch (\Throwable $e) {
                logs()->error('Layout component error (tab-bar): ' . $e->getMessage(), ['exception' => $e]);
            }
        ?>

        <?php if (\Illuminate\Support\Facades\Blade::check('can', 'admin.pages')): ?>
            <?php
                try {
                    echo view('flute::components.page-edit')->render();
                } catch (\Throwable $e) {
                    logs()->error('Layout component error (page-edit): ' . $e->getMessage(), ['exception' => $e]);
                }
            ?>
            <?php echo $__env->make('flute::partials.page-edit-dialog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('flute::partials.page-seo-dialog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <div id="modals">
            <?php echo $__env->yieldPushContent('modals'); ?>

            <?php if(isset($sections['modals'])): ?>
                <?php echo $sections['modals']; ?>

            <?php endif; ?>
        </div>

        <?php
            try {
                echo view('flute::components.user-card')->render();
            } catch (\Throwable $e) {
                logs()->error('Layout component error (user-card): ' . $e->getMessage(), ['exception' => $e]);
            }
        ?>
    <?php endif; ?>

    <?php echo $__env->renderWhen(!$isPartialRequest, 'flute::components.richtext-icons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

    <?php echo $__env->renderWhen(!$isPartialRequest, 'flute::layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

    <?php if(!$isPartialRequest): ?>
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
        <script src="<?php echo asset('assets/js/libs/easymde.js'); ?>" defer></script>

        <script src="<?php echo asset('assets/js/libs/tom-select.js'); ?>" defer></script>

        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(tt('assets/scripts/libs/simplebar.js'), false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(tt('assets/scripts/libs/tinycolor.js'), false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(tt('assets/scripts/helpers.js'), false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(tt('assets/scripts/bottom-sheet.js'), false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(tt('assets/scripts/user-card.js'), false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(tt('assets/scripts/tabs.js'), false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(tt('assets/scripts/richtext.js'), false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(tt('assets/scripts/otp-input.js'), false); ?>
        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(tt('assets/scripts/tom-select.js'), false); ?>

        <?php if (\Illuminate\Support\Facades\Blade::check('can', 'admin.pages')): ?>
            <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(tt('assets/scripts/page-edit.js'), false); ?>
            <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(tt('assets/scripts/page-color.js'), false); ?>
        <?php endif; ?>

        <?php if (\Illuminate\Support\Facades\Blade::check('can', 'admin.boss')): ?>
            <?php if(!config('tips_complete.admin_onboarding.completed')): ?>
                <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(tt('assets/scripts/admin-onboarding.js'), false); ?>
            <?php endif; ?>
        <?php endif; ?>

        <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(tt('assets/scripts/app.js'), false); ?>

        <?php echo $__env->make('flute::partials.toasts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldPushContent('scripts'); ?>

        <?php if(isset($sections['scripts'])): ?>
            <?php echo $sections['scripts']; ?>

        <?php endif; ?>
    <?php endif; ?>
</body>

</html>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/layouts/app.blade.php ENDPATH**/ ?>