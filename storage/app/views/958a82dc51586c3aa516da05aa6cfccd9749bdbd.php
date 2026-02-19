<?php
    $service = $app->get('monitoring.service');
    $hasError = isset($status->online) && !$status->online;
    $trans = 'monitoring.server';
    $serverId = $server->id;
?>

<div class="server-details">
    <div class="server-details-header">
        <?php if($server->enabled && !$hasError): ?>
            <div class="server-details-image">
                <img src="<?php echo e($service->getMapPreview($status)); ?>"
                    alt="<?php echo e($status->map ?? __($trans . '.player.unknown')); ?> map preview">
                <div class="server-details-image-map"><?php echo e($status->map ?? __($trans . '.player.unknown')); ?></div>
            </div>
        <?php endif; ?>

        <div class="server-details-info">
            <div class="server-details-info-grid">
                <div class="server-details-info-item">
                    <div class="server-details-info-item-label"><?php echo e(__($trans . '.ip')); ?></div>
                    <div class="server-details-info-item-value copyable"
                        data-tooltip="<?php echo e(__($trans . '.actions.copy_ip')); ?>"
                        data-copy="<?php echo e($server->getConnectionString()); ?>"
                        onclick="notyf.success('<?php echo e(__($trans . '.actions.copy_ip_success')); ?>')">
                        <?php echo e($server->getConnectionString()); ?>

                    </div>
                </div>

                <?php if($server->enabled && !$hasError): ?>
                    <div class="server-details-info-item">
                        <div class="server-details-info-item-label"><?php echo e(__($trans . '.map')); ?></div>
                        <div class="server-details-info-item-value"><?php echo e($status->map ?? __($trans . '.player.unknown')); ?>

                        </div>
                    </div>
                <?php endif; ?>

                <div class="server-details-info-item">
                    <div class="server-details-info-item-label"><?php echo e(__($trans . '.players')); ?></div>
                    <div class="server-details-info-item-value">
                        <?php if($server->enabled && !$hasError): ?>
                            <span class="player-count"><?php echo e($status->players); ?> / <?php echo e($status->max_players); ?></span>
                        <?php else: ?>
                            <span class="player-count">0 / 0</span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="server-details-info-item">
                    <div class="server-details-info-item-label"><?php echo e(__($trans . '.status')); ?></div>
                    <div class="server-details-info-item-status">
                        <?php if(!$server->enabled): ?>
                            <span class="server-details-info-item-status-indicator inactive"></span>
                            <span><?php echo e(__($trans . '.inactive')); ?></span>
                        <?php elseif($hasError): ?>
                            <span class="server-details-info-item-status-indicator offline"></span>
                            <span><?php echo e(__($trans . '.error')); ?></span>
                        <?php else: ?>
                            <span class="server-details-info-item-status-indicator online"></span>
                            <span><?php echo e(__($trans . '.online')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php if(!$server->enabled): ?>
                <div class="server-details-message">
                    <div class="server-details-message-text">
                        <?php echo e(__($trans . '.maintenance')); ?>

                    </div>
                </div>
            <?php elseif($hasError): ?>
                <div class="server-details-message">
                    <div class="server-details-message-text">
                        <?php echo e(__($trans . '.unavailable')); ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if (\Illuminate\Support\Facades\Blade::check('can', 'admin.servers')): ?>
        <?php if($hasError && config('app.cron_mode')): ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.alert','data' => ['type' => 'warning','class' => 'server-details-message','withClose' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'warning','class' => 'server-details-message','withClose' => 'false']); ?>
                <?php echo e(__($trans . '.cron_message')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <?php endif; ?>

        <?php if($server->mod == 730 && $status->players > 0): ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.alert','data' => ['type' => 'warning','class' => 'server-details-plugin-alert','withClose' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'warning','class' => 'server-details-plugin-alert','withClose' => 'false']); ?>
                <?php echo __($trans . '.plugin_alert', ['url' => 'https://github.com/Pisex/cs2-PlayersListCommand']); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>

    <?php if($server->enabled && !$hasError): ?>
        <div class="server-details-players">
            <div class="server-details-players-header">
                <h4>
                    <?php echo e(__($trans . '.player_list')); ?>

                    <?php if($status->players > 0): ?>
                        <span class="count"><?php echo e($status->players); ?></span>
                    <?php endif; ?>
                </h4>

                <?php if($status->players > 5): ?>
                    <div class="server-details-players-search">
                        <input type="text" placeholder="<?php echo e(__($trans . '.player.search')); ?>"
                            class="server-details-players-search-input">
                    </div>
                <?php endif; ?>
            </div>

            <?php if($status->players > 0 && !empty($status->getPlayersData())): ?>
                <?php
                    $players = collect($status->getPlayersData());

                    $allEmpty = false;

                    if (!$players->isEmpty()) {
                        $allEmpty = $players->every(function ($player) {
                            return empty(trim($player['Name']));
                        });
                    }
                ?>

                <?php if($allEmpty && user()->can('admin.servers')): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.alert','data' => ['type' => 'warning','class' => 'server-details-players-empty','withClose' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'warning','class' => 'server-details-players-empty','withClose' => 'false']); ?>
                        <?php echo __($trans . '.empty_players_alert', ['url' => 'https://github.com/Source2ZE/ServerListPlayersFix']); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php endif; ?>

                <div class="server-details-players-table-wrapper">
                    <table class="server-details-players-table">
                        <thead>
                            <tr>
                                <th><?php echo e(__($trans . '.player.name')); ?></th>
                                <th><?php echo e(__($trans . '.player.score')); ?></th>
                                <th><?php echo e(__($trans . '.player.time')); ?></th>
                            </tr>
                        </thead>
                        <tbody id="playerTableBody-<?php echo e($serverId); ?>">

                            <?php $__currentLoopData = $players; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="player-row">
                                    <td class="player-name"><?php echo e($player['Name'] ?: __($trans . '.player.unknown')); ?>

                                    </td>
                                    <td class="player-score"><?php echo e(isset($player['Frags']) ? $player['Frags'] : ($player['Score'] ?? '0')); ?></td>
                                    <td class="player-time">
                                        <?php echo e($player['Time'] ? gmdate('H:i:s', $player['Time']) : '00:00:00'); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <div id="noPlayersFound-<?php echo e($serverId); ?>" class="server-details-empty" style="display: none;">
                    <?php echo e(__($trans . '.player.no_results')); ?>

                </div>
            <?php else: ?>
                <div class="server-details-empty">
                    <?php echo e(__($trans . '.no_players')); ?>

                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<div class="modal__footer modal__footer-server-details">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['type' => 'outline-primary','class' => 'w-100','dataA11yDialogHide' => ''.e('server-details-' . $server->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'outline-primary','class' => 'w-100','data-a11y-dialog-hide' => ''.e('server-details-' . $server->id).'']); ?>
        <?php echo e(__($trans . '.actions.close')); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php if($server->enabled && !$hasError): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['type' => 'success','class' => 'w-100','onclick' => 'navigator.clipboard?.writeText(\'connect '.e($server->ip).':'.e($server->port).'\').catch(()=>{}); window.location=\'steam://connect/'.e($server->ip).':'.e($server->port).'\'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'success','class' => 'w-100','onclick' => 'navigator.clipboard?.writeText(\'connect '.e($server->ip).':'.e($server->port).'\').catch(()=>{}); window.location=\'steam://connect/'.e($server->ip).':'.e($server->port).'\'']); ?>
            <?php echo e(__($trans . '.actions.play')); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php endif; ?>
</div>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Modules/Monitoring/Resources/views/components/server-partial-details.blade.php ENDPATH**/ ?>