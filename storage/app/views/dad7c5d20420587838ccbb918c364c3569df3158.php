<?php if(empty(!$title)): ?>
    <fieldset>
        <div class="col mb-2 p-0">
            <legend class="text-black text-black">
                <h4>
                    <?php echo e($title); ?>

                </h4>

                <?php if(!empty($description)): ?>
                    <small class="d-block text-muted mb-0 text-balance">
                        <?php echo __($description ?? ''); ?>

                    </small>
                <?php endif; ?>
            </legend>
        </div>
    </fieldset>
<?php endif; ?>

<div class="d-flex flex-between align-center flex-md-row flex-column mb-3 flex-row gap-3">
    <?php if($searchable): ?>
        <?php echo $__env->make('admin::partials.layouts.table-search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php if(empty(!$commandBar)): ?>
        <div class="d-flex justify-content-end ms-auto gap-2">
            <?php $__currentLoopData = $commandBar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $command): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div>
                    <?php echo $command; ?>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>

<?php if(empty(!$bulkBar)): ?>
    <div class="bulk-actions-floating" id="bulk-actions-<?php echo e($tableId ?? ''); ?>" data-bulk-table="<?php echo e($tableId ?? ''); ?>" style="display:none">
        <div class="bulk-actions-inner">
            <div class="bulk-chip">
                <span><?php echo e(__('admin.bulk.selected')); ?>:</span>
                <strong class="bulk-selected-count">0</strong>
            </div>

            <div class="bulk-actions-scroll">
                <?php $__currentLoopData = $bulkBar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $action; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <button type="button" class="btn btn-outline-primary btn-small bulk-clear-btn"
                aria-label="<?php echo e(__('admin.bulk.clear_selection')); ?>"
                data-tooltip="<?php echo e(__('admin.bulk.clear_selection')); ?>"
                data-table-id="<?php echo e($tableId ?? ''); ?>">
                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.x'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php endif; ?>

<article class="card mb-3 table-card" hx-swap="outerHTML">
    <div class="table-responsive">
        <table class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'table',
            'table-compact' => $compact,
            'table-bordered' => $bordered,
            'table-hover' => $hoverable,
        ]) ?>" id="<?php echo e($tableId ?? ''); ?>">
            <?php if($showHeader): ?>
                <thead>
                    <tr>
                        <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $column->buildTh(); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                </thead>
            <?php endif; ?>

            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $column->buildTd($source, $loop->parent); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="<?php echo e(count($columns)); ?>">
                            <div class="py-4 text-center">
                                <?php if(isset($iconNotFound)): ?>
                                    <h1 class="flex-center text-muted mb-1">
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
                                <h3>
                                    <?php echo $textNotFound; ?>

                                </h3>
                                <p class="text-muted flex-center text-balance">
                                    <?php echo $subNotFound; ?>

                                </p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>

                <?php if($total->isNotEmpty() && !empty($rows)): ?>
                    <tr>
                        <?php $__currentLoopData = $total; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $column->buildTd($repository, $loop); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php if($rows->isNotEmpty()): ?>
        <?php echo $__env->make('admin::partials.layouts.pagination', [
            'paginator' => $paginator,
            'columns' => $columns,
            'compact' => $compact,
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</article>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Core/Modules/Admin/Resources/views/partials/layouts/table.blade.php ENDPATH**/ ?>