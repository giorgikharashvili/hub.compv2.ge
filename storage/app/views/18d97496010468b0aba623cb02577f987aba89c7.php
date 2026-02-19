<?php if(config('app.bg_image') || config('app.bg_image_light')): ?>
    <?php $__env->startPush('styles'); ?>
        <style>
            <?php if(config('app.bg_image')): ?>
                html[data-theme="dark"] body {
                    background-image: url(<?php echo asset(config('app.bg_image')); ?>);
                    background-repeat: no-repeat;
                    background-attachment: fixed;
                    background-position: center center;
                    background-size: cover;
                }
            <?php endif; ?>

            <?php if(config('app.bg_image_light')): ?>
                html[data-theme="light"] body {
                    background-image: url(<?php echo asset(config('app.bg_image_light')); ?>);
                    background-repeat: no-repeat;
                    background-attachment: fixed;
                    background-position: center center;
                    background-size: cover;
                }
            <?php endif; ?>
        </style>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/partials/background.blade.php ENDPATH**/ ?>