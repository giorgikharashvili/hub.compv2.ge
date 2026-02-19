<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'active' => false,
    'name' => 'tab',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'active' => false,
    'name' => 'tab',
]); ?>
<?php foreach (array_filter(([
    'active' => false,
    'name' => 'tab',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php
    $name = preg_replace('/[^\w-]/', '_', $name);
    $active = filter_var($active, FILTER_VALIDATE_BOOLEAN);
?>

<div role="tabpanel" id="tab__<?php echo e($name); ?>"
    <?php echo e($attributes->merge(['class' => 'tab-content ' . ($active ? 'active' : '')])); ?>>
    <?php echo e($slot); ?>

</div>
<?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Resources/views/components/tab-content.blade.php ENDPATH**/ ?>