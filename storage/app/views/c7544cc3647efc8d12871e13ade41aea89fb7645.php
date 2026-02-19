<aside class="modal right_sidebar" id="page-seo-dialog" aria-hidden="true" aria-labelledby="page-seo-dialog-title"
    role="dialog" data-a11y-dialog>
    <div class="right_sidebar__overlay" tabindex="-1" data-a11y-dialog-hide></div>
    <div class="right_sidebar__container" id="page-seo-dialog-container" role="dialog" aria-modal="true"
        data-a11y-dialog-ignore-focus-trap>
        <header class="right_sidebar__header">
            <h5 class="right_sidebar__title" id="page-seo-dialog-title">
                <?php echo __('page.seo.title'); ?>
            </h5>
            <button class="right_sidebar__close" aria-label="Close modal"
                data-a11y-dialog-hide="page-seo-dialog"></button>
        </header>

        <div class="right_sidebar__content w-100 mt-2 h-full" id="page-seo-dialog-content">
            <div class="d-flex flex-column w-100 flex-1 gap-2">
                <?php for($i = 0; $i < 6; $i++): ?>
                    <div class="skeleton w-100" style="height: <?php echo e(80 + $i * 10); ?>px; flex-grow: 1;"></div>
                <?php endfor; ?>
            </div>
        </div>

        <div class="right_sidebar__footer w-100">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['type' => 'primary','class' => 'w-100','id' => 'page-seo-save-btn','hxPost' => ''.e(route('pages.saveSEO')).'','hxInclude' => '#page-seo-form','hxSwap' => 'none','withLoading' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'primary','class' => 'w-100','id' => 'page-seo-save-btn','hx-post' => ''.e(route('pages.saveSEO')).'','hx-include' => '#page-seo-form','hx-swap' => 'none','withLoading' => true]); ?>
                <?php echo __('def.save'); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>
    </div>
</aside>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/partials/page-seo-dialog.blade.php ENDPATH**/ ?>