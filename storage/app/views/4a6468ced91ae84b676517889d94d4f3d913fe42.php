<?php $__env->startPush('head'); ?>
    <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction('Core/Modules/Admin/Packages/Update/Resources/assets/js/update.js', false); ?>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.updates-panel .card').forEach((card, i) => {
                card.style.animationDelay = (i * 60) + 'ms';
            });
            document.querySelectorAll('.updates-panel details').forEach((d) => {
                d.addEventListener('toggle', () => {
                    if (d.open) {
                        const body = d.querySelector('.more-body, ul, .history-timeline');
                        if (body) body.style.animation = 'slideIn .2s ease-out';
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Packages/Update/Resources/views/components/javascript.blade.php ENDPATH**/ ?>