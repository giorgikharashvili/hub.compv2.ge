<div class="steam-info">
    <div class="steam-info-item">
        <span class="steam-info-label"><?php echo e(__('steam-info.steam.steam3')); ?></span>
        <div class="steam-info-value">
            <span class="steam-info-text" title="<?php echo e($steam3); ?>"><?php echo e($steam3); ?></span>
            <button class="steam-info-copy" onclick="copyToClipboard('<?php echo e($steam3); ?>');notyf.success('<?php echo e(__('steam-info.steam.copy_success')); ?>')" 
                data-tooltip="<?php echo e(__('steam-info.steam.copy')); ?>">
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
        </div>
    </div>

    <div class="steam-info-item">
        <span class="steam-info-label"><?php echo e(__('steam-info.steam.steam64')); ?></span>
        <div class="steam-info-value">
            <span class="steam-info-text" title="<?php echo e($steam64); ?>"><?php echo e($steam64); ?></span>
            <button class="steam-info-copy" onclick="copyToClipboard('<?php echo e($steam64); ?>');notyf.success('<?php echo e(__('steam-info.steam.copy_success')); ?>')"
                data-tooltip="<?php echo e(__('steam-info.steam.copy')); ?>">
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
        </div>
    </div>

    <div class="steam-info-item">
        <span class="steam-info-label"><?php echo e(__('steam-info.steam.steam32')); ?></span>
        <div class="steam-info-value">
            <span class="steam-info-text" title="<?php echo e($steam32); ?>"><?php echo e($steam32); ?></span>
            <button class="steam-info-copy" onclick="copyToClipboard('<?php echo e($steam32); ?>');notyf.success('<?php echo e(__('steam-info.steam.copy_success')); ?>')"
                data-tooltip="<?php echo e(__('steam-info.steam.copy')); ?>">
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
        </div>
    </div>
</div>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Modules/SteamInfo/Resources/views/index.blade.php ENDPATH**/ ?>