<?php foreach ((['name' => null]) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>

<?php
    $name = preg_replace('/[^\w-]/', '_', $name);
?>

<div <?php echo e($attributes->merge(['class' => 'tabs-content'])); ?> role="tabpanel" 
    aria-labelledby="tab-<?php echo e($name); ?>" data-name="tab__<?php echo e($name); ?>">
    <?php echo e($slot); ?>

</div>
<?php /**PATH /home/compvge/public_html/app/Themes/standard/views/components/tab-body.blade.php ENDPATH**/ ?>