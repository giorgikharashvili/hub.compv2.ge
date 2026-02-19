<div class="metrics">
    <?php if(isset($title)): ?>
        <div class="metrics__title">
            <?php echo e(__($title)); ?>

        </div>
    <?php endif; ?>
    <div class="metrics__grid">
        <?php $__currentLoopData = $metrics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $metric): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="metrics__item">
                <div class="metric">
                    <div class="metric__header">
                        <?php if($metric['icon']): ?>
                            <div class="metric__icon">
                                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.'.e($metric['icon']).'','class' => 'metric__icon-svg'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            </div>
                        <?php endif; ?>
                        <span class="metric__label"><?php echo e(__($key)); ?></span>
                    </div>
                    <div class="metric__content">
                        <div class="metric__main">
                            <div class="metric__value">
                                <?php echo e(is_array($metric['value']) ? $metric['value']['value'] : $metric['value']); ?>

                            </div>
                            <?php if(isset($metric['value']['diff']) && $metric['value']['diff'] != 0): ?>
                                <div class="metric__trend <?php echo e((float) $metric['value']['diff'] < 0 ? 'metric__trend--down' : 'metric__trend--up'); ?>">
                                    <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.bold.'.e((float) $metric['value']['diff'] < 0 ? 'trend-down' : 'trend-up').'-bold','class' => 'metric__trend-icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                    <span><?php echo e(round($metric['value']['diff'], 2)); ?>%</span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Core/Modules/Admin/Resources/views/partials/layouts/metric.blade.php ENDPATH**/ ?>