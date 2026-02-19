<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['class' => '', 'id', 'label']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['class' => '', 'id', 'label']); ?>
<?php foreach (array_filter((['class' => '', 'id', 'label']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div <?php echo e($attributes->merge(['class' => 'form-field ' . $class])); ?>>
    <?php if(isset($label)): ?>
        <?php echo $label; ?>

    <?php endif; ?>
    <?php echo e($slot); ?>

</div>
<?php /**PATH /home/compvge/public_html/app/Themes/standard/views/components/forms/field.blade.php ENDPATH**/ ?>