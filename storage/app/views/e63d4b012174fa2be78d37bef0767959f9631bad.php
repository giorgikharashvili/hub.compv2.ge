<?php $__env->startSection('title'); ?>
    <?php echo e(!empty(page()->title) ? page()->title : __('lk.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('content'); ?>
    <div class="h-100 container">
        <section class="lk-container" aria-labelledby="lk-title">
            <article class="lk-content" hx-swap="morph:outerHTML">
                <?php $__env->startFragment('lk-card'); ?>
                    <?php
$yoyo = \Clickfwd\Yoyo\Yoyo::getInstance();
if (Yoyo\is_spinning()) {
    echo $yoyo->mount('payment-form')->refresh();
} else {
    echo $yoyo->mount('payment-form')->render();
}
?>
                <?php echo $__env->stopFragment(); ?>
            </article>
        </section>
    </div>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('flute::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/pages/lk/index.blade.php ENDPATH**/ ?>