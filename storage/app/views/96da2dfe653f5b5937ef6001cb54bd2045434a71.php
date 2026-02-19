<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['name', 'value' => '', 'rows' => 4]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['name', 'value' => '', 'rows' => 4]); ?>
<?php foreach (array_filter((['name', 'value' => '', 'rows' => 4]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="textarea-wrapper">
    <div class="textarea__field-container">
        <textarea name="<?php echo e($name); ?>" id="<?php echo e($attributes->get('id', $name)); ?>" rows="<?php echo e($rows); ?>"
            <?php echo e($attributes->class(['textarea__field'])->merge(['class' => 'textarea__field'])); ?>><?php echo e($value); ?></textarea>
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
<?php /**PATH /home/compvge/public_html/app/Themes/standard/views/components/fields/textarea.blade.php ENDPATH**/ ?>