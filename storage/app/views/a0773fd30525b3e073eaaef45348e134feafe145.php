<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'name' => '',
    'label' => '',
    'value' => '',
    'rows' => 5,
    'placeholder' => '',
    'readOnly' => false,
    'withoutBottom' => false,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'name' => '',
    'label' => '',
    'value' => '',
    'rows' => 5,
    'placeholder' => '',
    'readOnly' => false,
    'withoutBottom' => false,
]); ?>
<?php foreach (array_filter(([
    'name' => '',
    'label' => '',
    'value' => '',
    'rows' => 5,
    'placeholder' => '',
    'readOnly' => false,
    'withoutBottom' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $hasError = $errors->has($name);
?>

<div class="textarea-wrapper">
    <?php if($label): ?>
        <label class="textarea__prefix" for="<?php echo e($attributes->get('id', $name)); ?>">
            <?php echo e($label); ?>

        </label>
    <?php endif; ?>

    <div class="textarea__field-container <?php echo e($hasError ? 'has-error' : ''); ?>">
        <textarea name="<?php echo e($name); ?>" id="<?php echo e($attributes->get('id', $name)); ?>" class="textarea__field"
            rows="<?php echo e($rows); ?>" placeholder="<?php echo e($placeholder); ?>" <?php if($readOnly): ?> readonly <?php endif; ?>
            <?php echo e($attributes->merge(['class' => 'textarea__field'])); ?>><?php echo e($value); ?></textarea>
    </div>

    <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="textarea__error"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>
<?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Resources/views/components/fields/textarea.blade.php ENDPATH**/ ?>