<?php
    $service = $app->get('monitoring.service');
    $hasError = isset($status->online) && !$status->online;
    $trans = 'monitoring.server';
    $serverId = $server->id;
    $isCsGo = $status->game === '730' && !empty($status->additional);
    $additionalData = $isCsGo ? json_decode($status->additional, true) : null;
?>

<head>
    <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(mm('Monitoring', 'Resources/assets/js/monitoring.js')); ?>
</head>

<?php if($isCsGo): ?>
    <?php echo $__env->make('monitoring::components.server-full-details', ['server' => $server, 'status' => $status], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('monitoring::components.server-partial-details', ['server' => $server, 'status' => $status], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Modules/Monitoring/Resources/views/server-details.blade.php ENDPATH**/ ?>