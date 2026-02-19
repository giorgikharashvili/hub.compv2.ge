<div>
    v<?php echo e($theme->version); ?>


    <?php echo $__env->make('admin-update::components.update-badge', [
        'type' => 'themes',
        'identifier' => $theme->key,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Packages/Theme/Resources/views/cells/version.blade.php ENDPATH**/ ?>