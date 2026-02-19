<?php
    $config = is_array($config ?? null) ? $config : [];

    $i18n = $config['i18n'] ?? [];
    $textBar = $i18n['bar'] ?? __('def.unsaved_changes');
    $textSave = $i18n['save'] ?? __('def.save');
    $textDiscard = $i18n['discard'] ?? __('def.reset');
    $textStay = $i18n['stay'] ?? __('def.cancel');

    $dialogTitle = $i18n['dialog_title'] ?? __('def.unsaved_changes');
    $dialogText = $i18n['dialog_text'] ?? __('def.unsaved_changes_text');
?>


<div id="admin-dirty-bar" class="admin-dirty-bar" role="status" aria-live="polite">
    <span class="admin-dirty-bar__text"><?php echo e($textBar); ?></span>
    <div class="admin-dirty-bar__actions">
        <button type="button" class="btn btn-small btn-outline-primary" data-dirty-discard>
            <?php echo e($textDiscard); ?>

        </button>
        <button type="button" class="btn btn-small btn-primary" data-dirty-save>
            <?php echo e($textSave); ?>

        </button>
    </div>
</div>


<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.modal','data' => ['id' => 'dirty-dialog','title' => $dialogTitle,'closeOnOverlay' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'dirty-dialog','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($dialogTitle),'closeOnOverlay' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
    <p class="text-center">
        <?php echo e($dialogText); ?>

    </p>

     <?php $__env->slot('footer', null, []); ?> 
        <div class="d-flex justify-content-end align-items-center gap-3">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.button','data' => ['type' => 'outline-primary','class' => 'w-100','dataDirtyStay' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'outline-primary','class' => 'w-100','data-dirty-stay' => true]); ?>
                <?php echo e($textStay); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.button','data' => ['type' => 'outline-primary','class' => 'w-100','dataDirtyDiscard' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'outline-primary','class' => 'w-100','data-dirty-discard' => true]); ?>
                <?php echo e($textDiscard); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.button','data' => ['type' => 'primary','class' => 'w-100','dataDirtySave' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'primary','class' => 'w-100','data-dirty-save' => true]); ?>
                <?php echo e($textSave); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Core/Modules/Admin/Resources/views/partials/dirty.blade.php ENDPATH**/ ?>