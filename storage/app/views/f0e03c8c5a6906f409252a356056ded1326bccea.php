<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'label' => null,
    'active' => false,
    'disabled' => false,
    'name' => 'tab',
    'url' => null,
    'badge' => null,
    'withoutHtmx' => false,
    'reloadable' => false,
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
    'withoutHtmx' => false,
    'reloadable' => false,
]); ?>
<?php foreach (array_filter(([
    'label' => null,
    'active' => false,
    'disabled' => false,
    'name' => 'tab',
    'url' => null,
    'badge' => null,
    'withoutHtmx' => false,
    'reloadable' => false,
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
    $reloadable = filter_var($reloadable, FILTER_VALIDATE_BOOLEAN);

    $label = $label ?? $slot;
?>

<li class="tab-item <?php if($active): ?> active <?php endif; ?> <?php if($disabled): ?> is-disabled <?php endif; ?>"
    role="presentation" data-tab-heading="<?php echo e($name); ?>">
    <a role="tab" id="tab-<?php echo e($name); ?>" aria-selected="<?php echo e($active ? 'true' : 'false'); ?>"
        aria-controls="tab__<?php echo e($name); ?>" data-tab-id="tab__<?php echo e($name); ?>"
        data-reloadable="<?php echo e($reloadable ? 'true' : 'false'); ?>"
        <?php if($withoutHtmx && $url): ?> href="<?php echo e($url); ?>" <?php endif; ?>
        <?php if(!empty($url) && !$withoutHtmx): ?> 
            hx-get="<?php echo e($url); ?>"
            hx-target="#tab__<?php echo e($name); ?>"
            hx-swap="innerHTML" 
            <?php if($active && !$reloadable): ?>
                hx-trigger="load" 
            <?php elseif($reloadable): ?>
                hx-trigger="<?php if($active): ?> load, <?php endif; ?> click"
            <?php else: ?>
                hx-trigger="click once"
            <?php endif; ?>
            hx-indicator="#tab__<?php echo e($name); ?>"
        <?php endif; ?>
        tabindex="<?php echo e($active ? '0' : '-1'); ?>"
        <?php if($disabled): ?> aria-disabled="true" <?php endif; ?>
        <?php echo e($attributes); ?>

        >
        <?php echo $label; ?>


        <?php if(isset($badge)): ?>
            <span class="tab-badge" aria-hidden="true"><?php echo e($badge); ?></span>
        <?php endif; ?>
    </a>
</li>
<?php /**PATH /home/compvge/public_html/app/Themes/standard/views/components/tab-heading.blade.php ENDPATH**/ ?>