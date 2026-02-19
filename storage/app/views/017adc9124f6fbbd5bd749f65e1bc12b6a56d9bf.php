<?php if($sort): ?>
<th <?php if($width): ?> style="width: <?php echo e($width); ?>; <?php if($style): ?> <?php echo e($style); ?> <?php endif; ?>" <?php elseif($style): ?> style="<?php echo e($style); ?>"
<?php endif; ?> <?php if($minWidth): ?> style="min-width: <?php echo e($minWidth); ?>;" <?php endif; ?> class="text-<?php echo e($align); ?> sortable-column"
        data-column="<?php echo e($data_column ?? $slug ?? ''); ?>" <?php if(isset($aria_hidden)): ?> aria-hidden="<?php echo e($aria_hidden); ?>" <?php endif; ?>>
        <a href="<?php echo e($sortUrl); ?>" hx-target="#main" hx-include="none" hx-swap="outerHTML" hx-boost="true" yoyo:ignore
            class="table-th">
            <?php echo e($title); ?>


            <?php
                $currentSort = request()->input('sort', '');
                $isCurrentColumn = ltrim($currentSort, '-') === $column;
                $direction = str_starts_with($currentSort, '-') ? 'desc' : 'asc';
                
                $isDefaultSort = empty($currentSort) && isset($defaultSort) && $defaultSort;
                $isActiveSortColumn = $isCurrentColumn || $isDefaultSort;
                
                if ($isDefaultSort) {
                    $direction = $defaultSortDirection ?? 'asc';
                }
            ?>

            <?php if($isActiveSortColumn): ?>
                <span class="sort-indicator">
                    <?php if($direction === 'asc'): ?>
                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.arrow-up'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    <?php else: ?>
                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.arrow-down'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                </span>
            <?php else: ?>
                <span class="sort-indicator">
                    <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
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
<?php endif; ?>
                </span>
            <?php endif; ?>
        </a>
    </th>
<?php else: ?>
<th <?php if($width): ?> style="width: <?php echo e($width); ?>; <?php if($style): ?> <?php echo e($style); ?> <?php endif; ?>" <?php elseif($style): ?> style="<?php echo e($style); ?>"
<?php endif; ?> <?php if($minWidth): ?> style="min-width: <?php echo e($minWidth); ?>;" <?php endif; ?> class="text-<?php echo e($align); ?>"
        data-column="<?php echo e($data_column ?? $slug ?? ''); ?>" <?php if(isset($aria_hidden)): ?> aria-hidden="<?php echo e($aria_hidden); ?>" <?php endif; ?>>
        <?php echo e($title); ?>

    </th>
<?php endif; ?><?php /**PATH /home/compvge/public_html/bootstrap/../app/Core/Modules/Admin/Resources/views/partials/layouts/th.blade.php ENDPATH**/ ?>