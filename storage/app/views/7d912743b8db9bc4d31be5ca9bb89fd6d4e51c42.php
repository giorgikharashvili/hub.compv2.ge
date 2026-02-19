<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['type' => 'primary', 'href' => '#']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['type' => 'primary', 'href' => '#']); ?>
<?php foreach (array_filter((['type' => 'primary', 'href' => '#']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $baseClasses = 'link';
    $typeClasses = [
        'accent' => 'link-accent',
        'primary' => 'link-primary',
        'error' => 'link-error',
        'warning' => 'link-warning',
        'success' => 'link-success',
        'info' => 'link-info',
    ];
    $classes = $baseClasses . ' ' . ($typeClasses[(string) $type] ?? $typeClasses['primary']);
?>

<a href="<?php echo e($href); ?>" <?php echo e($attributes->merge(['class' => $classes])); ?>>
    <?php echo e($slot); ?>

</a>
<?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Resources/views/components/link.blade.php ENDPATH**/ ?>