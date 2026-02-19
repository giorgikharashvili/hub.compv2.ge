<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'title' => null,
    'subtitle' => null,
    'footerText' => null,
    'withoutPadding' => false,
    'headerClass' => '',
    'bodyClass' => '',
    'footerClass' => '',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'title' => null,
    'subtitle' => null,
    'footerText' => null,
    'withoutPadding' => false,
    'headerClass' => '',
    'bodyClass' => '',
    'footerClass' => '',
]); ?>
<?php foreach (array_filter(([
    'title' => null,
    'subtitle' => null,
    'footerText' => null,
    'withoutPadding' => false,
    'headerClass' => '',
    'bodyClass' => '',
    'footerClass' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<article <?php echo e($attributes->merge(['class' => 'card'])); ?>>
    <?php if(isset($header)): ?>
        <header class="card-header <?php echo e($headerClass); ?>">
            <?php echo e($header); ?>

        </header>
    <?php elseif($title || $subtitle): ?>
        <header class="card-header <?php echo e($headerClass); ?>">
            <?php if($title): ?>
                <h5 class="card-title"><?php echo e($title); ?></h5>
            <?php endif; ?>
            <?php if($subtitle): ?>
                <h6 class="card-subtitle"><?php echo e($subtitle); ?></h6>
            <?php endif; ?>
        </header>
    <?php endif; ?>

    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['card-body', $bodyClass, $withoutPadding ? 'withoutPadding' : '']) ?>">
        <?php echo e($slot); ?>

    </div>

    <?php if(isset($footer)): ?>
        <footer class="card-footer <?php echo e($footerClass); ?>">
            <?php echo e($footer); ?>

        </footer>
    <?php elseif($footerText): ?>
        <footer class="card-footer <?php echo e($footerClass); ?>">
            <?php echo e($footerText); ?>

        </footer>
    <?php endif; ?>
</article>
<?php /**PATH /home/compvge/public_html/app/Themes/standard/views/components/card.blade.php ENDPATH**/ ?>