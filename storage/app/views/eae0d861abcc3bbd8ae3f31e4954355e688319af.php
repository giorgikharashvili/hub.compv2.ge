<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'type' => 'primary',
    'size' => 'medium',
    'disabled' => false,
    'withLoading' => false,
    'isLink' => false,
    'submit' => false,
    'href' => null,
    'swap' => false,
    'swapTarget' => '#main',
    'swapSwap' => 'outerHTML transition:true',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'type' => 'primary',
    'size' => 'medium',
    'disabled' => false,
    'withLoading' => false,
    'isLink' => false,
    'submit' => false,
    'href' => null,
    'swap' => false,
    'swapTarget' => '#main',
    'swapSwap' => 'outerHTML transition:true',
]); ?>
<?php foreach (array_filter(([
    'type' => 'primary',
    'size' => 'medium',
    'disabled' => false,
    'withLoading' => false,
    'isLink' => false,
    'submit' => false,
    'href' => null,
    'swap' => false,
    'swapTarget' => '#main',
    'swapSwap' => 'outerHTML transition:true',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $baseClasses = 'btn';
    $typeClasses = [
        'accent' => 'btn-accent',
        'primary' => 'btn-primary',
        'error' => 'btn-error',
        'warning' => 'btn-warning',
        'success' => 'btn-success',
        'outline-accent' => 'btn-outline-accent',
        'outline-primary' => 'btn-outline-primary',
        'outline-error' => 'btn-outline-error',
        'outline-warning' => 'btn-outline-warning',
        'outline-success' => 'btn-outline-success',
    ];
    $sizeClasses = [
        'tiny' => 'btn-tiny',
        'small' => 'btn-small',
        'medium' => 'btn-medium',
        'large' => 'btn-large',
    ];
    $classes =
        $baseClasses .
        ' ' .
        ($typeClasses[(string) $type] ?? $typeClasses['primary']) .
        ' ' .
        ($sizeClasses[(string) $size] ?? $sizeClasses['medium']);
?>

<?php if($isLink || (isset($href) && !empty($href))): ?>
    <a <?php if($swap): ?> hx-boost="true" hx-target="<?php echo e($swapTarget); ?>" hx-swap="<?php echo e($swapSwap); ?>" <?php endif; ?>
        <?php echo e($attributes->merge(['class' => $classes, 'role' => $isLink ? 'button' : null, 'aria-disabled' => $disabled ? 'true' : 'false'])); ?>

        <?php if($href): ?> href="<?php echo e($href); ?>" <?php endif; ?>
        <?php if($withLoading): ?> data-loading-aria-busy <?php endif; ?>
        <?php if($disabled): ?> tabindex="-1" aria-disabled="true" <?php endif; ?>>
        <?php echo e($slot); ?>

    </a>
<?php else: ?>
    <button <?php echo e($attributes->merge(['class' => $classes])); ?> type="<?php echo e($submit ? 'submit' : 'button'); ?>"
        <?php if($disabled): echo 'disabled'; endif; ?> <?php if($withLoading): ?> data-loading-aria-busy <?php endif; ?>>
        <?php echo e($slot); ?>

    </button>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/app/Themes/standard/views/components/button.blade.php ENDPATH**/ ?>