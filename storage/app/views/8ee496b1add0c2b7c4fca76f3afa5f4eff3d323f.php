<div <?php echo e($attributes->merge(['class' => 'modal dialog-container '.($size ? 'modal--'.$size : '')])); ?> id="<?php echo e($id); ?>"
    role="dialog" aria-hidden="true" aria-labelledby="<?php echo e($id); ?>-title" aria-describedby="<?php echo e($id); ?>-content"
    data-a11y-dialog>

    <div class="modal__overlay dialog-overlay" tabindex="-1" <?php if($closeOnOverlay): ?> data-a11y-dialog-hide <?php endif; ?>></div>

    <div class="modal__container dialog-content" role="document" tabindex="0">
        <header class="modal__header <?php echo e(empty($title) ? 'modal__header-withoutHeading' : ''); ?>">
            <?php if($title): ?>
                <h4 class="modal__title" id="<?php echo e($id); ?>-title"><?php echo e($title); ?></h4>
            <?php endif; ?>
            <button class="modal__close dialog-close" aria-label="Close modal" data-tooltip="<?php echo e(__('def.close')); ?>"
                data-a11y-dialog-hide="<?php echo e($id); ?>"></button>
        </header>

        <div class="modal__content dialog-body" id="<?php echo e($id); ?>-content">
            <?php if($loadUrl): ?>
                <div hx-get="<?php echo e($loadUrl); ?>" hx-target="<?php echo e($loadTarget ?? '#'.$id.'-content'); ?>" hx-trigger="intersect"
                    hx-swap="innerHTML focus-scroll:false">

                    <?php if($skeleton): ?>
                        <?php echo $skeleton; ?>

                    <?php else: ?>
                        <div class="modal__content-loading">
                            <div class="skeleton modal__content-loading-box-large" aria-hidden="true"></div>
                            <div class="skeleton modal__content-loading-box" aria-hidden="true"></div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <?php echo e($slot); ?>

            <?php endif; ?>
        </div>

        <?php if(isset($footer)): ?>
            <footer class="modal__footer"><?php echo e($footer); ?></footer>
        <?php endif; ?>
    </div>
</div><?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/components/_modal-body.blade.php ENDPATH**/ ?>