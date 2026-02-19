<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'type' => 'primary',
    'size' => 'medium',
    'disabled' => false,
    'withLoading' => false,
    'isLink' => false,
    'submit' => false,
    'href' => null,
    'icon' => null,
    'swap' => null,
    'confirm' => null,
    'confirmType' => 'error',
    'baseClasses' => 'btn',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'type' => 'primary',
    'size' => 'medium',
    'disabled' => false,
    'withLoading' => false,
    'isLink' => false,
    'submit' => false,
    'href' => null,
    'icon' => null,
    'swap' => null,
    'confirm' => null,
    'confirmType' => 'error',
    'baseClasses' => 'btn',
]); ?>
<?php foreach (array_filter(([
    'type' => 'primary',
    'size' => 'medium',
    'disabled' => false,
    'withLoading' => false,
    'isLink' => false,
    'submit' => false,
    'href' => null,
    'icon' => null,
    'swap' => null,
    'confirm' => null,
    'confirmType' => 'error',
    'baseClasses' => 'btn',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $typeClasses = [
        'accent' => 'btn-accent',
        'primary' => 'btn-primary',
        'error' => 'btn-error',
        'warning' => 'btn-warning',
        'success' => 'btn-success',
        'outline-accent' => 'btn-outline-accent',
        'outline-primary' => 'btn-outline-primary',
        'outline-error' => 'btn-outline-error',
        'outline-warning' => 'btn-outline-warning',
        'outline-success' => 'btn-outline-success',
    ];
    $sizeClasses = [
        'tiny' => 'btn-tiny',
        'small' => 'btn-small',
        'medium' => 'btn-medium',
        'large' => 'btn-large',
    ];
    $classes = implode(' ', [
        $baseClasses,
        $typeClasses[$type] ?? $typeClasses['primary'],
        $sizeClasses[$size] ?? $sizeClasses['medium'],
    ]);

    $isLink = $isLink || !empty($href);
    $elementAttributes = ['class' => $classes];

    if ($isLink) {
        $tag = 'a';
        $elementAttributes['href'] = $href ?? '#';
        if ($href) {
            $elementAttributes['hx-boost'] = 'false';
            $elementAttributes['hx-trigger'] = 'none';
        }
        if ($disabled) {
            $elementAttributes['aria-disabled'] = 'true';
            $elementAttributes['class'] .= ' disabled';
        }
    } else {
        $tag = 'button';
        $elementAttributes['type'] = $submit ? 'submit' : 'button';
        if ($disabled) {
            $elementAttributes['disabled'] = true;
        }
    }

    if ($withLoading) {
        $elementAttributes['data-loading-aria-busy'] = 'true';
    }

    if ($swap) {
        $elementAttributes['hx-trigger'] = 'none';
        $elementAttributes['hx-boost'] = 'true';
        $elementAttributes['hx-target'] = '#main';
        $elementAttributes['hx-swap'] = 'outerHTML transition:true';
    }

    if ($confirm) {
        $elementAttributes['hx-flute-confirm'] = $confirm;
        $elementAttributes['hx-flute-confirm-type'] = $confirmType;
        $elementAttributes['hx-trigger'] = 'confirmed';
    }

    // Yoyo actions should include the current screen inputs by default (toggles/selects/etc).
    // Allow explicit overrides via attributes (e.g. hx-include="none").
    // NOTE: use raw attributes array to reliably detect keys like "yoyo:post".
    $rawAttrs = method_exists($attributes, 'getAttributes') ? $attributes->getAttributes() : [];
    $hasYoyoPost = array_key_exists('yoyo:post', $rawAttrs);
    $hasHxInclude = array_key_exists('hx-include', $rawAttrs);
    if ($tag === 'button' && $hasYoyoPost && !$hasHxInclude) {
        // Include all inputs from current screen (works with htmx/yoyo serialization)
        $elementAttributes['hx-include'] = '#screen-container';
    }
?>

<<?php echo e($tag); ?> <?php echo e($attributes->merge($elementAttributes)); ?>>
    <?php if($icon): ?>
        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['class' => 'me-1','path' => ''.e($icon).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
    <?php endif; ?>
    <span class="btn-label"><?php echo e($name ?? $slot); ?></span>
    </<?php echo e($tag); ?>>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Core/Modules/Admin/Resources/views/components/button.blade.php ENDPATH**/ ?>