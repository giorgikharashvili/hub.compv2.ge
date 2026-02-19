<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'id' => 'default-modal',
    'title' => null,
    'loadUrl' => null,
    'loadTarget' => null,
    'footer' => null,
    'skeleton' => null,
    'closeOnOverlay' => true,
    'boosted' => false,
    'inline' => false,
    'size' => null,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'id' => 'default-modal',
    'title' => null,
    'loadUrl' => null,
    'loadTarget' => null,
    'footer' => null,
    'skeleton' => null,
    'closeOnOverlay' => true,
    'boosted' => false,
    'inline' => false,
    'size' => null,
]); ?>
<?php foreach (array_filter(([
    'id' => 'default-modal',
    'title' => null,
    'loadUrl' => null,
    'loadTarget' => null,
    'footer' => null,
    'skeleton' => null,
    'closeOnOverlay' => true,
    'boosted' => false,
    'inline' => false,
    'size' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php
    $modalContent = view('flute::components._modal-body', [
        'attributes' => $attributes,
        'id' => $id,
        'title' => $title,
        'loadUrl' => $loadUrl,
        'loadTarget' => $loadTarget,
        'footer' => $footer,
        'skeleton' => $skeleton,
        'closeOnOverlay' => $closeOnOverlay,
        'size' => $size,
        'slot' => $slot,
    ])->render();
?>

 <?php if($inline): ?>
     <?php echo $__env->make('flute::components._modal-body', [
        'attributes' => $attributes,
        'id' => $id,
        'title' => $title,
        'loadUrl' => $loadUrl,
        'loadTarget' => $loadTarget,
        'footer' => $footer,
        'skeleton' => $skeleton,
        'closeOnOverlay' => $closeOnOverlay,
        'size' => $size,
        'slot' => $slot,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php elseif(request()->htmx()->isBoosted() || $boosted): ?>
     <div hx-swap-oob="beforeend:#modals" hx-trigger="none">
         <?php echo $__env->make('flute::components._modal-body', [
            'attributes' => $attributes,
            'id' => $id,
            'title' => $title,
            'loadUrl' => $loadUrl,
            'loadTarget' => $loadTarget,
            'footer' => $footer,
            'skeleton' => $skeleton,
            'closeOnOverlay' => $closeOnOverlay,
            'size' => $size,
            'slot' => $slot,
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     </div>
 <?php else: ?>
     <?php $__env->startPush('modals'); ?>
         <?php echo $__env->make('flute::components._modal-body', [
            'attributes' => $attributes,
            'id' => $id,
            'title' => $title,
            'loadUrl' => $loadUrl,
            'loadTarget' => $loadTarget,
            'footer' => $footer,
            'skeleton' => $skeleton,
            'closeOnOverlay' => $closeOnOverlay,
            'size' => $size,
            'slot' => $slot,
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <?php $__env->stopPush(); ?>
 <?php endif; ?><?php /**PATH /home/compvge/public_html/app/Themes/standard/views/components/modal.blade.php ENDPATH**/ ?>