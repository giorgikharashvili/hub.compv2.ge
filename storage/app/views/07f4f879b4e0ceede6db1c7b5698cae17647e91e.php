<?php $__env->startPush('footer'); ?>
    <?php if(config('auth.only_modal')): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.modal','data' => ['id' => 'auth-modal','title' => ''.e(__('auth.header.login')).'','loadUrl' => ''.e('/login').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'auth-modal','title' => ''.e(__('auth.header.login')).'','loadUrl' => ''.e('/login').'']); ?>
             <?php $__env->slot('skeleton', null, []); ?> 
                <div class="modal__content-loading">
                    <div class="d-flex mb-4 flex-wrap gap-2">
                        <div class="skeleton w-100" style="height: 40px; border-radius: var(--border05);"></div>
                    </div>

                    <div class="skeleton mb-3" style="height: 70px; border-radius: var(--border05);"></div>
                    <div class="skeleton mb-3" style="height: 70px; border-radius: var(--border05);"></div>
                    <div class="skeleton mb-4" style="height: 30px; width: 50%; border-radius: var(--border05);"></div>
                    <div class="skeleton" style="height: 48px; border-radius: var(--border05);"></div>
                </div>
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.modal','data' => ['id' => 'register-modal','title' => ''.e(__('auth.header.register')).'','loadUrl' => ''.e('/register').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'register-modal','title' => ''.e(__('auth.header.register')).'','loadUrl' => ''.e('/register').'']); ?>
             <?php $__env->slot('skeleton', null, []); ?> 
                <div class="modal__content-loading">
                    <div class="d-flex mb-4 flex-wrap gap-2">
                        <div class="skeleton w-100" style="height: 40px; border-radius: var(--border05);"></div>
                    </div>

                    <div class="skeleton mb-3" style="height: 70px; border-radius: var(--border05);"></div>
                    <div class="skeleton mb-3" style="height: 70px; border-radius: var(--border05);"></div>
                    <div class="skeleton mb-3" style="height: 70px; border-radius: var(--border05);"></div>
                    <div class="skeleton mb-3" style="height: 70px; border-radius: var(--border05);"></div>
                    <div class="skeleton mb-4" style="height: 70px; border-radius: var(--border05);"></div>
                    <div class="skeleton" style="height: 48px; border-radius: var(--border05);"></div>
                </div>
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if(config('lk.only_modal')): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.modal','data' => ['id' => 'lk-modal','title' => ''.e(__('lk.title')).'','loadUrl' => ''.e('/lk').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'lk-modal','title' => ''.e(__('lk.title')).'','loadUrl' => ''.e('/lk').'']); ?>
             <?php $__env->slot('skeleton', null, []); ?> 
                <div class="modal__content-loading">
                    <div class="lk-payment-layout">
                        <div class="lk-payment-main">
                            <div class="skeleton mb-4" style="height: 40px; width: 60%; border-radius: var(--border05);">
                            </div>
                            <div class="d-flex mb-4 flex-wrap gap-2">
                                <div class="skeleton"
                                    style="height: 60px; width: calc(33.333% - 0.5rem); min-width: 100px; border-radius: var(--border05);">
                                </div>
                                <div class="skeleton"
                                    style="height: 60px; width: calc(33.333% - 0.5rem); min-width: 100px; border-radius: var(--border05);">
                                </div>
                                <div class="skeleton"
                                    style="height: 60px; width: calc(33.333% - 0.5rem); min-width: 100px; border-radius: var(--border05);">
                                </div>
                            </div>
                        </div>

                        <div class="skeleton lk-payment-summary-skeleton"
                            style="height: 250px; border-radius: var(--border1);"></div>
                    </div>
                </div>
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php endif; ?>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/partials/default-modals.blade.php ENDPATH**/ ?>