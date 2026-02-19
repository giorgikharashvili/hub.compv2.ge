<?php
    $hasError = $errors->has($name);
?>

<?php if(isset($label)): ?>
    <label for="<?php echo e($id ?? $name ?? 'editor-'.uniqid()); ?>" class="form-label mb-2"><?php echo e($label); ?></label>
<?php endif; ?>

<div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
    'markdown-editor-wrapper',
    'is-invalid' => $hasError,
]) ?>">
    <textarea <?php echo e($attributes); ?> id="<?php echo e($id ?? $name ?? 'editor-'.uniqid()); ?>" data-editor="markdown"
        data-height="<?php echo e($height ?? 300); ?>" <?php echo isset($spellcheck) ? ' data-spellcheck="'.($spellcheck ? 'true' : 'false').'"' : ''; ?><?php echo isset($enableImageUpload) && $enableImageUpload ? ' data-upload="true"' : ''; ?><?php echo isset($imageUploadEndpoint) ? ' data-upload-url="'.$imageUploadEndpoint.'"' : ''; ?>><?php echo $value; ?></textarea>

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

<?php if(isset($help)): ?>
    <div class="form-text text-muted"><?php echo e($help); ?></div>
<?php endif; ?><?php /**PATH /home/compvge/public_html/bootstrap/../app/Core/Modules/Admin/Resources/views/partials/fields/richtext.blade.php ENDPATH**/ ?>