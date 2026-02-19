<?php
    $mods = is_array($modules) ? $modules : [];
?>

<div class="admin-marketplace shadcn view-grid">
    <form class="mp-toolbar card-gradient" yoyo yoyo:on="changed change" yoyo:post="handleFilters">
        <div class="mp-toolbar-row">
            <div class="mp-search">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.fields.input','data' => ['type' => 'search','name' => 'q','value' => ''.e($searchQuery).'','placeholder' => ''.e(__('admin-marketplace.labels.search_modules')).'','yoyo:on' => 'input delay:400ms','yoyo:post' => 'handleFilters']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'search','name' => 'q','value' => ''.e($searchQuery).'','placeholder' => ''.e(__('admin-marketplace.labels.search_modules')).'','yoyo:on' => 'input delay:400ms','yoyo:post' => 'handleFilters']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>

            <div class="mp-controls">
                <div class="segment" role="group" aria-label="<?php echo e(__('admin-marketplace.labels.price')); ?>">
                    <?php $p = $priceFilter; ?>
                    <input type="radio" id="price_all" name="price" value="" yoyo:on="change"
                        yoyo:post="handleFilters" <?php if($p === ''): ?> checked <?php endif; ?>>
                    <label class="seg" for="price_all"><?php echo e(__('admin-marketplace.labels.all_modules')); ?></label>
                    <input type="radio" id="price_free" name="price" value="free" yoyo:on="change"
                        yoyo:post="handleFilters" <?php if($p === 'free'): ?> checked <?php endif; ?>>
                    <label class="seg" for="price_free"><?php echo e(__('admin-marketplace.labels.free_only')); ?></label>
                    <input type="radio" id="price_paid" name="price" value="paid" yoyo:on="change"
                        yoyo:post="handleFilters" <?php if($p === 'paid'): ?> checked <?php endif; ?>>
                    <label class="seg" for="price_paid"><?php echo e(__('admin-marketplace.labels.paid_only')); ?></label>
                </div>

                <div class="segment" role="group" aria-label="<?php echo e(__('admin-marketplace.labels.status')); ?>">
                    <?php $s = $statusFilter; ?>
                    <input type="radio" id="status_all" name="status" value="" yoyo:on="change"
                        yoyo:post="handleFilters" <?php if($s === ''): ?> checked <?php endif; ?>>
                    <label class="seg" for="status_all"><?php echo e(__('admin-marketplace.labels.all_modules')); ?></label>
                    <input type="radio" id="status_installed" name="status" value="installed" yoyo:on="change"
                        yoyo:post="handleFilters" <?php if($s === 'installed'): ?> checked <?php endif; ?>>
                    <label class="seg"
                        for="status_installed"><?php echo e(__('admin-marketplace.labels.installed_only')); ?></label>
                    <input type="radio" id="status_notinstalled" name="status" value="notinstalled" yoyo:on="change"
                        yoyo:post="handleFilters" <?php if($s === 'notinstalled'): ?> checked <?php endif; ?>>
                    <label class="seg"
                        for="status_notinstalled"><?php echo e(__('admin-marketplace.labels.not_installed')); ?></label>
                    <input type="radio" id="status_update" name="status" value="update" yoyo:on="change"
                        yoyo:post="handleFilters" <?php if($s === 'update'): ?> checked <?php endif; ?>>
                    <label class="seg"
                        for="status_update"><?php echo e(__('admin-marketplace.labels.updates_available')); ?></label>
                </div>
            </div>
        </div>

        <?php
            $total = is_array($modules) ? count($modules) : 0;
            $installedCount = 0;
            $updatesCount = 0;
            $freeCount = 0;
            $paidCount = 0;
            if (!empty($modules)) {
                foreach ($modules as $m) {
                    $paid = !empty($m['isPaid']);
                    $paid ? $paidCount++ : $freeCount++;
                    $k = $m['name'] ?? null;
                    if ($k && $moduleManager && $moduleManager->issetModule($k)) {
                        $mod = $moduleManager->getModule($k);
                        if ($mod->status !== 'notinstalled') {
                            $installedCount++;
                            $cur = $m['currentVersion'] ?? '0.0.0';
                            $ins = $mod->installedVersion ?? '0.0.0';
                            if (version_compare($cur, $ins, '>')) {
                                $updatesCount++;
                            }
                        }
                    }
                }
            }
        ?>
        <div class="mp-summary">
            <span class="chip"><?php echo e($total); ?> <?php echo e(__('admin-marketplace.labels.modules') ?? 'modules'); ?></span>
            <span class="chip success"><?php echo e($installedCount); ?>

                <?php echo e(__('admin-marketplace.labels.installed_only')); ?></span>
            <span class="chip warning"><?php echo e($updatesCount); ?>

                <?php echo e(__('admin-marketplace.labels.updates_available')); ?></span>
            <span class="chip"><?php echo e($freeCount); ?> <?php echo e(__('admin-marketplace.labels.free')); ?></span>
            <span class="chip accent"><?php echo e($paidCount); ?> <?php echo e(__('admin-marketplace.labels.paid')); ?></span>
        </div>
    </form>

    <?php if(!ioncube_loaded()): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.alert','data' => ['type' => 'warning','withClose' => 'false','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'warning','withClose' => 'false','class' => 'mt-2']); ?>
            <strong><?php echo e(__('admin-marketplace.ioncube.missing_title')); ?></strong>
            <div class="mt-1"><?php echo e(__('admin-marketplace.ioncube.missing_desc')); ?></div>
            <div class="mt-1 text-sm">
                <a href="https://www.ioncube.com/loaders.php" target="_blank"
                    rel="noreferrer">https://www.ioncube.com/loaders.php</a>
            </div>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if(empty(config('app.flute_key'))): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.alert','data' => ['type' => 'danger','withClose' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'danger','withClose' => 'false']); ?>
            <?php echo e(__('admin-marketplace.messages.flute_key_not_set')); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php elseif(empty($modules)): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.alert','data' => ['type' => 'info','withClose' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'info','withClose' => 'false']); ?>
            <?php echo e(__('admin-marketplace.labels.no_modules_found')); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php else: ?>
        <div class="marketplace-grid" data-grid>
            <?php if($isLoading): ?>
                <?php for($i = 0; $i < 6; $i++): ?>
                    <div class="mp-card skeleton">
                        <div class="cover"></div>
                        <div class="body">
                            <div class="line w-70"></div>
                            <div class="line w-40 mt-6"></div>
                            <div class="line w-50 mt-10"></div>
                        </div>
                    </div>
                <?php endfor; ?>
            <?php endif; ?>

            <?php $__currentLoopData = $mods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $key = $module['name'] ?? '';
                    $isInstalled =
                        $key &&
                        $moduleManager &&
                        $moduleManager->issetModule($key) &&
                        $moduleManager->getModule($key)->status !== 'notinstalled';
                    $needsUpdate =
                        $isInstalled &&
                        version_compare(
                            $module['currentVersion'] ?? '0.0.0',
                            $moduleManager->getModule($key)->installedVersion ?? '0.0.0',
                            '>',
                        );
                ?>
                <div class="mp-card <?php echo e(!empty($module['isPaid']) ? 'paid' : 'free'); ?>"
                    hx-swap="morph:outerHTML transition:true"
                    data-name="<?php echo e(strtolower(preg_replace('/[^a-z0-9]+/i', '-', $module['name'] ?? ''))); ?>"
                    data-downloads="<?php echo e($module['downloadCount'] ?? 0); ?>"
                    data-paid="<?php echo e(!empty($module['isPaid']) ? 1 : 0); ?>" data-installed="<?php echo e($isInstalled ? 1 : 0); ?>">
                    <a class="cover" hx-boost="true" hx-target="#main" yoyo:ignore
                        href="<?php echo e(url('/admin/marketplace/' . $module['slug'])); ?>">
                        <?php if(!empty($module['primaryImage'])): ?>
                            <img loading="lazy"
                                data-src="<?php echo e(str_starts_with($module['primaryImage'], 'http') ? $module['primaryImage'] : config('app.flute_market_url') . $module['primaryImage']); ?>"
                                src="<?php echo e(str_starts_with($module['primaryImage'], 'http') ? $module['primaryImage'] : config('app.flute_market_url') . $module['primaryImage']); ?>"
                                alt="<?php echo e($module['name']); ?>">
                        <?php else: ?>
                            <div class="placeholder"><?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.package'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php endif; ?></div>
                        <?php endif; ?>
                        <?php if($needsUpdate): ?>
                            <span class="flag warning"><?php echo e(__('admin-marketplace.labels.updates_available')); ?></span>
                        <?php elseif($isInstalled): ?>
                            <span class="flag success"><?php echo e(__('admin-marketplace.actions.installed')); ?></span>
                        <?php endif; ?>
                    </a>
                    <div class="body">
                        <div class="top">
                            <a class="title" hx-boost="true" hx-target="#main" yoyo:ignore
                                href="<?php echo e(url('/admin/marketplace/' . $module['slug'])); ?>"><?php echo e($module['name']); ?></a>
                            <div class="badges">
                                <?php if(!empty($module['isPaid'])): ?>
                                    <span class="chip accent"><?php echo e(__('admin-marketplace.labels.paid')); ?></span>
                                <?php else: ?>
                                    <span class="chip"><?php echo e(__('admin-marketplace.labels.free')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="meta">
                            <span class="muted"><?php echo e($module['author'] ?? 'Flames'); ?></span>
                            <span class="dot"></span>
                            <span class="muted">v<?php echo e($module['currentVersion'] ?? '1.0.0'); ?></span>
                            <span class="dot"></span>
                            <span class="muted"><?php echo e($module['downloadCount'] ?? 0); ?>

                                <?php echo e(__('admin-marketplace.labels.downloads')); ?></span>
                        </div>
                    </div>
                    <div class="actions">
                        <a href="<?php echo e(url('/admin/marketplace/' . $module['slug'])); ?>"
                            data-tooltip="<?php echo e(__('admin-marketplace.actions.details')); ?>" class="mp-details-button">
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.bold.info-bold'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        </a>
                        <?php if($needsUpdate): ?>
                            <button yoyo:post="installModule('<?php echo e($module['slug']); ?>')" hx-trigger="confirmed"
                                hx-flute-confirm="<?php echo e(__('admin-marketplace.messages.update_confirm', ['module' => $module['name']])); ?>"
                                hx-flute-confirm-title="<?php echo e(__('admin-marketplace.messages.update_confirm_title')); ?>"
                                hx-flute-confirm-type="warning"
                                data-tooltip="<?php echo e(__('admin-marketplace.actions.update')); ?>"
                                class="mp-install-button mp-update-button">
                                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.bold.arrow-circle-up-bold'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <?php elseif(!$isInstalled): ?>
                            <button yoyo:post="installModule('<?php echo e($module['slug']); ?>')" hx-trigger="confirmed"
                                hx-flute-confirm="<?php echo e(__('admin-marketplace.messages.install_confirm', ['module' => $module['name']])); ?>"
                                hx-flute-confirm-title="<?php echo e(__('admin-marketplace.messages.install_confirm_title')); ?>"
                                hx-flute-confirm-type="warning"
                                data-tooltip="<?php echo e(__('admin-marketplace.actions.install')); ?>"
                                class="mp-install-button">
                                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.bold.download-simple-bold'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Packages/Marketplace/Resources/views/marketplace/module-list.blade.php ENDPATH**/ ?>