<fieldset class="row g-0 gx-1 gy-1 <?php echo e($class); ?>">
    <?php if(!empty($title) || !empty($description)): ?>
        <div class="col">
            <legend class="mt-2">
                <h5><?php echo e(__($title ?? '')); ?> <?php if($popover): ?>
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
                </h5>

                <?php if(!empty($description)): ?>
                    <small class="d-block text-muted mb-1 text-balance">
                        <?php echo __($description ?? ''); ?>

                    </small>
                <?php endif; ?>
            </legend>
        </div>
    <?php endif; ?>

    <div class="d-flex flex-column gap-3">
        <?php echo $form ?? ''; ?>

    </div>
</fieldset>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Core/Modules/Admin/Resources/views/partials/layouts/row.blade.php ENDPATH**/ ?>