<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'name' => null,
    'value' => 'on',
    'checked' => false,
    'label' => '',
    'popover' => '',
    'bare' => false,
    'compact' => false,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'name' => null,
    'value' => 'on',
    'checked' => false,
    'label' => '',
    'popover' => '',
    'bare' => false,
    'compact' => false,
]); ?>
<?php foreach (array_filter(([
    'name' => null,
    'value' => 'on',
    'checked' => false,
    'label' => '',
    'popover' => '',
    'bare' => false,
    'compact' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if($bare): ?>
    <input type="checkbox" <?php if($name): ?> name="<?php echo e($name); ?>" <?php endif; ?> value="<?php echo e($value); ?>"
        <?php echo e($checked ? 'checked' : ''); ?> <?php echo e($attributes); ?> />
<?php else: ?>
    <div class="checkbox-wrapper <?php if($compact): ?> checkbox--compact <?php endif; ?>">
        <div class="checkbox__field-container">
            <input type="checkbox" name="<?php echo e($name); ?>" id="<?php echo e($attributes->get('id', $name)); ?>" value="<?php echo e($value); ?>"
                <?php echo e($checked ? 'checked' : ''); ?> <?php echo e($attributes->class(['checkbox__field'])->merge(['class' => 'checkbox__field'])); ?> />

            <label for="<?php echo e($attributes->get('id', $name)); ?>" class="checkbox__label">
                <?php if($label): ?>
                    <?php echo e($label); ?>

                    <?php if(isset($popover) && !empty($popover)): ?>
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
                <?php endif; ?>
            </label>
        </div>

        <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="checkbox__error"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Resources/views/components/fields/checkbox.blade.php ENDPATH**/ ?>