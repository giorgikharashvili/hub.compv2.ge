<?php
    $service = $app->get('monitoring.service');
    $trans = 'monitoring.server';
    $displayMode = $displayMode ?? 'standard';
    $hasError = isset($status->online) && !$status->online;
    $isInactive = isset($isInactive) ? $isInactive : false;
    $percentColor = 'success';

    if (!$isInactive && isset($status->max_players)) {
        $playerPercentage = $status->max_players > 0 ? ($status->players / $status->max_players) * 100 : 0;

        if ($playerPercentage > 60) {
            $percentColor = 'error';
        } elseif ($playerPercentage > 30) {
            $percentColor = 'warning';
        }
    }
?>

<?php if($displayMode === 'mode'): ?>
    <?php
        $players = $status->players ?? 0;
        $maxPlayers = $status->max_players ?? 0;
        $map = $status->map ?? __($trans . '.player.unknown');
        $fillPercentage = $maxPlayers > 0 ? ($players / $maxPlayers) * 100 : 0;
        $isFull = $players >= $maxPlayers && $maxPlayers > 0;
        $isEmpty = $players == 0;
        $connect = $server->getConnectionString();
        $steamConnect = 'steam://connect/' . $server->ip . ':' . $server->port;
        $mapPreview = $service->getMapPreview($status ?? null);

        $loadClass = 'load-low';
        if ($fillPercentage > 75) {
            $loadClass = 'load-high';
        } elseif ($fillPercentage > 40) {
            $loadClass = 'load-medium';
        }
    ?>

    <div class="monitoring-card-mode <?php echo e($isFull ? 'server-full' : ''); ?> <?php echo e($isEmpty ? 'server-empty' : ''); ?>">
        <div class="server-info">
            <div class="server-header">
                <div class="server-header-content">
                    <div class="server-name"><?php echo e(__($server->name)); ?></div>
                    <div class="server-details">
                        <div class="server-stats">
                            <div class="server-map">
                                <img src="<?php echo e($mapPreview); ?>" alt="<?php echo e($map); ?>" loading="lazy" />
                            </div>
                            <div class="server-players <?php echo e($isFull ? 'is-full' : ($players > 0 ? 'has-players' : '')); ?>"
                                <?php if(!isset($hideModal) || !$hideModal): ?> onclick="openModal('server-details-<?php echo e($server->id); ?>')" <?php endif; ?>>
                                <?php echo e($players); ?>/<?php echo e($maxPlayers); ?>

                            </div>
                            <div class="server-map-name">
                                <?php echo e($map); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="server-actions">
                    <button class="server-action-btn copy-ip" data-copy="connect <?php echo e($connect); ?>"
                        onclick="notyf.success('<?php echo e(__($trans . '.actions.copy_ip_success')); ?>')"
                        data-tooltip="<?php echo e(__($trans . '.actions.copy_ip')); ?>">
                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.copy'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
                    </button>
                    <?php if(!$isInactive): ?>
                        <a href="<?php echo e($steamConnect); ?>" class="connect-button"
                            data-tooltip="<?php echo e(__($trans . '.actions.play')); ?>">
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.play'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="server-load <?php echo e($loadClass); ?>">
                <div class="server-load-bar">
                    <div class="server-load-fill" style="width: <?php echo e($fillPercentage); ?>%"></div>
                </div>
            </div>
        </div>
    </div>

    <?php if(!isset($hideModal) || !$hideModal): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.modal','data' => ['id' => 'server-details-'.e($server->id).'','title' => ''.e(__($server->name)).'','class' => 'server-details-modal','loadUrl' => ''.e(url('api/monitoring/server/' . $server->id)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'server-details-'.e($server->id).'','title' => ''.e(__($server->name)).'','class' => 'server-details-modal','loadUrl' => ''.e(url('api/monitoring/server/' . $server->id)).'']); ?>
             <?php $__env->slot('skeleton', null, []); ?> 
                <?php echo $__env->make('monitoring::server-details-skeleton', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php endif; ?>
<?php else: ?>
    <article class="monitoring-card <?php echo e($isInactive ? 'monitoring-card-inactive' : ''); ?>">
        <?php if(!$isInactive || $displayMode === 'standard'): ?>
            <figure class="monitoring-card-image">
                <img src="<?php echo e($isInactive ? $service->getMapPreview(null) : $service->getMapPreview($status)); ?>"
                    loading="lazy"
                    alt="<?php echo e($isInactive ? __($trans . '.player.unknown') : $status->map ?? __($trans . '.player.unknown')); ?> map preview">
            </figure>
        <?php endif; ?>

        <div class="monitoring-card-info">
            <div class="monitoring-card-info-block">
                <h3 class="monitoring-card-title">
                    <?php echo e(__($server->name)); ?>

                    <?php if($isInactive || $hasError): ?>
                        <span class="monitoring-card-error-icon"
                            title="<?php echo e($isInactive ? __($trans . '.status_icon.inactive') : __($trans . '.status_icon.error')); ?>"
                            data-tooltip="<?php echo e($isInactive ? __($trans . '.status_icon.inactive') : __($trans . '.status_icon.error')); ?>">
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.warning-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
                        </span>
                    <?php endif; ?>
                </h3>

                <ul class="monitoring-card-badges">
                    <li class="monitoring-card-badges-badge ip copyable"
                        data-tooltip="<?php echo e(__($trans . '.actions.copy_ip')); ?>"
                        data-copy="connect <?php echo e($server->getConnectionString()); ?>">
                        <?php echo e($isInactive && isset($server->display_ip) ? $server->display_ip : $server->getConnectionString()); ?>

                    </li>
                    <?php if(!$isInactive && !$hasError && ($displayMode === 'standard' || $displayMode === 'compact')): ?>
                        <li class="monitoring-card-badges-badge map">
                            <?php echo e($status->map ?? __($trans . '.player.unknown')); ?>

                        </li>
                    <?php endif; ?>
                    <?php if(($isInactive || $hasError) && $displayMode !== 'ultracompact'): ?>
                        <li class="monitoring-card-badges-badge status offline"><?php echo e(__($trans . '.offline')); ?></li>
                    <?php endif; ?>
                </ul>

                <?php if(!$isInactive): ?>
                    <div class="monitoring-card-players">
                        <p><?php echo e(__($trans . '.players')); ?>:</p>
                        <p class="monitoring-card-players-total"><?php echo e($status->players); ?> <span>/
                                <?php echo e($status->max_players); ?></span></p>
                    </div>
                <?php endif; ?>

                <div class="monitoring-card-buttons">
                    <?php if(!$isInactive && $displayMode !== 'ultracompact'): ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['type' => 'primary','size' => 'small','onclick' => 'navigator.clipboard?.writeText(\'connect '.e($server->ip).':'.e($server->port).'\').catch(()=>{}); window.location=\'steam://connect/'.e($server->ip).':'.e($server->port).'\'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'primary','size' => 'small','onclick' => 'navigator.clipboard?.writeText(\'connect '.e($server->ip).':'.e($server->port).'\').catch(()=>{}); window.location=\'steam://connect/'.e($server->ip).':'.e($server->port).'\'']); ?>
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.play'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?><?php echo e(__($trans . '.actions.play')); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php if(!isset($hideModal) || !$hideModal): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['type' => 'outline-primary','size' => 'small','class' => 'monitoring-card-buttons-more','onclick' => 'openModal(\'server-details-'.e($server->id).'\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'outline-primary','size' => 'small','class' => 'monitoring-card-buttons-more','onclick' => 'openModal(\'server-details-'.e($server->id).'\')']); ?>
                                <?php echo e(__($trans . '.actions.more')); ?>

                                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.dots-three'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php endif; ?>
                    <?php elseif(!$isInactive && $displayMode === 'ultracompact'): ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['type' => 'primary','size' => 'small','dataTooltip' => ''.e(__($trans . '.actions.play')).'','onclick' => 'navigator.clipboard?.writeText(\'connect '.e($server->ip).':'.e($server->port).'\').catch(()=>{}); window.location=\'steam://connect/'.e($server->ip).':'.e($server->port).'\'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'primary','size' => 'small','data-tooltip' => ''.e(__($trans . '.actions.play')).'','onclick' => 'navigator.clipboard?.writeText(\'connect '.e($server->ip).':'.e($server->port).'\').catch(()=>{}); window.location=\'steam://connect/'.e($server->ip).':'.e($server->port).'\'']); ?>
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.play'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php if(!isset($hideModal) || !$hideModal): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['type' => 'outline-primary','size' => 'small','class' => 'monitoring-card-buttons-more','dataTooltip' => ''.e(__($trans . '.actions.more')).'','onclick' => 'openModal(\'server-details-'.e($server->id).'\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'outline-primary','size' => 'small','class' => 'monitoring-card-buttons-more','data-tooltip' => ''.e(__($trans . '.actions.more')).'','onclick' => 'openModal(\'server-details-'.e($server->id).'\')']); ?>
                                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.dots-three'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['type' => 'outline-primary','size' => 'small','class' => 'monitoring-card-buttons-more','onclick' => 'openModal(\'server-details-'.e($server->id).'\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'outline-primary','size' => 'small','class' => 'monitoring-card-buttons-more','onclick' => 'openModal(\'server-details-'.e($server->id).'\')']); ?>
                            <?php echo e($displayMode === 'ultracompact' ? '' : __($trans . '.actions.more')); ?>

                            <?php if($displayMode === 'ultracompact'): ?>
                                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.dots-three'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
                            <?php endif; ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>

            <?php if(!$isInactive): ?>
                <div class="monitoring-card-progress" role="progressbar" aria-valuenow="<?php echo e($playerPercentage); ?>"
                    aria-valuemin="0" aria-valuemax="100">
                    <div class="monitoring-card-progress-bar <?php echo e($percentColor); ?>"
                        style="height: <?php echo e($playerPercentage); ?>%">
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </article>

    <?php if(!isset($hideModal) || !$hideModal): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.modal','data' => ['id' => 'server-details-'.e($server->id).'','title' => ''.e(__($server->name)).'','class' => 'server-details-modal','loadUrl' => ''.e(url('api/monitoring/server/' . $server->id)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'server-details-'.e($server->id).'','title' => ''.e(__($server->name)).'','class' => 'server-details-modal','loadUrl' => ''.e(url('api/monitoring/server/' . $server->id)).'']); ?>
             <?php $__env->slot('skeleton', null, []); ?> 
                <?php echo $__env->make('monitoring::server-details-skeleton', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Modules/Monitoring/Resources/views/components/server-card.blade.php ENDPATH**/ ?>