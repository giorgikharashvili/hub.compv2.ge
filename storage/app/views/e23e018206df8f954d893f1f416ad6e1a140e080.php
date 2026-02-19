<?php
    $required = $attributes->required ?? false;
    $disabled = $attributes->disabled ?? false;
    $multiple = $attributes->get('multiple', false);
    $mode = $attributes->get('mode', 'static');
    $plugins = $attributes->get('data-plugins', '[]');
    $placeholder = $attributes->get('placeholder', '');

    $value = request()->input($name, $value);
    
    if ($multiple && !is_array($value) && !empty($value)) {
        $value = [$value];
    }
?>

<div class="field field--select" data-field>
    <div class="field__wrapper">
        <div class="select-wrapper" <?php if($yoyo): ?> yoyo hx-trigger="change delay:10ms" <?php endif; ?>>
            <select id="<?php echo e($id); ?>" name="<?php echo e($name); ?><?php echo e($multiple ? '[]' : ''); ?>" class="select__field"
                <?php if($multiple): ?> multiple <?php endif; ?> <?php if($required): ?> required <?php endif; ?>
                <?php if($disabled): ?> disabled <?php endif; ?> data-select data-mode="<?php echo e($mode); ?>"
                data-max-items="<?php echo e($maxItems); ?>" data-plugins="<?php echo $plugins; ?>"
                placeholder="<?php echo e($placeholder); ?>"
                data-allow-add="<?php echo e($attributes->get('data-allow-add')); ?>"
                data-searchable="<?php echo e($attributes->get('data-searchable', 'auto')); ?>"
                data-search-threshold="<?php echo e($attributes->get('data-search-threshold', '6')); ?>"
                <?php if($mode === 'async'): ?> data-search-url="<?php echo e($attributes->get('data-search-url')); ?>"
                        data-search-min-length="<?php echo e($attributes->get('data-search-min-length')); ?>"
                        data-search-delay="<?php echo e($attributes->get('data-search-delay')); ?>"
                        data-search-fields="<?php echo $attributes->get('data-search-fields'); ?>"
                        data-entity="<?php echo e($attributes->get('data-entity')); ?>"
                        data-display-field="<?php echo e($attributes->get('data-display-field')); ?>"
                        data-value-field="<?php echo e($attributes->get('data-value-field')); ?>"
                        data-preload="<?php echo e($attributes->get('data-preload')); ?>" <?php endif; ?>
                <?php if($attributes->get('renderOption')): ?> data-render-option="<?php echo e($attributes->get('renderOption')); ?>" <?php endif; ?>
                <?php if($attributes->get('renderItem')): ?> data-render-item="<?php echo e($attributes->get('renderItem')); ?>" <?php endif; ?>
                <?php if($attributes->get('renderNoResults')): ?> data-render-no-results="<?php echo e($attributes->get('renderNoResults')); ?>" <?php endif; ?>>

                <?php if($mode === 'static'): ?>
                    <?php if(!$multiple && $placeholder): ?>
                        <option value=""><?php echo e($placeholder); ?></option>
                    <?php endif; ?>
                    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionValue => $optionLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($optionValue); ?>"
                            <?php if($multiple && is_array($value)): ?> 
                                <?php echo e(in_array((string) $optionValue, array_map('strval', $value)) ? 'selected' : ''); ?>

                            <?php else: ?>
                                <?php echo e((string) $optionValue === (string) $value ? 'selected' : ''); ?> 
                            <?php endif; ?>>
                            <?php echo e($optionLabel); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>
        </div>

        <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="input__error"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
</div>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Core/Modules/Admin/Resources/views/partials/fields/select.blade.php ENDPATH**/ ?>