<?php
    $server = $serverData['server'];
    $status = $serverData['status'];
    $isInactive = !isset($status->online) || !$status->online;
?>

<div class="monitoring-container monitoring-single-server">
    <div class="monitoring-mode-<?php echo e($displayMode ?? 'standard'); ?>">
        <div class="monitoring-single-server-content">
            <?php echo $__env->make('monitoring::components.server-card', [
                'server' => $server,
                'status' => $status,
                'displayMode' => $displayMode ?? 'standard',
                'isInactive' => $isInactive,
                'hideModal' => $hideModal ?? false,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Modules/Monitoring/Resources/views/widgets/single-server.blade.php ENDPATH**/ ?>