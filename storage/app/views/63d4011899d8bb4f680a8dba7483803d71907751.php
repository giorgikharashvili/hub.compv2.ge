<?php if($title || $description || !empty($commands)): ?>
    <legend class="d-flex flex-between my-3 flex-row gap-3">
        <div>
            <h4><?php echo e(__($title ?? '')); ?> 
                <?php if($popover): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.popover','data' => ['content' => $popover]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['content' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($popover)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php endif; ?>
            </h4>

            <?php if(!empty($description)): ?>
                <small class="d-block text-muted text-balance mb-0">
                    <?php echo __($description ?? ''); ?>

                </small>
            <?php endif; ?>
        </div>
        <ul class="row g-2 p-0">
            <?php $__currentLoopData = $commands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $command): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="col-md">
                    <?php echo $command; ?>

                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </legend>
<?php endif; ?>

<div class="sortable-container mb-3 rounded" data-container-key="<?php echo e($slug); ?>:sortable"
    <?php echo e($onSortEnd ? "yoyo:post=$onSortEnd" : ''); ?>

    hx-swap="outerHTML" hx-vals='js:{sortableResult: event.detail.sortable}' yoyo:trigger='sortEnd'>
    <?php if($rows->isNotEmpty()): ?>
        

        <?php echo $__env->make('admin::partials.sortable-list', [
            'items' => $rows,
            'columns' => $columns,
            'showBlockHeaders' => $showBlockHeaders,
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <div
            class="d-md-flex align-items-center flex-column px-md-0 w-100 text-md-start justify-content-center px-2 pb-5 pt-4 text-center">
            <?php if(isset($iconNotFound)): ?>
                <h1 class="d-flex text-muted mb-2">
                    <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => $iconNotFound] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                </h1>
            <?php endif; ?>

            <div>
                <h3 class="fw-light">
                    <?php echo $textNotFound; ?>

                </h3>

                <?php echo $subNotFound; ?>

            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Core/Modules/Admin/Resources/views/layouts/sortable.blade.php ENDPATH**/ ?>