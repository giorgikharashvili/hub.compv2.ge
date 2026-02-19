<?php if($user->isOnline()): ?>
    <span class="badge success"><?php echo e(__('admin-users.status.online')); ?></span>
<?php else: ?>
    <span class="badge warning"><?php echo e(__('admin-users.status.offline')); ?></span>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Packages/User/Resources/views/cells/user-status.blade.php ENDPATH**/ ?>