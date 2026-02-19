<div class="d-flex items-center gap-2">
    <span class="badge <?php echo e($social->allowToRegister ? 'success' : 'error'); ?>" title="<?php echo e(__('admin-social.table.allow_register')); ?>">
        <?php echo e($social->allowToRegister ? __('admin-social.status.active') : __('admin-social.status.inactive')); ?>

    </span>
</div>
<?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Packages/Social/Resources/views/cells/allow_to_register.blade.php ENDPATH**/ ?>