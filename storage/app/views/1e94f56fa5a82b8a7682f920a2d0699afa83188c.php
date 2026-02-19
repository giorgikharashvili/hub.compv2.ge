<?php
    $adminOnboardingCompleted = config('tips_complete.admin_onboarding.completed') ?? cookie()->has('admin_onboarding_completed');
?>

<?php if(! $adminOnboardingCompleted): ?>
    <div id="admin-onboarding" class="admin-onboarding">
        <div class="admin-onboarding__backdrop"></div>
        <div class="admin-onboarding__container">
            <div class="admin-onboarding__sidebar">
                <div class="admin-onboarding__steps" id="onboarding-steps">
                    <div class="admin-onboarding__step active" data-step="0">
                        <div class="admin-onboarding__step-icon">
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.sparkle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        </div>
                        <div class="admin-onboarding__step-info">
                            <div class="admin-onboarding__step-title"><?php echo e(__('onboarding.new_design')); ?></div>
                            <div class="admin-onboarding__step-subtitle"><?php echo e(__('onboarding.modern_interface')); ?></div>
                        </div>
                    </div>
                    <div class="admin-onboarding__step" data-step="1">
                        <div class="admin-onboarding__step-icon">
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.lightning'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        </div>
                        <div class="admin-onboarding__step-info">
                            <div class="admin-onboarding__step-title"><?php echo e(__('onboarding.dynamic_loading')); ?></div>
                            <div class="admin-onboarding__step-subtitle"><?php echo e(__('onboarding.no_page_reloads')); ?></div>
                        </div>
                    </div>
                    <div class="admin-onboarding__step" data-step="2">
                        <div class="admin-onboarding__step-icon">
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.layout'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        </div>
                        <div class="admin-onboarding__step-info">
                            <div class="admin-onboarding__step-title"><?php echo e(__('onboarding.page_editor')); ?></div>
                            <div class="admin-onboarding__step-subtitle"><?php echo e(__('onboarding.widget_system')); ?></div>
                        </div>
                    </div>
                    <div class="admin-onboarding__step" data-step="3">
                        <div class="admin-onboarding__step-icon">
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.paint-bucket'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        </div>
                        <div class="admin-onboarding__step-info">
                            <div class="admin-onboarding__step-title"><?php echo e(__('onboarding.dynamic_colors')); ?></div>
                            <div class="admin-onboarding__step-subtitle"><?php echo e(__('onboarding.customize_appearance')); ?></div>
                        </div>
                    </div>
                    <div class="admin-onboarding__step" data-step="4">
                        <div class="admin-onboarding__step-icon">
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.sliders-horizontal'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        </div>
                        <div class="admin-onboarding__step-info">
                            <div class="admin-onboarding__step-title"><?php echo e(__('onboarding.improved_admin')); ?></div>
                            <div class="admin-onboarding__step-subtitle"><?php echo e(__('onboarding.better_management')); ?></div>
                        </div>
                    </div>
                    <div class="admin-onboarding__step" data-step="5">
                        <div class="admin-onboarding__step-icon">
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.check-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        </div>
                        <div class="admin-onboarding__step-info">
                            <div class="admin-onboarding__step-title"><?php echo e(__('onboarding.start_using')); ?></div>
                            <div class="admin-onboarding__step-subtitle"><?php echo e(__('onboarding.get_started')); ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="admin-onboarding__content">
                <div class="admin-onboarding__content-header">
                    <div class="admin-onboarding__content-header-container">
                        <h4 id="slide-title"><?php echo e(__('onboarding.new_design')); ?></h4>
                        <div class="admin-onboarding__nav">
                            <button class="admin-onboarding__nav-btn" id="onboarding-prev" disabled>
                                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.caret-left'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            </button>
                            <span class="admin-onboarding__step-counter">
                                <span id="current-step">1</span>/<span id="total-steps">6</span>
                            </span>
                            <button class="admin-onboarding__nav-btn" id="onboarding-next">
                                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.caret-right'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            </button>
                        </div>
                    </div>
                    <div class="admin-onboarding__progress">
                        <div class="admin-onboarding__progress-bar" id="onboarding-progress"></div>
                    </div>
                </div>
                <div class="admin-onboarding__slide-container" id="onboarding-slides">
                    <div class="admin-onboarding__slide active">
                        <div class="admin-onboarding__slide-image">
                            <img src="<?php echo asset('assets/img/onboarding/new-design.png'); ?>"
                                alt="<?php echo e(__('onboarding.new_design')); ?>">
                        </div>
                        <div class="admin-onboarding__slide-content">
                            <p><?php echo e(__('onboarding.design_description_1')); ?></p>
                            <p><?php echo e(__('onboarding.design_description_2')); ?></p>
                        </div>
                    </div>
                    <div class="admin-onboarding__slide">
                        <div class="admin-onboarding__slide-image">
                            <img src="<?php echo asset('assets/img/onboarding/dynamic.png'); ?>"
                                alt="<?php echo e(__('onboarding.dynamic_loading')); ?>">
                        </div>
                        <div class="admin-onboarding__slide-content">
                            <p><?php echo e(__('onboarding.dynamic_description_1')); ?></p>
                            <p><?php echo e(__('onboarding.dynamic_description_2')); ?></p>
                        </div>
                    </div>
                    <div class="admin-onboarding__slide">
                        <div class="admin-onboarding__slide-image">
                            <img src="<?php echo asset('assets/img/onboarding/page-editor.png'); ?>"
                                alt="<?php echo e(__('onboarding.page_editor')); ?>">
                        </div>
                        <div class="admin-onboarding__slide-content">
                            <p><?php echo e(__('onboarding.editor_description_1')); ?></p>
                            <p><?php echo e(__('onboarding.editor_description_2')); ?></p>
                        </div>
                    </div>
                    <div class="admin-onboarding__slide">
                        <div class="admin-onboarding__slide-image">
                            <img src="<?php echo asset('assets/img/onboarding/colors.png'); ?>"
                                alt="<?php echo e(__('onboarding.dynamic_colors')); ?>">
                        </div>
                        <div class="admin-onboarding__slide-content">
                            <p><?php echo e(__('onboarding.colors_description_1')); ?></p>
                            <p><?php echo e(__('onboarding.colors_description_2')); ?></p>
                        </div>
                    </div>
                    <div class="admin-onboarding__slide">
                        <div class="admin-onboarding__slide-image">
                            <img src="<?php echo asset('assets/img/onboarding/admin.png'); ?>"
                                alt="<?php echo e(__('onboarding.improved_admin')); ?>">
                        </div>
                        <div class="admin-onboarding__slide-content">
                            <p><?php echo e(__('onboarding.admin_description_1')); ?></p>
                            <p><?php echo e(__('onboarding.admin_description_2')); ?></p>
                        </div>
                    </div>
                    <div class="admin-onboarding__slide">
                        <div class="admin-onboarding__slide-image">
                            <img src="<?php echo asset('assets/img/onboarding/ready.png'); ?>" alt="<?php echo e(__('onboarding.start_using')); ?>">
                        </div>
                        <div class="admin-onboarding__slide-content">
                            <p><?php echo e(__('onboarding.ready_description_1')); ?></p>
                            <p><?php echo e(__('onboarding.ready_description_2')); ?></p>
                            <div class="admin-onboarding__action">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['size' => 'medium','type' => 'button','class' => 'admin-onboarding__start-btn','id' => 'onboarding-complete']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'medium','type' => 'button','class' => 'admin-onboarding__start-btn','id' => 'onboarding-complete']); ?>
                                    <?php echo e(__('onboarding.start_now')); ?>

                                    <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.arrow-up-right'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/partials/admin-onboarding.blade.php ENDPATH**/ ?>