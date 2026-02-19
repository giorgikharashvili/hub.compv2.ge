<?php if(!$compact || $paginator['totalPages'] > 1): ?>
    <footer class="table__footer" hx-include="none">
        <?php if(!$compact): ?>
            <div class="col-auto me-auto">
                <?php if(isset($columns) && \Flute\Admin\Platform\Fields\TD::isShowVisibleColumns($columns->toArray())): ?>
                    <div class="btn-group dropup d-inline-block">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.link','data' => ['type' => 'button','ariaHaspopup' => 'true','ariaExpanded' => 'false','dataDropdownOpen' => 'dropdown-columns']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','aria-haspopup' => 'true','aria-expanded' => 'false','data-dropdown-open' => 'dropdown-columns']); ?>
                            <?php echo e(__('def.configure_columns')); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <div data-dropdown="dropdown-columns">
                            <ul class="table__columns" data-table-id="<?php echo e($tableId ?? 'default'); ?>">
                                <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $column->buildItemMenu(); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>

                <small class="text-muted d-block">
                    <?php echo e(__('def.display_from_to', [
                        ':from' => ($paginator['currentPage'] - 1) * $paginator['perPage'] + 1,
                        ':to' => ($paginator['currentPage'] - 1) * $paginator['perPage'] + $paginator['totalPages'],
                        ':total' => $paginator['totalItems'],
                    ])); ?>

                </small>
            </div>
        <?php endif; ?>

        <?php if($paginator['totalPages'] > 1): ?>
            <nav yoyo:ignore hx-target="#main">
                <ul class="table__pagination">
                    <?php if($paginator['currentPage'] > 1): ?>
                        <li class="table__pagination-item">
                            <a class="page-link link-icon"
                                href="<?php echo e(url()->withGet()->addParams(['page' => $paginator['currentPage'] - 1])->get()); ?>"
                                rel="prev" hx-swap="outerHTML" hx-boost="true" yoyo:ignore>&laquo;</a>
                        </li>
                    <?php else: ?>
                        <li class="table__pagination-item disabled"><span class="page-link link-icon">&laquo;</span>
                        </li>
                    <?php endif; ?>

                    <?php for($page = 1; $page <= $paginator['totalPages']; $page++): ?>
                        <?php if(
                            $page == 1 ||
                                $page == $paginator['totalPages'] ||
                                ($page >= $paginator['currentPage'] - 1 && $page <= $paginator['currentPage'] + 1)): ?>
                            <?php if($page == $paginator['currentPage']): ?>
                                <li class="table__pagination-item active"><span
                                        class="page-link"><?php echo e($page); ?></span>
                                </li>
                            <?php else: ?>
                                <li class="table__pagination-item">
                                    <a class="page-link" yoyo:ignore
                                        href="<?php echo e(url()->withGet()->addParams(['page' => $page])->get()); ?>"
                                        hx-swap="outerHTML" hx-boost="true"><?php echo e($page); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php elseif($page == 2 || $page == $paginator['totalPages'] - 1): ?>
                            <li class="table__pagination-item disabled"><span class="page-link">...</span></li>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if($paginator['currentPage'] < $paginator['totalPages']): ?>
                        <li class="table__pagination-item">
                            <a class="page-link link-icon" yoyo:ignore
                                href="<?php echo e(url()->withGet()->addParams(['page' => $paginator['currentPage'] + 1])->get()); ?>"
                                hx-swap="outerHTML" hx-boost="true" rel="next">&raquo;</a>
                        </li>
                    <?php else: ?>
                        <li class="table__pagination-item disabled"><span class="page-link link-icon">&raquo;</span>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        <?php endif; ?>
    </footer>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Core/Modules/Admin/Resources/views/partials/layouts/pagination.blade.php ENDPATH**/ ?>