<?php if($notifications): ?>
    <ul class="notifications__items">
        <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('flute::partials.notifications.item', ['notification' => $notification], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php else: ?>
    <p class="notifications__empty"><?php echo __('def.no_notifications'); ?></p>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/partials/notifications/list.blade.php ENDPATH**/ ?>