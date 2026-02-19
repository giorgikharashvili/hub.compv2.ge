<li hx-boost="false">
    <button hx-get="<?php echo e(url('sidebar/miniprofile')); ?>" hx-target="#right-sidebar-content" class="navbar__profile"
        hx-swap="transition:false" aria-expanded="false" aria-label="<?php echo e(__('def.profile')); ?> <?php echo e(user()->name); ?>">
        <img data-profile-avatar src="<?php echo e(url(user()->avatar)); ?>" alt="<?php echo e(user()->name); ?>" loading="lazy" width="32"
            height="32">
    </button>
</li>
<?php /**PATH /home/compvge/public_html/app/Themes/standard/views/components/header/profile.blade.php ENDPATH**/ ?>