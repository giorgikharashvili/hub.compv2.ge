<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['name', 'id' => $name, 'checked' => false, 'label' => null, 'disabled' => false, 'yoyo' => false]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['name', 'id' => $name, 'checked' => false, 'label' => null, 'disabled' => false, 'yoyo' => false]); ?>
<?php foreach (array_filter((['name', 'id' => $name, 'checked' => false, 'label' => null, 'disabled' => false, 'yoyo' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<label class="toggle-switch">
    <?php if($label): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.forms.label','data' => ['for' => ''.e($name).'','class' => 'toggle-switch-label-text']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => ''.e($name).'','class' => 'toggle-switch-label-text']); ?><?php echo e($label); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if($yoyo): ?>
        <input type="hidden" name="<?php echo e($name); ?>_default" value="false" yoyo>
    <?php else: ?>
        <input type="hidden" name="<?php echo e($name); ?>" value="false">
    <?php endif; ?>

    <input type="checkbox" name="<?php echo e($name); ?>" id="<?php echo e($id); ?>" value="true" 
        <?php if($checked): ?> checked <?php endif; ?> 
        <?php if($disabled): ?> disabled <?php endif; ?> 
        <?php echo e($attributes->merge(['class' => 'toggle-switch-input'])); ?> 
        <?php if($yoyo): ?> 
            yoyo 
        <?php endif; ?>>
    <span class="toggle-switch-slider"></span>
</label><?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Resources/views/components/fields/toggle.blade.php ENDPATH**/ ?>