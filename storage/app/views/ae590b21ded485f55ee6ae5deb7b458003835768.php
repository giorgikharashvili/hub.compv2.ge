<div class="d-flex items-center gap-2">
    <span class="badge <?php echo e($social->enabled ? 'success' : 'error'); ?>" title="<?php echo e(__('admin-social.fields.enabled.label')); ?>">
        <?php echo e($social->enabled ? __('admin-social.status.active') : __('admin-social.status.inactive')); ?>

    </span>
</div>
<?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Packages/Social/Resources/views/cells/enabled.blade.php ENDPATH**/ ?>