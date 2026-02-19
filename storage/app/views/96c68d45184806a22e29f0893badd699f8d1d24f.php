<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'id' => 'default-modal',
    'title' => null,
    'loadUrl' => null,
    'loadTarget' => null,
    'footer' => null,
    'skeleton' => null,
    'closeOnOverlay' => true,
    'open' => false,
    'removeOnClose' => false,
    'type' => 'center',
    'size' => '',
    'containerClass' => '',
    'contentClass' => '',
    'withoutCloseButton' => false,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'id' => 'default-modal',
    'title' => null,
    'loadUrl' => null,
    'loadTarget' => null,
    'footer' => null,
    'skeleton' => null,
    'closeOnOverlay' => true,
    'open' => false,
    'removeOnClose' => false,
    'type' => 'center',
    'size' => '',
    'containerClass' => '',
    'contentClass' => '',
    'withoutCloseButton' => false,
]); ?>
<?php foreach (array_filter(([
    'id' => 'default-modal',
    'title' => null,
    'loadUrl' => null,
    'loadTarget' => null,
    'footer' => null,
    'skeleton' => null,
    'closeOnOverlay' => true,
    'open' => false,
    'removeOnClose' => false,
    'type' => 'center',
    'size' => '',
    'containerClass' => '',
    'contentClass' => '',
    'withoutCloseButton' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="modal <?php echo e($open ? 'is-open' : ''); ?> <?php echo e($type == 'right' ? 'right_sidebar' : ''); ?> <?php echo e($size ? 'modal--' . $size : ''); ?>"
    data-a11y-dialog="<?php echo e($id); ?>" id="<?php echo e($id); ?>"
    <?php if($removeOnClose): ?> data-remove-on-close <?php endif; ?>
    <?php if(!$open): ?> aria-hidden="true" <?php endif; ?> <?php echo $attributes; ?>>

    <div class="<?php echo e($type == 'right' ? 'right_sidebar__overlay' : 'modal__overlay'); ?>"
        <?php if($closeOnOverlay): ?> data-a11y-dialog-hide <?php endif; ?> role="presentation">
    </div>

    <div class="<?php echo e($type == 'right' ? 'right_sidebar__container' : 'modal__container'); ?> <?php echo e($containerClass); ?>"
        role="dialog" aria-modal="true" aria-labelledby="<?php echo e($id); ?>-title">
        <?php if($type != 'right'): ?>
            <?php if(!empty($title) || !$withoutCloseButton): ?>
                <header class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'modal__header',
                    'modal__header-withoutHeading' => empty($title),
                ]) ?>">
                    <?php if($title): ?>
                        <h5 class="modal__title" id="<?php echo e($id); ?>-title">
                            <?php echo e($title); ?>

                        </h5>
                    <?php endif; ?>
                    <?php if(!$withoutCloseButton): ?>
                        <button class="modal__close" aria-label="Close modal" data-tooltip="<?php echo __('def.close'); ?>"
                            data-a11y-dialog-hide="<?php echo e($id); ?>"></button>
                    <?php endif; ?>
                </header>
            <?php endif; ?>
        <?php else: ?>
            <header class="right_sidebar__header">
                <?php if($title): ?>
                    <h5 class="right_sidebar__title" id="<?php echo e($id); ?>-title">
                        <?php echo e($title); ?>

                    </h5>
                <?php endif; ?>
                <button class="right_sidebar__close" aria-label="Close modal" data-tooltip="<?php echo __('def.close'); ?>"
                    data-a11y-dialog-hide="<?php echo e($id); ?>"></button>
            </header>
        <?php endif; ?>
        <form class="<?php echo e($type == 'right' ? 'right_sidebar__content' : 'modal__content'); ?> <?php echo e($contentClass); ?>"
            id="<?php echo e($id); ?>-content">
            <?php if($loadUrl): ?>
                <div hx-get="<?php echo e($loadUrl); ?>" hx-target="<?php echo e($loadTarget ?? '#' . $id . '-content'); ?>"
                    hx-trigger="intersect" hx-swap="innerHTML focus-scroll:false">
                    <?php if($skeleton): ?>
                        <?php echo $skeleton; ?>

                    <?php else: ?>
                        <div class="modal__content-loading">
                            <div class="skeleton modal__content-loading-box-large"></div>
                            <div class="skeleton modal__content-loading-box"></div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <?php echo e($slot); ?>

            <?php endif; ?>
        </form>
        <?php if($type != 'right' && $footer): ?>
            <footer class="modal__footer">
                <?php echo e($footer); ?>

            </footer>
        <?php endif; ?>
        <?php if($type == 'right' && $footer): ?>
            <div class="right_sidebar__footer">
                <?php echo e($footer); ?>

            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Resources/views/components/modal.blade.php ENDPATH**/ ?>