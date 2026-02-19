<div>
    <?php if($showSearch ?? true): ?>
        <header class="table__header">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.forms.field','data' => ['class' => 'table__search','style' => 'min-width: 300px','hxTrigger' => 'input changed delay:500ms','yoyo' => true,'yoyo:get' => 'searchChanged(\''.e($search ?? '').'\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table__search','style' => 'min-width: 300px','hx-trigger' => 'input changed delay:500ms','yoyo' => true,'yoyo:get' => 'searchChanged(\''.e($search ?? '').'\')']); ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.fields.input','data' => ['name' => 'search','id' => 'search','placeholder' => ''.e(__('def.lets_search')).'','value' => $search ?? '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'search','id' => 'search','placeholder' => ''.e(__('def.lets_search')).'','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($search ?? '')]); ?>
                     <?php $__env->slot('prefix', null, []); ?> 
                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.magnifying-glass'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </header>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table">
            <?php if(!empty($columns)): ?>
                <thead>
                    <tr>
                        <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $isCurrentSort = $sortField === $column['field'];
                                $sortIcon = $isCurrentSort
                                    ? ($sortDirection === 'asc'
                                        ? 'ph.regular.arrow-up'
                                        : 'ph.regular.arrow-down')
                                    : '';
                                $allowSort = $column['allowSort'] ?? true;
                                $align = $column['align'] ?? 'left';
                                $width = $column['width'] ?? false;
                            ?>
                            <th class="<?php echo \Illuminate\Support\Arr::toCssClasses(['table-header', 'sortable' => $allowSort]) ?>"
                                <?php if($width): ?> width="<?php echo e($width); ?>" <?php endif; ?>
                                <?php if($allowSort): ?> yoyo:on="click" yoyo:get="sortBy('<?php echo e($column['field']); ?>')" <?php endif; ?>>
                                <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'table-th',
                                    'flex-center' => $align === 'center',
                                    'flex-end' => $align === 'right',
                                ]) ?>">
                                    <?php echo e($column['label']); ?>

                                    <?php if($sortIcon && $allowSort): ?>
                                        <span class="sort-icon"><?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => $sortIcon] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php endif; ?></span>
                                    <?php elseif($allowSort && !$isCurrentSort): ?>
                                        <span class="sort-icon"><?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.arrows-down-up'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php endif; ?></span>
                                    <?php endif; ?>
                                </div>
                            </th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                </thead>
            <?php endif; ?>

            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $align = $column['align'] ?? 'left';
                                $width = $column['width'] ?? false;
                            ?>

                            <td class="<?php echo \Illuminate\Support\Arr::toCssClasses(['table-cell', 'text-' . $align]) ?>"
                                <?php if($width): ?> width="<?php echo e($width); ?>" <?php endif; ?>>
                                <?php echo $row[$column['field']]; ?>

                            </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="<?php echo e(count($columns)); ?>">
                            <div class="py-5 text-center">
                                <h1 class="flex-center text-muted mb-1">
                                    <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.smiley-sad','width' => '50','height' => '50'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                <h3>
                                    <?php echo __('def.no_results_found'); ?>

                                </h3>
                                <p class="text-muted flex-center text-balance text-center">
                                    <?php echo __('def.import_or_create'); ?>

                                </p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php if($showPagination ?? true): ?>
        <?php
            $totalPages = ceil($total / $perPage);
            $currentPage = $currentPage ?? 1;
        ?>

        <footer class="table__footer d-flex flex-between">
            <div class="table__footer-per-page d-flex flex-center gap-2">
                <label for="perPage">
                    <p class="text-muted"><?php echo e(__('def.records_per_page')); ?>:</p>
                </label>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.fields.select','data' => ['name' => 'perPage','id' => 'perPage','yoyo' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'perPage','id' => 'perPage','yoyo' => true]); ?>
                    <?php $__currentLoopData = $paginationOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($option); ?>" <?php echo e((int) $perPage === (int) $option ? 'selected' : ''); ?>>
                            <?php echo e($option); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
            <?php if($totalPages > 1): ?>
                <ul class="table__pagination">
                    <li class="table__pagination-item <?php echo e($currentPage <= 1 ? 'disabled' : ''); ?>">
                        <button class="link-icon" yoyo:on="click" yoyo:get="setPage(<?php echo e(max(1, $currentPage - 1)); ?>)"
                            <?php echo e($currentPage <= 1 ? 'disabled' : ''); ?>>
                            &lt;
                        </button>
                    </li>

                    <?php if($totalPages > 1): ?>
                        <?php if($currentPage > 3): ?>
                            <li class="table__pagination-item">
                                <button yoyo:on="click" yoyo:get="setPage(1)">
                                    1
                                </button>
                            </li>
                            <?php if($currentPage > 4): ?>
                                <li class="table__pagination-item disabled">
                                    <span class="text-ellipsis">...</span>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php for($i = max(1, $currentPage - 2); $i <= min($totalPages, $currentPage + 2); $i++): ?>
                            <li class="table__pagination-item <?php echo e($i == $currentPage ? 'active' : ''); ?>">
                                <button yoyo:on="click" yoyo:get="setPage(<?php echo e($i); ?>)">
                                    <?php echo e($i); ?>

                                </button>
                            </li>
                        <?php endfor; ?>

                        <?php if($currentPage < $totalPages - 2): ?>
                            <?php if($currentPage < $totalPages - 3): ?>
                                <li class="table__pagination-item disabled">
                                    <span class="text-ellipsis">...</span>
                                </li>
                            <?php endif; ?>
                            <li class="table__pagination-item">
                                <button yoyo:on="click" yoyo:get="setPage(<?php echo e($totalPages); ?>)">
                                    <?php echo e($totalPages); ?>

                                </button>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>

                    <li class="table__pagination-item <?php echo e($currentPage >= $totalPages ? 'disabled' : ''); ?>">
                        <button class="link-icon" yoyo:on="click"
                            yoyo:get="setPage(<?php echo e(min($currentPage + 1, $totalPages)); ?>)"
                            <?php echo e($currentPage >= $totalPages ? 'disabled' : ''); ?>>
                            &gt;
                        </button>
                    </li>
                </ul>
            <?php endif; ?>
        </footer>
    <?php endif; ?>
</div>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/partials/modules/table.blade.php ENDPATH**/ ?>