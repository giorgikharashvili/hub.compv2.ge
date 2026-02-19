<div class="d-flex items-center gap-3">
    <span class="role-name" title="<?php echo e(__('admin-roles.table.role_name')); ?>" data-tooltip="Priority: <?php echo e($role->priority); ?>">
        <span class="role-color" style="background-color: <?php echo e($role->color); ?>"></span>
        <?php echo e($role->name); ?>


        <?php if($role->icon): ?>
            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['class' => 'role-icon','path' => ''.e($role->icon).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
        <?php endif; ?>
    </span>
    <small class="badge warning role-id cursor-pointer" title="<?php echo e(__('admin-roles.table.id')); ?>" data-copy="<?php echo e($role->id); ?>"
        data-tooltip="<?php echo e(__('def.copy')); ?>" onclick="notyf.success('<?php echo e(__('def.copied')); ?>')">
        ID: <?php echo e($role->id); ?>

    </small>
</div><?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Packages/Roles/Resources/views/cells/role-name.blade.php ENDPATH**/ ?>