<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['vipOnlyMode' => false, 'hasVipAccess' => false]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['vipOnlyMode' => false, 'hasVipAccess' => false]); ?>
<?php foreach (array_filter((['vipOnlyMode' => false, 'hasVipAccess' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if($vipOnlyMode && !$hasVipAccess): ?>
    <div class="vip-tooltip">
        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.crown-simple','class' => 'vip-icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
        <?php echo e(__(config('skinchanger.vip_only_message', 'skinchanger.vip.required_tooltip'))); ?>

    </div>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Modules/Skinchanger/Resources/views/components/vip-tooltip.blade.php ENDPATH**/ ?>