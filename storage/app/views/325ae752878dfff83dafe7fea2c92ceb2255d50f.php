<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['item']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['item']); ?>
<?php foreach (array_filter((['item']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<a href="<?php echo e(url($item['url'])); ?>" <?php if($item['new_tab']): ?> target="_blank" <?php endif; ?>
    class="navbar__items-item <?php echo e(active($item['url'])); ?> <?php if(! $item['icon']): ?> without-icon <?php endif; ?>" itemprop="url"
    >
    <?php if($item['icon']): ?>
        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['class' => 'navbar__items-item-icon','path' => ''.e($item['icon']).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
    <?php if(!empty($item['description'])): ?>
        <div class="navbar__items-item-content">
            <span itemprop="name"><?php echo e(__($item['title'])); ?></span>
            <small class="navbar__items-item-description"><?php echo e(__($item['description'])); ?></small>
        </div>
    <?php else: ?>
        <span itemprop="name"><?php echo e(__($item['title'])); ?></span>
    <?php endif; ?>
</a><?php /**PATH /home/compvge/public_html/app/Themes/standard/views/components/header/navbar/link.blade.php ENDPATH**/ ?>