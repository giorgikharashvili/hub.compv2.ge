<?php $__env->startSection('title'); ?>
    <?php echo e(__('def.settings')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(tt('assets/scripts/pages/profile-edit.js'), false); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('content'); ?>
    <div class="container">
        <div class="row gy-4 gx-4">
            <div class="col-lg-3 col-md-5">
                <aside class="profile-edit__sidebar mt-2">
                    <div class="profile-edit__sidebar-hero">
                        <img src="<?php echo e(asset($user->avatar ?? config('profile.default_avatar'))); ?>" alt="<?php echo e($user->name); ?>" loading="lazy" data-profile-avatar="<?php echo e($user->avatar); ?>">

                        <h5 data-profile-name="<?php echo e($user->name); ?>"><?php echo e($user->name); ?></h5>
                        <?php if($user->email): ?>
                            <p data-profile-email="<?php echo e($user->email); ?>"><?php echo e($user->email); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="profile-edit__sidebar-items">
                        <ul>
                            <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a hx-get="<?php echo e(url('profile/settings')->addParams(['tab' => $tab['path']])); ?>"
                                        class="profile-edit__sidebar-item <?php if($tab['path'] === $activePath): ?> active <?php endif; ?>"
                                        hx-target="#tab-content" hx-push-url="true" data-tab-path="<?php echo e($tab['path']); ?>" hx-swap="innerHTML show:#main:top"
                                        <?php if($tab['path'] === $activePath): ?> hx-trigger="click once" <?php endif; ?>>
                                        <?php if($tab['icon']): ?>
                                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => ''.e($tab['icon']).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                        <?php endif; ?>
                                        <?php echo __($tab['title']); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <div class="profile-edit__sidebar-footer">
                            <a href="<?php echo e(url('profile/settings')); ?>" class="profile-edit__sidebar-item" hx-boost="true"
                                hx-target="#main" hx-swap="outerHTML transition:true">
                                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.arrow-left'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                <?php echo e(__('def.back')); ?>

                            </a>
                        </div>
                    </div>
                </aside>
            </div>
            <div class="col-lg-9 col-md-7">
                <?php $__env->startFragment('profile-edit-card'); ?>
                    <?php if($activeTab): ?>
                        <div class="profile-edit__card mt-2" id="tab-content">
                            <div class="profile-edit__card-header">
                                <?php
                                    $firstTab = $activeTab->first();
                                ?>

                                <h3><?php echo e($firstTab->getTitle()); ?></h3>

                                <?php if($desc = $firstTab->getDescription()): ?>
                                    <p><?php echo e($desc); ?></p>
                                <?php endif; ?>
                            </div>

                            <div class="profile-edit__card-content">
                                <?php echo $activeTabContent; ?>

                            </div>
                        </div>
                    <?php endif; ?>
                <?php echo $__env->stopFragment(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('flute::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/pages/profile/edit-main.blade.php ENDPATH**/ ?>