<?php $__env->startPush('content'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Yoyo.url = '<?php echo e(url($slug)); ?>';
        });

        if (window.Yoyo) {
            Yoyo.url = '<?php echo e(url($slug)); ?>';
        }
    </script>

    <div hx-swap="morph:outerHTML" hx-encoding="multipart/form-data">
        <?php
$yoyo = \Clickfwd\Yoyo\Yoyo::getInstance();
if (Yoyo\is_spinning()) {
    echo $yoyo->mount($screen, ['slug' => $slug])->refresh();
} else {
    echo $yoyo->mount($screen, ['slug' => $slug])->render();
}
?>
    </div>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/compvge/public_html/bootstrap/../app/Core/Modules/Admin/Resources/views/layouts/screen.blade.php ENDPATH**/ ?>