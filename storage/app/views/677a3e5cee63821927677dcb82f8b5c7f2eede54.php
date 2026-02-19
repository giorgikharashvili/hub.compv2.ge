
<?php if(config('app.flute_copyright')): ?>
    <div class="footer__down" itemscope itemtype="https://schema.org/WPFooter">
        <p>
            <span itemprop="copyrightYear">© <?php echo e(date('Y')); ?></span> 
            <span itemprop="copyrightHolder" itemscope itemtype="https://schema.org/Organization">
                <span itemprop="name"><?php echo e(config('app.name')); ?></span>
            </span> —
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.link','data' => ['href' => 'https://flute-cms.com/','target' => '_blank','rel' => 'noopener nofollow','itemprop' => 'url']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => 'https://flute-cms.com/','target' => '_blank','rel' => 'noopener nofollow','itemprop' => 'url']); ?>
                Powered by Flute CMS
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </p>
    </div>

    <?php $__env->startPush('scripts'); ?>
        <script>
            console.log(
                "\n%c 🚀 Flute CMS %c v<?php echo e(app()::VERSION); ?> %c\n\n%cThis website proudly uses Flute CMS.\n%c🔗 GitHub:%c https://github.com/Flute-CMS \n\n%cThank you for supporting open-source projects! ❤️",
                "background: #A5FF75; color: #0F0F0F; font-size: 14px; font-weight: bold; padding: 4px; border-radius: 4px 0 0 4px;",
                "background: #388E3C; color: #0F0F0F; font-size: 14px; padding: 4px; border-radius: 0 4px 4px 0;",
                "background: transparent;",
                "color: #555; font-size: 13px; font-family: sans-serif; font-weight: bold;",
                "color: #A5FF75; font-weight: bold; font-size: 12px;",
                "color: #0a73b8; font-size: 12px; font-family: monospace;",
                "color: #e25555; font-size: 12px; font-style: italic; margin-top: 8px;"
            );
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/app/Themes/standard/views/components/footer/copyright.blade.php ENDPATH**/ ?>