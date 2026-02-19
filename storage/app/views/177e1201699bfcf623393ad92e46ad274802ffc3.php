<div class="flex flex-col">
    <div class="flex items-center gap-2">
        <span class="font-medium"><?php echo e($server->name); ?></span>
        <?php if($server->display_ip): ?>
            <span class="text-muted">(<?php echo e($server->display_ip); ?>)</span>
        <?php else: ?>
            <span class="text-muted">(<?php echo e($server->getConnectionString()); ?>)</span>
        <?php endif; ?>
    </div>
    <small class="text-muted"><?php echo e($server->ranks); ?></small>
</div>
<?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Packages/Server/Resources/views/cells/server.blade.php ENDPATH**/ ?>