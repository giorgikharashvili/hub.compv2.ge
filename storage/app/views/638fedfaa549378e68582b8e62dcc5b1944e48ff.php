<?php
    $service = $app->get('monitoring.service');

    $trans = 'monitoring.server';

    $hideInactive = isset($hideInactive) ? filter_var($hideInactive, FILTER_VALIDATE_BOOLEAN) : false;
    $limit = (int) ($limit ?? 50);
    $displayMode = $displayMode ?? 'standard';
    $showCountPlayers = isset($showCountPlayers) ? filter_var($showCountPlayers, FILTER_VALIDATE_BOOLEAN) : true;
    $showPlaceholders = isset($showPlaceholders) ? filter_var($showPlaceholders, FILTER_VALIDATE_BOOLEAN) : true;

    $limitedActiveServers = array_slice($activeServers, 0, $limit);
    $displayInactiveServers = !$hideInactive
        ? array_slice($inactiveServers, 0, $limit - count($limitedActiveServers))
        : [];
    $displayTotalServers = count($limitedActiveServers) + count($displayInactiveServers);
    
    $tableServers = [];
    foreach ($limitedActiveServers as $serverData) {
        $tableServers[] = [
            'server' => $serverData['server'],
            'status' => $serverData['status'],
            'isInactive' => false
        ];
    }
    
    if (!$hideInactive) {
        foreach ($displayInactiveServers as $serverData) {
            $tableServers[] = [
                'server' => $serverData['server'],
                'status' => $serverData['status'],
                'isInactive' => true
            ];
        }
    }
?>

<div class="monitoring-container">
    <header class="monitoring-header">
        <h2><?php echo e(__($trans . '.our_servers')); ?> <small class="text-muted">(<?php echo e($totalServers); ?>)</small></h2>

        <?php if($showCountPlayers): ?>
            <div class="monitoring-total">
                <div class="monitoring-total-info">
                    <p><?php echo e(__($trans . '.player.total')); ?>:</p>
                    <p class="monitoring-total-count"><?php echo e($totalPlayers['players']); ?> <span>/
                            <?php echo e($totalPlayers['max_players']); ?></span></p>
                </div>
                <div class="monitoring-total-progress" role="progressbar"
                    aria-valuenow="<?php echo e($totalPlayers['max_players'] > 0 ? ($totalPlayers['players'] / $totalPlayers['max_players']) * 100 : 0); ?>"
                    aria-valuemin="0" aria-valuemax="100">
                    <div class="monitoring-total-progress-bar"
                        style="width: <?php echo e($totalPlayers['max_players'] > 0 ? ($totalPlayers['players'] / $totalPlayers['max_players']) * 100 : 0); ?>%">
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </header>

    <?php if($displayMode === 'table'): ?>
        <?php if(count($tableServers) === 0): ?>
            <div class="monitoring-empty">
                <p><?php echo e(__($trans . '.no_servers')); ?></p>
            </div>
        <?php else: ?>
            <?php echo $__env->make('monitoring::components.server-table', ['servers' => $tableServers, 'service' => $service], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php else: ?>
        <div class="monitoring-grid monitoring-mode-<?php echo e($displayMode); ?> mt-3">
            <?php if(count($limitedActiveServers) === 0 && count($displayInactiveServers) === 0): ?>
                <div class="monitoring-empty">
                    <p><?php echo e(__($trans . '.no_servers')); ?></p>
                </div>
            <?php else: ?>
                <?php $__currentLoopData = $limitedActiveServers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serverData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('monitoring::components.server-card', [
                        'server' => $serverData['server'],
                        'status' => $serverData['status'],
                        'displayMode' => $displayMode,
                        'isInactive' => false,
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php $__currentLoopData = $displayInactiveServers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serverData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('monitoring::components.server-card', [
                        'server' => $serverData['server'],
                        'status' => $serverData['status'],
                        'displayMode' => $displayMode,
                        'isInactive' => true,
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php
                    $totalDisplayServersCount = count($limitedActiveServers) + count($displayInactiveServers);
                    $minCardsPerRow = 3;
                    $remainder = $totalDisplayServersCount % $minCardsPerRow;
                    $emptyCardsCount = $remainder > 0 ? $minCardsPerRow - $remainder : 0;
                ?>

                <?php if($showPlaceholders): ?>
                    <?php for($i = 0; $i < $emptyCardsCount; $i++): ?>
                        <div class="monitoring-empty-hide">
                            <div class="monitoring-empty-card"></div>
                        </div>
                    <?php endfor; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Modules/Monitoring/Resources/views/widgets/servers.blade.php ENDPATH**/ ?>