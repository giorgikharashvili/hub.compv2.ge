<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['value', 'label', 'small', 'icon', 'checked' => false]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['value', 'label', 'small', 'icon', 'checked' => false]); ?>
<?php foreach (array_filter((['value', 'label', 'small', 'icon', 'checked' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php foreach ((['name']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>

<label <?php echo e($attributes->merge(['class' => 'radio-option'])); ?>>
    <input type="radio" class="radio-input" name="<?php echo e($name); ?>" value="<?php echo e($value); ?>"
        <?php if($checked): echo 'checked'; endif; ?>>
    <div class="radio-content">
        <?php if(isset($icon)): ?>
            <span class="radio-icon" aria-hidden="true">
                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => ''.e($icon).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

        <div class="radio-option-content">
            <?php if(isset($label)): ?>
                <h6 class="radio-text-label">
                    <?php echo $label; ?>

                </h6>
            <?php endif; ?>

            <?php if(isset($small)): ?>
                <small class="radio-text-small">
                    <?php echo $small; ?>

                </small>
            <?php endif; ?>
        </div>
    </div>
</label>
<?php /**PATH /home/compvge/public_html/app/Themes/standard/views/components/radio-group-item.blade.php ENDPATH**/ ?>