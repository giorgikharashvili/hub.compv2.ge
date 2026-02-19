<div class="steam-friends-container" hx-boost="true" hx-target="#main" hx-swap="outerHTML transition:true">
    <?php if(isset($friends) && count($friends) > 0): ?>
        <div class="steam-friends-list">
            <?php $__currentLoopData = $friends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $friend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(url('profile/' . $friend['user']->getUrl())); ?>" class="steam-friends-card" data-user-card>
                    <div
                        class="steam-friends-avatar <?php echo e($friend['user']->isOnline() ? 'steam-friends-avatar--online' : ''); ?>">
                        <img src="<?php echo e(asset($friend['user']->avatar)); ?>" alt="<?php echo e($friend['user']->name); ?>">
                    </div>
                    <div class="steam-friends-info">
                        <h3 class="steam-friends-name"><?php echo e($friend['user']->name); ?></h3>
                        <div class="steam-friends-status">
                            <?php if(method_exists($friend['user'], 'getLastLoggedPhrase')): ?>
                                <?php echo e($friend['user']->isOnline() ? __('steamfriends.online') : $friend['user']->getLastLoggedPhrase()); ?>

                            <?php else: ?>
                                <?php echo e($friend['user']->isOnline() ? __('steamfriends.online') : __($friend['user']->last_logged ? 'profile.was_online' : 'def.not_online', [':date' => carbon($friend['user']->last_logged)->diffForHumans()])); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <div class="steam-friends-empty">
            <?php echo e(__('steamfriends.no_friends')); ?>

        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Modules/SteamFriends/Resources/views/index.blade.php ENDPATH**/ ?>