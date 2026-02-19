<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'label' => null,
    'active' => false,
    'disabled' => false,
    'name' => 'tab',
    'url' => null,
    'badge' => null,
    'shouldTrigger' => true,
    'withoutHtmx' => false,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'label' => null,
    'active' => false,
    'disabled' => false,
    'name' => 'tab',
    'url' => null,
    'badge' => null,
    'shouldTrigger' => true,
    'withoutHtmx' => false,
]); ?>
<?php foreach (array_filter(([
    'label' => null,
    'active' => false,
    'disabled' => false,
    'name' => 'tab',
    'url' => null,
    'badge' => null,
    'shouldTrigger' => true,
    'withoutHtmx' => false,
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
    $disabled = filter_var($disabled, FILTER_VALIDATE_BOOLEAN);

    $label = $label ?? $slot;
?>

<li class='tab-item <?php echo e($active ? 'active' : ''); ?> <?php echo e($disabled ? ' is-disabled' : ''); ?>'>
    <a data-tab-id="tab__<?php echo e($name); ?>" <?php if($withoutHtmx && $url): ?> href="<?php echo e($url); ?>" <?php endif; ?>
        <?php if(!empty($url) && !$withoutHtmx): ?> hx-get="<?php echo e($url); ?>"
           hx-target="#tab__<?php echo e($name); ?>"
           <?php if($active && $shouldTrigger): ?> hx-trigger="load" <?php endif; ?>
        <?php endif; ?>
        <?php echo e($attributes); ?>

        >
        <?php echo $label; ?>


        <?php if(isset($badge)): ?>
            <span class="tab-badge"><?php echo e($badge); ?></span>
        <?php endif; ?>
    </a>
</li>
<?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Resources/views/components/tab-heading.blade.php ENDPATH**/ ?>