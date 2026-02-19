<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'index',
    'weaponId' => null,
    'weaponIndex' => null,
    'skinId' => null,
    'itemId' => null,
    'itemType' => null,
    'paintIndex' => null,
    'teamRestriction' => null, // 'ct', 't', or null for no restriction
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'index',
    'weaponId' => null,
    'weaponIndex' => null,
    'skinId' => null,
    'itemId' => null,
    'itemType' => null,
    'paintIndex' => null,
    'teamRestriction' => null, // 'ct', 't', or null for no restriction
]); ?>
<?php foreach (array_filter(([
    'index',
    'weaponId' => null,
    'weaponIndex' => null,
    'skinId' => null,
    'itemId' => null,
    'itemType' => null,
    'paintIndex' => null,
    'teamRestriction' => null, // 'ct', 't', or null for no restriction
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $isAgentWithRestriction = false;
    $restrictedTeam = null;

    if ($itemType === 'agent' || $itemType === 'agents') {
        $isAgentWithRestriction = !empty($teamRestriction);
        $restrictedTeam = $teamRestriction;
    }
?>

<?php if(!$isAgentWithRestriction): ?>
    <div class="item-actions-menu">
        <button class="item-menu-trigger" data-dropdown-open="__item_menu_<?php echo e($weaponIndex); ?>_<?php echo e($index); ?>"
            data-dropdown-hover="true">
            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.dots-three-vertical','class' => 'icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
        <div class="item-actions-dropdown" data-dropdown="__item_menu_<?php echo e($weaponIndex); ?>_<?php echo e($index); ?>">
            <?php if(!$isAgentWithRestriction): ?>
                <a class="action-button" data-handler="apply-skin-team" data-target-team="both"
                    <?php if($weaponIndex): ?> data-weapon-index="<?php echo e($weaponIndex); ?>" <?php endif; ?>
                    <?php if($weaponId): ?> data-weapon-id="<?php echo e($weaponId); ?>" <?php endif; ?>
                    <?php if($skinId): ?> data-skin-id="<?php echo e($skinId); ?>" <?php endif; ?>
                    <?php if($itemId): ?> data-item-id="<?php echo e($itemId); ?>" <?php endif; ?>
                    <?php if($itemType): ?> data-item-type="<?php echo e($itemType); ?>" <?php endif; ?>
                    <?php if($paintIndex): ?> data-paint-index="<?php echo e($paintIndex); ?>" <?php endif; ?>>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'skinchanger::components.team-icon','data' => ['team' => 'both']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('skinchanger::team-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['team' => 'both']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php echo e(__('skinchanger.teams.both', 'Both Teams')); ?>

                </a>
            <?php endif; ?>

            <?php if(!$isAgentWithRestriction || $restrictedTeam !== 't'): ?>
                <a class="action-button" data-handler="apply-skin-team" data-target-team="ct"
                    <?php if($weaponIndex): ?> data-weapon-index="<?php echo e($weaponIndex); ?>" <?php endif; ?>
                    <?php if($weaponId): ?> data-weapon-id="<?php echo e($weaponId); ?>" <?php endif; ?>
                    <?php if($skinId): ?> data-skin-id="<?php echo e($skinId); ?>" <?php endif; ?>
                    <?php if($itemId): ?> data-item-id="<?php echo e($itemId); ?>" <?php endif; ?>
                    <?php if($itemType): ?> data-item-type="<?php echo e($itemType); ?>" <?php endif; ?>
                    <?php if($paintIndex): ?> data-paint-index="<?php echo e($paintIndex); ?>" <?php endif; ?>>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'skinchanger::components.team-icon','data' => ['team' => 'ct']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('skinchanger::team-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['team' => 'ct']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php echo e(__('skinchanger.teams.ct_only', 'CT Only')); ?>

                </a>
            <?php endif; ?>

            <?php if(!$isAgentWithRestriction || $restrictedTeam !== 'ct'): ?>
                <a class="action-button" data-handler="apply-skin-team" data-target-team="t"
                    <?php if($weaponIndex): ?> data-weapon-index="<?php echo e($weaponIndex); ?>" <?php endif; ?>
                    <?php if($weaponId): ?> data-weapon-id="<?php echo e($weaponId); ?>" <?php endif; ?>
                    <?php if($skinId): ?> data-skin-id="<?php echo e($skinId); ?>" <?php endif; ?>
                    <?php if($itemId): ?> data-item-id="<?php echo e($itemId); ?>" <?php endif; ?>
                    <?php if($itemType): ?> data-item-type="<?php echo e($itemType); ?>" <?php endif; ?>
                    <?php if($paintIndex): ?> data-paint-index="<?php echo e($paintIndex); ?>" <?php endif; ?>>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'skinchanger::components.team-icon','data' => ['team' => 't']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('skinchanger::team-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['team' => 't']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php echo e(__('skinchanger.teams.t_only', 'T Only')); ?>

                </a>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Modules/Skinchanger/Resources/views/components/team-action-menu.blade.php ENDPATH**/ ?>