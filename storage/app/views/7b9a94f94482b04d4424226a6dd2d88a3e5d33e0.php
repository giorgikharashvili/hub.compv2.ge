<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['for' => null, 'required' => false]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['for' => null, 'required' => false]); ?>
<?php foreach (array_filter((['for' => null, 'required' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<label for="<?php echo e($for); ?>" <?php echo e($attributes->class(['form__label', 'form__label-required' => $required])); ?>>
    <?php echo e($slot); ?>

</label>
<?php /**PATH /home/compvge/public_html/app/Themes/standard/views/components/forms/label.blade.php ENDPATH**/ ?>