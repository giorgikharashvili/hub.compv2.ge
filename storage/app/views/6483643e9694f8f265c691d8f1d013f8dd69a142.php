<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'name' => '',
    'pills' => false,
    'sticky' => true,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'name' => '',
    'pills' => false,
    'sticky' => true,
]); ?>
<?php foreach (array_filter(([
    'name' => '',
    'pills' => false,
    'sticky' => true,
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
?>

<div <?php echo e($attributes->merge(['class' => 'tabs-container' . ($pills ? ' pills' : ''), 'data-sticky' => $sticky ? 'true' : 'false'])); ?>

    data-tabs-id="tab__<?php echo e($name); ?>">
    <div class="tabs-nav-scroll">
        <ul class="<?php echo e($name); ?>-headings tabs-nav">
            <?php echo e($headings); ?>

            <div class="underline" hx-swap="none"></div>
        </ul>
    </div>

    <?php echo e($slot); ?>

</div>
<?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Resources/views/components/tabs.blade.php ENDPATH**/ ?>