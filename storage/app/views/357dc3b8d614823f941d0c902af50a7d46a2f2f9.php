<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'name' => '',
    'label' => '',
    'options' => [],
    'yoyo' => false,
    'value' => '',
    'placeholder' => '',
    'allowEmpty' => false,
    'allowAdd' => false,
    'readOnly' => false,
    'datalist' => [],
    'toggle' => false,
    'native' => false,
    'searchable' => null,
    'searchThreshold' => 6,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'name' => '',
    'label' => '',
    'options' => [],
    'yoyo' => false,
    'value' => '',
    'placeholder' => '',
    'allowEmpty' => false,
    'allowAdd' => false,
    'readOnly' => false,
    'datalist' => [],
    'toggle' => false,
    'native' => false,
    'searchable' => null,
    'searchThreshold' => 6,
]); ?>
<?php foreach (array_filter(([
    'name' => '',
    'label' => '',
    'options' => [],
    'yoyo' => false,
    'value' => '',
    'placeholder' => '',
    'allowEmpty' => false,
    'allowAdd' => false,
    'readOnly' => false,
    'datalist' => [],
    'toggle' => false,
    'native' => false,
    'searchable' => null,
    'searchThreshold' => 6,
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
    $isNative = $native || $readOnly;
    $optionsCount = count($options);
    $enableSearch = $searchable === true || ($searchable === null && $optionsCount > $searchThreshold);
?>

<div class="select-wrapper">
    <?php if($label): ?>
        <label class="select__prefix" for="<?php echo e($attributes->get('id', $name)); ?>">
            <?php echo e($label); ?>

        </label>
    <?php endif; ?>

    <div class="select__field-container <?php echo e($hasError ? 'has-error' : ''); ?><?php echo e($isNative ? ' select__field-container--native' : ''); ?>">
        <select 
            name="<?php echo e($name); ?>" 
            id="<?php echo e($attributes->get('id', $name)); ?>"
            class="select__field" 
            <?php echo e($yoyo ? 'yoyo' : ''); ?> 
            <?php if($readOnly): ?> readonly disabled <?php endif; ?>
            <?php if(!$isNative): ?> 
                data-tom-select
                data-placeholder="<?php echo e($placeholder); ?>"
                data-allow-empty="<?php echo e($allowEmpty ? 'true' : 'false'); ?>"
                data-allow-add="<?php echo e($allowAdd ? 'true' : 'false'); ?>"
                data-searchable="<?php echo e($enableSearch ? 'true' : 'false'); ?>"
            <?php endif; ?>
            <?php if(!empty($datalist)): ?> list="datalist-<?php echo e($attributes->get('id', $name)); ?>" <?php endif; ?>
            <?php echo e($attributes->merge(['class' => 'select__field'])); ?>>
            <?php if($allowEmpty): ?>
                <option value="" <?php if(empty($value) || !isset($options[$value])): ?> selected <?php endif; ?>><?php echo e($placeholder ?: __('def.select_option')); ?></option>
            <?php endif; ?>
            <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($key); ?>"
                    <?php if(is_array($value) && in_array($key, $value)): ?> selected
                    <?php elseif(isset($value[$key]) && $value[$key] == $option): ?> selected
                    <?php elseif($key == $value): ?> selected <?php endif; ?>>
                    <?php echo e($option); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php echo e($slot); ?>

        </select>

        <?php if($isNative): ?>
            <span class="select__toggle-icon">
                <svg width="10" height="7" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="2" fill="none" fill-rule="evenodd" />
                </svg>
            </span>
        <?php endif; ?>
    </div>

    <?php if(!empty($datalist)): ?>
        <datalist id="datalist-<?php echo e($attributes->get('id', $name)); ?>">
            <?php $__currentLoopData = $datalist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($item); ?>"></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </datalist>
    <?php endif; ?>

    <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="select__error"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>
<?php /**PATH /home/compvge/public_html/app/Themes/standard/views/components/fields/select.blade.php ENDPATH**/ ?>