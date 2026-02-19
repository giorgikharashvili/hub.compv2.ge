<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'type' => 'text',
    'name' => '',
    'value' => '',
    'prefix' => '',
    'readOnly' => false,
    'postPrefix' => false,
    'toggle' => true,
    'withoutBottom' => false,
    'filePond' => false,
    'filePondOptions' => [],
    'defaultFile' => null,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'type' => 'text',
    'name' => '',
    'value' => '',
    'prefix' => '',
    'readOnly' => false,
    'postPrefix' => false,
    'toggle' => true,
    'withoutBottom' => false,
    'filePond' => false,
    'filePondOptions' => [],
    'defaultFile' => null,
]); ?>
<?php foreach (array_filter(([
    'type' => 'text',
    'name' => '',
    'value' => '',
    'prefix' => '',
    'readOnly' => false,
    'postPrefix' => false,
    'toggle' => true,
    'withoutBottom' => false,
    'filePond' => false,
    'filePondOptions' => [],
    'defaultFile' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $hasError = $errors->has($name);
?>

<div class="input-wrapper">
    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['input__field-container', 'input__field-container-readonly' => $readOnly, 'has-error' => $hasError]) ?>">
        <?php if($prefix): ?>
            <span class="input__prefix"><?php echo $prefix; ?></span>
        <?php endif; ?>

        <?php if($type === 'file' && $filePond): ?>
            <input type="file" name="<?php echo e($name); ?>" id="<?php echo e($attributes->get('id', $name)); ?>"
                class="filepond input__field" data-default-file="<?php echo e($defaultFile); ?>"
                data-file-pond-options='<?php echo json_encode($filePondOptions, 15, 512) ?>' data-accept="<?php echo e($attributes->get('accept', '')); ?>"
                <?php echo e($hasError ? 'aria-invalid=true' : ''); ?>

                <?php echo e($attributes->merge(['class' => 'filepond input__field'])); ?> />
        <?php else: ?>
            <input type="<?php echo e($type); ?>" name="<?php echo e($name); ?>" id="<?php echo e($attributes->get('id', $name)); ?>"
                <?php echo e($hasError ? 'aria-invalid=true' : ''); ?> value="<?php echo e($value); ?>"
                <?php echo e($attributes->class(['input__field-withPassword' => $type === 'password'])->merge(['class' => 'input__field'])); ?> />
        <?php endif; ?>

        <?php if($type === 'password' && $toggle): ?>
            <button type="button" onclick="togglePassword(event)" class="input__toggle-btn"
                aria-label="Toggle Password Visibility">
                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['class' => 'icon-eye','path' => 'ph.regular.eye'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['class' => 'icon-eye-slash','path' => 'ph.regular.eye-slash'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['style' => 'display: none;']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
            </button>
        <?php endif; ?>

        <?php if($postPrefix): ?>
            <div class="input__postprefix"><?php echo $postPrefix; ?></div>
        <?php endif; ?>
    </div>

    <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="input__error"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>
<?php /**PATH /home/compvge/public_html/app/Themes/standard/views/components/fields/input.blade.php ENDPATH**/ ?>