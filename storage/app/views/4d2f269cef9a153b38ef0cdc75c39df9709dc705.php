<div class="monitoring-admin-servers">
    <div class="monitoring-admin-servers__list">
        <?php $__currentLoopData = $servers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $server): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $status = $serverStatuses[$server->id] ?? null;
                $isOnline = $status && $status->online;
            ?>
            <div class="monitoring-admin-servers__item <?php echo e($isOnline ? 'is-online' : 'is-offline'); ?>">
                <div class="monitoring-admin-servers__info">
                    <div class="monitoring-admin-servers__indicator <?php echo e($isOnline ? 'online' : 'offline'); ?>"></div>
                    <div class="monitoring-admin-servers__details">
                        <span class="monitoring-admin-servers__name"><?php echo e($server->name); ?></span>
                        <span class="monitoring-admin-servers__ip"><?php echo e($server->ip); ?>:<?php echo e($server->port); ?></span>
                    </div>
                </div>
                <div class="monitoring-admin-servers__stats">
                    <?php if($isOnline): ?>
                        <span class="monitoring-admin-servers__players">
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.users'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <?php echo e($status->players); ?>/<?php echo e($status->max_players); ?>

                        </span>
                        <span class="monitoring-admin-servers__map" title="<?php echo e($status->map); ?>">
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.map-trifold'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <?php echo e(\Illuminate\Support\Str::limit($status->map ?? '-', 15)); ?>

                        </span>
                    <?php else: ?>
                        <span class="monitoring-admin-servers__offline-text">
                            <?php echo e(__('monitoring.admin.offline')); ?>

                        </span>
                    <?php endif; ?>
                </div>
                <div class="monitoring-admin-servers__actions">
                    <a href="<?php echo e(url('/admin/monitoring/test/' . $server->id)); ?>" 
                       class="btn btn-sm btn-outline-primary" 
                       data-tooltip="<?php echo e(__('monitoring.admin.test_server')); ?>">
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
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<style>
.monitoring-admin-servers__list {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.monitoring-admin-servers__item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0.75rem 1rem;
    background: var(--transp-05);
    border-radius: var(--border05);
    transition: var(--transition);
}

.monitoring-admin-servers__item:hover {
    background: var(--transp-1);
}

.monitoring-admin-servers__item.is-offline {
    opacity: 0.7;
}

.monitoring-admin-servers__info {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.monitoring-admin-servers__indicator {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    flex-shrink: 0;
}

.monitoring-admin-servers__indicator.online {
    background: var(--success);
    box-shadow: 0 0 6px var(--success);
}

.monitoring-admin-servers__indicator.offline {
    background: var(--error);
}

.monitoring-admin-servers__details {
    display: flex;
    flex-direction: column;
    gap: 0.125rem;
}

.monitoring-admin-servers__name {
    font-weight: 600;
    font-size: var(--p-small);
}

.monitoring-admin-servers__ip {
    font-size: var(--small);
    color: var(--text-400);
    font-family: monospace;
}

.monitoring-admin-servers__stats {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.monitoring-admin-servers__players,
.monitoring-admin-servers__map {
    display: flex;
    align-items: center;
    gap: 0.25rem;
    font-size: var(--small);
    color: var(--text-300);
}

.monitoring-admin-servers__offline-text {
    font-size: var(--small);
    color: var(--error);
}

.monitoring-admin-servers__actions {
    display: flex;
    gap: 0.5rem;
}
</style>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Modules/Monitoring/Resources/views/admin/servers-status.blade.php ENDPATH**/ ?>