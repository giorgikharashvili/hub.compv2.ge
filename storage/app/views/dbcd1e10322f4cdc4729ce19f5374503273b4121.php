<div>
    v<?php echo e($module->installedVersion ?? '0.0.0'); ?>

    <small class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        $module->installedVersion < $module->version ? 'accent' : 'text-muted',
    ]) ?>">(<?php echo e($module->version ?? '0.0.0'); ?>)
        <?php if($module->installedVersion < $module->version): ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.popover','data' => ['content' => 'Доступно обновление до '.e($module->version).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['content' => 'Доступно обновление до '.e($module->version).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <?php endif; ?>
    </small>

    <?php echo $__env->make('admin-update::components.update-badge', [
        'type' => 'modules',
        'identifier' => $module->key,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Packages/Modules/Resources/views/cells/version.blade.php ENDPATH**/ ?>