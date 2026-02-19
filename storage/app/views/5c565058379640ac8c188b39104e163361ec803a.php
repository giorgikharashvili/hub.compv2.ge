<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'charms',
    'search' => '',
    'weaponIndex',
    'skinId',
    'serverId',
    'team',
    'total' => 0,
    'page' => 1,
    'pages' => 1,
    'hasMore' => false,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'charms',
    'search' => '',
    'weaponIndex',
    'skinId',
    'serverId',
    'team',
    'total' => 0,
    'page' => 1,
    'pages' => 1,
    'hasMore' => false,
]); ?>
<?php foreach (array_filter(([
    'charms',
    'search' => '',
    'weaponIndex',
    'skinId',
    'serverId',
    'team',
    'total' => 0,
    'page' => 1,
    'pages' => 1,
    'hasMore' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="charms-sidebar__main" data-remove-handler>
    <header class="right_sidebar__header">
        <h5 class="right_sidebar__title">
            <?php echo e(__('skinchanger.charms.title')); ?>

        </h5>
        <button class="right_sidebar__close" aria-label="Close modal" data-a11y-dialog-hide="right-sidebar"
            data-handler="close-modal" data-modal="right-sidebar" onclick="closeModal('right-sidebar')"
            data-original-tabindex="null"></button>
    </header>

    <div class="charms-sidebar__content">
        <div class="charms-sidebar__search-container">
            <div class="charms-sidebar__search">
                <div class="search-input-wrapper">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.fields.input','data' => ['type' => 'text','name' => 'charm_search','placeholder' => ''.e(__('skinchanger.charms.search')).'','value' => ''.e($search).'','dataHandler' => 'charm-search','dataWeaponIndex' => ''.e($weaponIndex).'','dataSkinId' => ''.e($skinId).'','dataServerId' => ''.e($serverId).'','dataTeam' => ''.e($team).'','autocomplete' => 'off']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'charm_search','placeholder' => ''.e(__('skinchanger.charms.search')).'','value' => ''.e($search).'','data-handler' => 'charm-search','data-weapon-index' => ''.e($weaponIndex).'','data-skin-id' => ''.e($skinId).'','data-server-id' => ''.e($serverId).'','data-team' => ''.e($team).'','autocomplete' => 'off']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.magnifying-glass','class' => 'search-icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
            </div>

            <div class="charms-sidebar__count">
                <?php echo e(__('skinchanger.charms.found', ['count' => $total])); ?>

            </div>
        </div>

        <div class="charms-sidebar__grid" id="charms-grid">
            <?php if(count($charms) > 0): ?>
                <div class="charm-item charm-item--remove" data-handler="remove-charm-selection"
                    data-weapon-index="<?php echo e($weaponIndex); ?>" data-skin-id="<?php echo e($skinId); ?>"
                    data-server-id="<?php echo e($serverId); ?>" data-team="<?php echo e($team); ?>">

                    <div class="charm-item__image">
                        <div class="charm-item__remove-icon">
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.x'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    </div>

                    <div class="charm-item__info">
                        <div class="charm-item__name">
                            <?php echo e(__('skinchanger.buttons.remove_charm', 'Remove Charm')); ?>

                        </div>
                    </div>
                </div>

                <?php $__currentLoopData = $charms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $charm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="charm-item" data-handler="select-charm"
                        data-charm-id="<?php echo e(str_replace('keychain-', '', $charm['id'] ?? '')); ?>"
                        data-charm-name="<?php echo e($charm['name'] ?? ''); ?>" data-charm-image="<?php echo e($charm['image'] ?? ''); ?>"
                        data-weapon-index="<?php echo e($weaponIndex); ?>" data-skin-id="<?php echo e($skinId); ?>"
                        data-server-id="<?php echo e($serverId); ?>" data-team="<?php echo e($team); ?>"
                        <?php if(isset($charm['rarity']['color'])): ?> style="--rarity-color: <?php echo e($charm['rarity']['color']); ?>" <?php endif; ?>>

                        <div class="charm-item__image">
                            <?php if(!empty($charm['image'])): ?>
                                <img src="<?php echo e($charm['image']); ?>" alt="<?php echo e($charm['name'] ?? ''); ?>" loading="lazy">
                            <?php else: ?>
                                <div class="charm-item__no-image">
                                    <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.image'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <?php endif; ?>
                        </div>

                        <div class="charm-item__info">
                            <div class="charm-item__name">
                                <?php echo e($charm['name'] ?? 'Unknown Charm'); ?>

                            </div>
                            
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="charms-sidebar__empty">
                    <div class="charms-sidebar__empty-icon h1">
                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.smiley-sad'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    <div class="charms-sidebar__empty-text">
                        <?php if(!empty($search)): ?>
                            <?php echo e(__('skinchanger.charms.no_results')); ?>

                        <?php else: ?>
                            <?php echo e(__('skinchanger.charms.no_charms')); ?>

                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <?php if($hasMore && $page < $pages): ?>
            <div class="sidebar-load-more" style="display: none;">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['type' => 'outline-primary','dataHandler' => 'load-more-charms','dataPage' => ''.e($page + 1).'','dataWeaponIndex' => ''.e($weaponIndex).'','dataSkinId' => ''.e($skinId).'','dataServerId' => ''.e($serverId).'','dataTeam' => ''.e($team).'','dataSearch' => ''.e($search).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'outline-primary','data-handler' => 'load-more-charms','data-page' => ''.e($page + 1).'','data-weapon-index' => ''.e($weaponIndex).'','data-skin-id' => ''.e($skinId).'','data-server-id' => ''.e($serverId).'','data-team' => ''.e($team).'','data-search' => ''.e($search).'']); ?>
                    <?php echo e(__('skinchanger.buttons.load_more')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Modules/Skinchanger/Resources/views/sidebar/charms.blade.php ENDPATH**/ ?>