<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'name' => '',
    'scrollable' => true,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'name' => '',
    'scrollable' => true,
]); ?>
<?php foreach (array_filter(([
    'name' => '',
    'scrollable' => true,
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
    $scrollable = filter_var($scrollable, FILTER_VALIDATE_BOOLEAN);
?>

<div <?php echo e($attributes->merge(['class' => 'tabs-container' . ($scrollable ? ' scrollable-tabs' : '')])); ?> data-tabs-id="tab__<?php echo e($name); ?>">
    <div class="tabs-nav-wrapper">
        <ul class="<?php echo e($name); ?>-headings tabs-nav" role="tablist">
            <?php echo e($headings); ?>

            <div class="underline" hx-preserve></div>
        </ul>
    </div>
    <?php echo e($slot); ?>

</div>
<?php /**PATH /home/compvge/public_html/app/Themes/standard/views/components/tabs.blade.php ENDPATH**/ ?>