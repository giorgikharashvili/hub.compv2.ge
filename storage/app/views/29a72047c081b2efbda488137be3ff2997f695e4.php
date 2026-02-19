<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.alert','data' => ['type' => 'info','class' => 'd-flex flex-column gap-2 mb-3 mt-4','withClose' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'info','class' => 'd-flex flex-column gap-2 mb-3 mt-4','withClose' => 'false']); ?>
    <h5 class="text-center"><?php echo e(__('skinchanger.admin.refresh.info.title')); ?></h5>
    <p class="mb-2 small text-balance text-center"><?php echo __('skinchanger.admin.refresh.info.notice'); ?></p>
    <p class="mb-2 small text-muted text-center"><?php echo e(__('skinchanger.admin.refresh.info.timing', ['timeout' => $httpTimeout, 'budget' => $taskBudget])); ?></p>
    <small class="mb-0" style="color: var(--primary); text-align: center; display: block;"><?php echo __('skinchanger.admin.refresh.info.source', ['url' => e($dataSourceUrl)]); ?></small>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Modules/Skinchanger/Resources/views/admin/components/refresh-info.blade.php ENDPATH**/ ?>