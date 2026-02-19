<?php $__env->startPush('modals-container'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.modal','data' => ['id' => 'flute-admin-modal-'.e($key).'','title' => $title,'size' => $size,'open' => $open,'hxVals' => ''.e(json_encode([
        'modalId' => $modalId,
        'modalParams' => $params ? encrypt()->encrypt($params) : null,
    ])).'','type' => $type,'removeOnClose' => ''.e($removeOnClose).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'flute-admin-modal-'.e($key).'','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($title),'size' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($size),'open' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($open),'hx-vals' => ''.e(json_encode([
        'modalId' => $modalId,
        'modalParams' => $params ? encrypt()->encrypt($params) : null,
    ])).'','type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($type),'removeOnClose' => ''.e($removeOnClose).'']); ?>
        <?php $__currentLoopData = $manyForms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formKey => $modal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $modal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $item ?? ''; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if(empty($commandBar) && $withoutApplyButton && $withoutCloseButton): ?>
        <?php else: ?>
             <?php $__env->slot('footer', null, []); ?> 
                <div class="modal-admin-footer d-flex justify-content-end align-items-center w-100 gap-3">
                    <?php if(! $withoutCloseButton && $type !== 'right'): ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.button','data' => ['type' => 'outline-primary','dataA11yDialogHide' => 'flute-admin-modal-'.e($key).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'outline-primary','data-a11y-dialog-hide' => 'flute-admin-modal-'.e($key).'']); ?>
                            <?php echo e($close); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php endif; ?>

                    <?php if(empty($commandBar)): ?>
                        <?php if(! $withoutApplyButton): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.button','data' => ['id' => 'submit-modal-'.e($key).'','class' => ''.e($type === 'right' ? 'w-100' : '').'','hxInclude' => '#flute-admin-modal-'.e($key).'-content, #screen-container','yoyo:post' => ''.e($method).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'submit-modal-'.e($key).'','class' => ''.e($type === 'right' ? 'w-100' : '').'','hx-include' => '#flute-admin-modal-'.e($key).'-content, #screen-container','yoyo:post' => ''.e($method).'']); ?>
                                <?php echo e($apply); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php echo $commandBar; ?>

                    <?php endif; ?>
                </div>
             <?php $__env->endSlot(); ?>
        <?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopPush(); ?><?php /**PATH /home/compvge/public_html/bootstrap/../app/Core/Modules/Admin/Resources/views/partials/layouts/modal.blade.php ENDPATH**/ ?>