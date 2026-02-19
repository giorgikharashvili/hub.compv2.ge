<aside class="modal right_sidebar" id="page-edit-dialog" aria-hidden="true" aria-labelledby="page-edit-dialog-title"
    role="dialog" data-a11y-dialog>
    <div class="right_sidebar__overlay" tabindex="-1" data-a11y-dialog-hide></div>
    <div class="right_sidebar__container" id="page-edit-dialog-container" role="dialog" aria-modal="true"
        data-a11y-dialog-ignore-focus-trap>
        <header class="right_sidebar__header">
            <h5 class="right_sidebar__title" id="modal-1-title">
                <?php echo __('def.widget_settings'); ?>
            </h5>
            <button class="right_sidebar__close" aria-label="Close modal"
                data-a11y-dialog-hide="page-edit-dialog"></button>
        </header>

        <div class="right_sidebar__content page-edit-dialog-content" id="page-edit-dialog-content"></div>

        <div class="right_sidebar__footer w-100">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['type' => 'primary','class' => 'w-100','id' => 'widget-settings-save-btn','hxInclude' => '#page-edit-dialog-content form','hxSwap' => 'none']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'primary','class' => 'w-100','id' => 'widget-settings-save-btn','hx-include' => '#page-edit-dialog-content form','hx-swap' => 'none']); ?>
                <?php echo __('def.save'); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>
    </div>
</aside><?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/partials/page-edit-dialog.blade.php ENDPATH**/ ?>