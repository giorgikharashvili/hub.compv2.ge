<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['name', 'id' => $name, 'checked' => false, 'label' => null, 'disabled' => false]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['name', 'id' => $name, 'checked' => false, 'label' => null, 'disabled' => false]); ?>
<?php foreach (array_filter((['name', 'id' => $name, 'checked' => false, 'label' => null, 'disabled' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<label class="toggle-switch">
    <?php if($label): ?>
        <span class="toggle-switch-label-text" id="<?php echo e($id); ?>-label"><?php echo e($label); ?></span>
    <?php endif; ?>
    <input type="checkbox" name="<?php echo e($name); ?>" id="<?php echo e($id); ?>" value="1"
        <?php if($checked): ?> checked <?php endif; ?> <?php if($disabled): ?> disabled <?php endif; ?>
        <?php echo e($attributes->merge(['class' => 'toggle-switch-input'])); ?>>
    <span class="toggle-switch-slider"></span>
</label>
<?php /**PATH /home/compvge/public_html/app/Themes/standard/views/components/fields/toggle.blade.php ENDPATH**/ ?>