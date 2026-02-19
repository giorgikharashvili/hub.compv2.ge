<div class="right_sidebar__container miniprofile__container" id="right-sidebar-content" role="dialog" aria-modal="true"
    data-a11y-dialog-ignore-focus-trap>
    <div class="miniprofile__main">
        <header class="right_sidebar__header">
            <h5 class="right_sidebar__title" id="modal-1-title">
                <?php echo __('def.my_profile'); ?>
            </h5>
            <button class="right_sidebar__close" aria-label="Close modal" data-a11y-dialog-hide="right-sidebar"
                data-original-tabindex="null"></button>
        </header>
        <div class="right_sidebar__content miniprofile__content">
            <div class="miniprofile__user">
                <img src="<?php echo e(url(user()->avatar)); ?>" alt="<?php echo e(user()->name); ?>" class="miniprofile__avatar" loading="lazy">
                <div class="miniprofile__user-content">
                    <h6><?php echo e(user()->name); ?></h6>
                    <p>#<?php echo e(user()->id); ?></p>
                </div>

                <?php if(sizeof(payments()->getAllGateways() ?? 0 > 0)): ?>
                    <div class="miniprofile__balance">
                        <div class="miniprofile__balance-content">
                            <small><?php echo e(__('def.balance')); ?></small>
                            <h6><?php echo e(user()->balance); ?> <?php echo e(config('lk.currency_view')); ?></h6>
                        </div>

                        <?php if(config('lk.only_modal')): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['size' => 'tiny','type' => 'outline-accent','class' => 'miniprofile__balance-btn','dataModalOpen' => 'lk-modal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'tiny','type' => 'outline-accent','class' => 'miniprofile__balance-btn','data-modal-open' => 'lk-modal']); ?>
                                <?php echo e(__('def.top_up')); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['size' => 'tiny','type' => 'outline-accent','class' => 'miniprofile__balance-btn','hxBoost' => 'true','hxTarget' => '#main','hxSwap' => 'outerHTML transition:true','href' => ''.e(url('/lk')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'tiny','type' => 'outline-accent','class' => 'miniprofile__balance-btn','hx-boost' => 'true','hx-target' => '#main','hx-swap' => 'outerHTML transition:true','href' => ''.e(url('/lk')).'']); ?>
                                <?php echo e(__('def.top_up')); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="miniprofile__content-buttons" hx-boost="true" hx-target="#main"
                hx-swap="outerHTML transition:true">
                <a href="<?php echo e(url('profile/' . user()->getUrl())); ?>" class="miniprofile__button">
                    <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.bold.user-bold'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    <?php echo __('def.profile'); ?>
                </a>
                <?php if (\Illuminate\Support\Facades\Blade::check('can', 'admin')): ?>
                    <a href="<?php echo e(url('admin')); ?>" class="miniprofile__button" hx-boost="false">
                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.bold.gear-bold'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <?php echo __('def.admin_panel'); ?>
                    </a>
                <?php endif; ?>
                <a href="<?php echo e(url('profile/settings')); ?>" class="miniprofile__button">
                    <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.bold.pencil-bold'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    <?php echo __('profile.edit.title'); ?>
                </a>
            </div>
        </div>
    </div>
    <div class="right_sidebar__footer w-100">
        <form action="<?php echo e(url('logout')); ?>" method="POST" class="w-100" hx-boost="false">
            <?php echo csrf_field(); ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['type' => 'error','class' => 'w-100','submit' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'error','class' => 'w-100','submit' => 'true']); ?>
                <?php echo __('def.logout'); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </form>
    </div>
    <?php echo $__env->yieldPushContent('right-sidebar'); ?>
</div>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/partials/miniprofile.blade.php ENDPATH**/ ?>