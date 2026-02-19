<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['type', 'identifier' => null]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['type', 'identifier' => null]); ?>
<?php foreach (array_filter((['type', 'identifier' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $updateService = app(\Flute\Core\Update\Services\UpdateService::class);
    $hasUpdate = $updateService->hasUpdate($type, $identifier);
    $details = $updateService->getUpdateDetails($type, $identifier);
?>

<?php if($hasUpdate): ?>
    <div class="version-info" yoyo:ignore>
        <a href="<?php echo e(url('/admin/update')); ?>" hx-boost="true" hx-target="#main" hx-swap="outerHTML transition:true"
            <?php echo e($attributes->merge(['class' => 'version-update-link'])); ?>

            title="<?php echo e(__('admin-update.available')); ?> <?php echo e($details['version'] ?? ''); ?>">
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
            <?php echo e(__('admin-update.updates_available')); ?> v<?php echo e($details['version'] ?? ''); ?>

        </a>
    </div>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Packages/Update/Resources/views/components/update-badge.blade.php ENDPATH**/ ?>