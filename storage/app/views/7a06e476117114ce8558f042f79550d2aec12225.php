<?php if(is_callable($typeForm)): ?>
    <?php echo $typeForm(get_defined_vars()); ?>

<?php else: ?>
<?php $__env->startComponent($typeForm, get_defined_vars() ?? []); ?>
    <?php
        $id = uniqid();
        $onlyIconClass = isset($icon) && empty($name) ? 'onlyIcon' : '';
    ?>

    <button <?php echo e($attributes->merge(['class' => $onlyIconClass])); ?> type="button" aria-haspopup="true" aria-expanded="false"
        data-dropdown-open="<?php echo e($id); ?>">
        <?php if(isset($icon)): ?>
            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => $icon,'class' => 'overflow-visible'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

        <?php echo e($name ?? ''); ?>

    </button>

    <div data-dropdown="<?php echo e($id); ?>" class="admin-dropdown">
        <div>
            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $item->build($source); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Core/Modules/Admin/Resources/views/actions/dropdown.blade.php ENDPATH**/ ?>