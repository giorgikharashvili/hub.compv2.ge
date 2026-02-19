<div class="page-info">
    <div class="page-info-title"><?php echo e($page->title); ?></div>
    <div class="page-info-route"><?php echo e($page->route); ?></div>
    <?php if($page->description): ?>
        <div class="page-info-description"><?php echo e(\Illuminate\Support\Str::limit($page->description, 100)); ?></div>
    <?php endif; ?>
</div>
<?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Packages/Pages/Resources/views/cells/page-info.blade.php ENDPATH**/ ?>