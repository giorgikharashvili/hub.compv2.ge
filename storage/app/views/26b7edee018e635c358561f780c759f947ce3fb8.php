<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'type' => 'text',
    'name' => '',
    'value' => '',
    'prefix' => '',
    'mask' => '',
    'id' => '',
    'readOnly' => false,
    'postPrefix' => false,
    'toggle' => true,
    'withoutBottom' => false,
    'filePond' => false,
    'filePondOptions' => [],
    'datalist' => [],
    'defaultFile' => null,
    'yoyo' => false,
    'format' => null,
    'enableTime' => true,
    'multiple' => false,
    'iconPacks' => [],
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'type' => 'text',
    'name' => '',
    'value' => '',
    'prefix' => '',
    'mask' => '',
    'id' => '',
    'readOnly' => false,
    'postPrefix' => false,
    'toggle' => true,
    'withoutBottom' => false,
    'filePond' => false,
    'filePondOptions' => [],
    'datalist' => [],
    'defaultFile' => null,
    'yoyo' => false,
    'format' => null,
    'enableTime' => true,
    'multiple' => false,
    'iconPacks' => [],
]); ?>
<?php foreach (array_filter(([
    'type' => 'text',
    'name' => '',
    'value' => '',
    'prefix' => '',
    'mask' => '',
    'id' => '',
    'readOnly' => false,
    'postPrefix' => false,
    'toggle' => true,
    'withoutBottom' => false,
    'filePond' => false,
    'filePondOptions' => [],
    'datalist' => [],
    'defaultFile' => null,
    'yoyo' => false,
    'format' => null,
    'enableTime' => true,
    'multiple' => false,
    'iconPacks' => [],
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
    $inputId = $id ?: ($attributes->get('id', $name) ?: $name);
?>

<?php if($type === 'hidden'): ?>
    <input type="hidden" name="<?php echo e($name); ?>" id="<?php echo e($inputId); ?>" value="<?php echo e($value); ?>" />
<?php else: ?>
    <div class="input-wrapper">
        <div id="input-<?php echo e($inputId); ?>"
            class="<?php echo \Illuminate\Support\Arr::toCssClasses(['input__field-container', 'input__field-container-readonly' => $readOnly, 'has-error' => $hasError]) ?>">
            <?php if($prefix): ?>
                <span class="input__prefix"><?php echo e($prefix); ?></span>
            <?php endif; ?>

            <?php if($type === 'file' && $filePond): ?>
                <input type="file" name="<?php echo e($name); ?>" id="<?php echo e($inputId); ?>" class="filepond input__field"
                    data-default-file="<?php echo e($defaultFile); ?>" data-input-mask="<?php echo e($mask ?? ''); ?>"
                    data-file-pond-options='<?php echo json_encode($filePondOptions, 15, 512) ?>'
                    data-accept="<?php echo e($attributes->get('accept', '')); ?>" <?php if($readOnly): echo 'readonly'; endif; ?>
                    <?php echo e($hasError ? 'aria-invalid=true' : ''); ?> <?php if($multiple): ?> multiple <?php endif; ?>
                    <?php echo e($attributes->merge(['class' => 'filepond input__field'])); ?> />
            <?php elseif($type === 'color'): ?>
                <div class="color-input-container" style="display:flex;align-items:center;gap:.5em;width:100%">
                    <div class="pickr pickr-trigger" role="button" tabindex="0" aria-label="<?php echo e(__('def.select_color')); ?>" data-input-id="<?php echo e($inputId); ?>"></div>

                    <input type="text" name="<?php echo e($name); ?>" id="<?php echo e($inputId); ?>"
                        value="<?php echo e($value); ?>" <?php echo e($hasError ? 'aria-invalid=true' : ''); ?>

                        <?php if($readOnly): echo 'readonly'; endif; ?> data-color="<?php echo e($value ?: '#42445A'); ?>"
                        <?php if($yoyo): ?> hx-swap="morph:outerHTML transition:true" yoyo yoyo:trigger="input changed delay:500ms" <?php endif; ?>
                        <?php echo e($attributes->merge(['class' => 'input__field input__field-color'])); ?> />
                </div>
            <?php elseif($type === 'datetime'): ?>
                <input type="text" name="<?php echo e($name); ?>" id="<?php echo e($inputId); ?>" value="<?php echo e($value); ?>"
                    <?php echo e($hasError ? 'aria-invalid=true' : ''); ?> <?php if($readOnly): echo 'readonly'; endif; ?>
                    <?php if($format): ?> data-format="<?php echo e($format); ?>" <?php endif; ?>
                    data-enable-time="<?php echo e($enableTime ? 'true' : 'false'); ?>"
                    <?php if($yoyo): ?> hx-swap="morph:outerHTML transition:true" yoyo yoyo:trigger="input changed delay:500ms" <?php endif; ?>
                    <?php echo e($attributes->merge(['class' => 'input__field input__field-datetime'])); ?> />
            <?php elseif($type === 'icon'): ?>
                <div class="icon-input-container">
                    <div class="icon-input-preview">
                        <?php if($value): ?>
                            <?php echo app(\Flute\Core\Modules\Icons\Services\IconFinder::class)->loadFile($value); ?>

                        <?php endif; ?>
                    </div>

                    <input type="text" name="<?php echo e($name); ?>" id="<?php echo e($inputId); ?>"
                        value="<?php echo e($value); ?>" <?php echo e($hasError ? 'aria-invalid=true' : ''); ?> <?php if($readOnly): echo 'readonly'; endif; ?>
                        data-icon-picker="true" data-icon-packs='<?php echo json_encode($iconPacks, 15, 512) ?>'
                        <?php if($yoyo): ?> hx-swap="morph:outerHTML transition:true" yoyo yoyo:trigger="input changed delay:500ms" <?php endif; ?>
                        <?php echo e($attributes->merge(['class' => 'input__field input__field-icon'])); ?> />

                    <button type="button" class="input__icon-picker-btn icon-hover"
                        style="width: 30px; height: 30px; font-size: var(--p); padding: 0;"
                        aria-label="<?php echo e(__('def.select_icon')); ?>">
                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.magnifying-glass'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    </button>
                </div>
            <?php else: ?>
                <input type="<?php echo e($type); ?>" name="<?php echo e($name); ?>" id="<?php echo e($inputId); ?>"
                    data-input-mask="<?php echo e($mask ?? ''); ?>" <?php echo e($hasError ? 'aria-invalid=true' : ''); ?> <?php if($readOnly): echo 'readonly'; endif; ?>
                    <?php if(!empty($datalist)): ?> list="datalist-<?php echo e($inputId); ?>" <?php endif; ?>
                    value="<?php echo e($value); ?>"
                    <?php if($yoyo): ?> hx-swap="morph:outerHTML transition:true" yoyo yoyo:trigger="input changed delay:500ms" <?php endif; ?>
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

            <?php if(!empty($datalist)): ?>
                <datalist id="datalist-<?php echo e($inputId); ?>">
                    <?php $__currentLoopData = $datalist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($item); ?>"></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </datalist>
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
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Resources/views/components/fields/input.blade.php ENDPATH**/ ?>