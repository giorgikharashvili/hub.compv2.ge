<?php
    $currentTheme = cookie()->get('theme', 'dark');
    $containerWidth = cookie()->get('container-width', 'normal');

    $colorSchemes = [
        'default' => [
            'name' => __('admin.default'),
            'light' => [
                'primary' => '#0d0d0d',
                'accent' => '#76bd50',
            ],
            'dark' => [
                'primary' => '#F1F1F1',
                'accent' => '#A5FF75',
            ],
        ],
        'blue' => [
            'name' => __('admin.blue'),
            'light' => [
                'primary' => '#0A3880',
                'accent' => '#4285F4',
            ],
            'dark' => [
                'primary' => '#1565C0',
                'accent' => '#5E97F6',
            ],
        ],
        'purple' => [
            'name' => __('admin.purple'),
            'light' => [
                'primary' => '#4A148C',
                'accent' => '#9C27B0',
            ],
            'dark' => [
                'primary' => '#6A1B9A',
                'accent' => '#CE93D8',
            ],
        ],
        'orange' => [
            'name' => __('admin.orange'),
            'light' => [
                'primary' => '#E65100',
                'accent' => '#FF9800',
            ],
            'dark' => [
                'primary' => '#EF6C00',
                'accent' => '#FFAB40',
            ],
        ],
        'red' => [
            'name' => __('admin.red'),
            'light' => [
                'primary' => '#B71C1C',
                'accent' => '#F44336',
            ],
            'dark' => [
                'primary' => '#C62828',
                'accent' => '#EF5350',
            ],
        ],
    ];

    $currentColorScheme = cookie()->get('color-scheme', 'default');
?>

<aside class="modal right_sidebar" id="customization-modal" data-a11y-dialog="customization-modal" aria-hidden="true">
    <div class="right_sidebar__overlay" tabindex="-1" data-a11y-dialog-hide>
        <div class="right_sidebar__container" id="customization-sidebar-content" role="dialog" aria-modal="true"
            data-a11y-dialog-ignore-focus-trap>
            <header class="right_sidebar__header">
                <h5 class="right_sidebar__title">
                    <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.paint-brush','class' => 'me-2'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
                    <?php echo e(__('admin.customization')); ?>

                </h5>
                <button class="right_sidebar__close" aria-label="Close modal" data-a11y-dialog-hide="right-sidebar"
                    data-original-tabindex="null"></button>
            </header>

            <div class="right_sidebar__content">
                <!-- Theme Mode Section -->
                <div class="customization-section">
                    <h6 class="customization-section__title">
                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.sun-dim','class' => 'me-2'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
                        <?php echo e(__('admin.theme_mode')); ?>

                    </h6>

                    <div class="theme-toggle">
                        <button class="theme-toggle__btn <?php echo e($currentTheme === 'light' ? 'active' : ''); ?>"
                            data-theme="light">
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.sun'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
                            <span><?php echo e(__('admin.light')); ?></span>
                        </button>

                        <button class="theme-toggle__btn <?php echo e($currentTheme === 'dark' ? 'active' : ''); ?>"
                            data-theme="dark">
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.moon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
                            <span><?php echo e(__('admin.dark')); ?></span>
                        </button>
                    </div>
                </div>

                <!-- Color Scheme Section -->
                <div class="customization-section">
                    <h6 class="customization-section__title">
                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.palette','class' => 'me-2'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
                        <?php echo e(__('admin.color_scheme')); ?>

                    </h6>

                    <div class="color-schemes">
                        <?php $__currentLoopData = $colorSchemes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $scheme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <button class="color-scheme__item <?php echo e($currentColorScheme === $id ? 'active' : ''); ?>"
                                data-color-scheme="<?php echo e($id); ?>">
                                <div class="color-scheme__preview">
                                    <div class="color-scheme__colors">
                                        <div class="color-scheme__primary"
                                            style="background-color: <?php echo e($scheme[$currentTheme]['primary']); ?>"></div>
                                        <div class="color-scheme__accent"
                                            style="background-color: <?php echo e($scheme[$currentTheme]['accent']); ?>"></div>
                                    </div>
                                </div>
                                <span class="color-scheme__name"><?php echo e($scheme['name']); ?></span>
                            </button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <!-- Container Width Section -->
                <div class="customization-section">
                    <h6 class="customization-section__title">
                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.arrows-horizontal','class' => 'me-2'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
                        <?php echo e(__('admin.container_width')); ?>

                    </h6>

                    <div class="container-width">
                        <button class="container-width__btn <?php echo e($containerWidth === 'normal' ? 'active' : ''); ?>"
                            data-container-width="normal">
                            <div class="container-width__preview container-width__preview--normal">
                                <div class="container-width__bar"></div>
                            </div>
                            <span><?php echo e(__('admin.normal')); ?></span>
                        </button>

                        <button class="container-width__btn <?php echo e($containerWidth === 'wide' ? 'active' : ''); ?>"
                            data-container-width="wide">
                            <div class="container-width__preview container-width__preview--wide">
                                <div class="container-width__bar"></div>
                            </div>
                            <span><?php echo e(__('admin.wide')); ?></span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="right_sidebar__footer">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.button','data' => ['type' => 'outline-primary','class' => 'w-100','dataA11yDialogHide' => 'right-sidebar','dataOriginalTabindex' => 'null']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'outline-primary','class' => 'w-100','data-a11y-dialog-hide' => 'right-sidebar','data-original-tabindex' => 'null']); ?>
                    <?php echo e(__('def.close')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        </div>
    </div>
</aside>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Core/Modules/Admin/Resources/views/partials/customization.blade.php ENDPATH**/ ?>