<div class="banners-widget">
    <?php if(empty($banners)): ?>
        <div class="banners-empty">
            <p><?php echo e(__('banners.no_banners')); ?></p>
        </div>
    <?php else: ?>
        <div class="banners-slider swiper<?php echo e(count($banners) <= 1 ? ' single-banner' : ''); ?>"
            <?php if(($settings['autoplay'] ?? true) && count($banners) > 1): ?> data-autoplay="true" data-interval="<?php echo e($settings['interval'] ?? 5000); ?>" <?php endif; ?>
            data-height-mode="<?php echo e($settings['height_mode'] ?? 'manual'); ?>" data-height="<?php echo e($settings['height'] ?? 300); ?>"
            <?php if(($settings['height_mode'] ?? 'manual') === 'manual'): ?> style="height: <?php echo e($settings['height'] ?? 300); ?>px;" <?php endif; ?>>
            <div class="banners-slider-track swiper-wrapper">
                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="banner-slide swiper-slide">
                        <?php if(!empty($banner['link_url'])): ?>
                            <a href="<?php echo e($banner['link_url']); ?>" target="<?php echo e($banner['target'] ?? '_self'); ?>"
                                rel="<?php echo e(($banner['target'] ?? '_self') === '_blank' ? 'noopener noreferrer' : ''); ?>"
                                <?php if(!empty($banner['link_url']) && !str_contains($banner['link_url'], 'http')): ?> hx-boost="true" 
                                   hx-target="#main" 
                                   hx-swap="outerHTML transition:true" <?php endif; ?>
                                aria-label="<?php echo e(!empty($banner['title']) ? __($banner['title']) : __('banners.banner_image')); ?>">
                        <?php endif; ?>

                        <div class="banner-image">
                            <img src="<?php echo e(asset($banner['image_url'])); ?>"
                                alt="<?php echo e(__($banner['title'] ?? __('banners.banner_image'))); ?>"
                                loading="<?php echo e($index === 0 ? 'eager' : 'lazy'); ?>" decoding="async">
                        </div>

                        <?php if(!empty($banner['title']) || !empty($banner['description'])): ?>
                            <div class="banner-content">
                                <?php if(!empty($banner['title'])): ?>
                                    <h3 class="banner-title"><?php echo e(__($banner['title'])); ?></h3>
                                <?php endif; ?>

                                <?php if(!empty($banner['description'])): ?>
                                    <div class="banner-description"><?php echo e(__($banner['description'])); ?></div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php if(!empty($banner['link_url'])): ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php if(count($banners) > 1): ?>
                <div class="banners-controls">
                    <button class="banner-prev" type="button" aria-label="<?php echo e(__('banners.prev_slide')); ?>">
                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.caret-left'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

                    <button class="banner-next" type="button" aria-label="<?php echo e(__('banners.next_slide')); ?>">
                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.caret-right'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

                <div class="banners-indicators" role="tablist" aria-label="<?php echo e(__('banners.slide_indicators')); ?>"></div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Modules/Banners/Resources/views/widgets/banners.blade.php ENDPATH**/ ?>