<a class="d-flex align-items-center gap-1" href="<?php echo e(url('admin/users/' . $user->id . '/edit')); ?>" hx-boost="true"
    hx-trigger="click" hx-target="#main" hx-swap="outerHTML transition:true"
    yoyo:ignore="yoyo:ignore" hx-params="not yoyo-id" target="_self" hx-include="none">
    <div class="avatar me-2">
        <img src="<?php echo e(asset($user->avatar ?? config('profile.default_avatar'))); ?>" alt="<?php echo e($user->name); ?>"
            class="rounded-circle" width="40" height="40" style="object-fit: cover; width: 40px; height: 40px;">
    </div>
    <div class="d-flex flex-column gap-1">
        <span>
            <?php echo e($user->name); ?>

        </span>
        <div class="d-flex align-items-center gap-1">
            <?php if($user->verified): ?>
                <span class="badge success"><?php echo e(__('admin-users.status.verified')); ?></span>
            <?php endif; ?>

            <?php if($user->hidden): ?>
                <span class="badge warning"><?php echo e(__('admin-users.status.hidden')); ?></span>
            <?php endif; ?>

            <?php if($user->isBlocked()): ?>
                <span class="badge danger"><?php echo e(__('admin-users.status.blocked')); ?></span>
            <?php endif; ?>
        </div>
        <small class="text-muted"><?php echo e($user->email); ?></small>
    </div>
</a><?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Packages/User/Resources/views/cells/user.blade.php ENDPATH**/ ?>