<div class="page-edit-onboarding" id="pageEditOnboarding" style="display: none;">
    <div class="page-edit-onboarding-inner">
        <div class="page-edit-onboarding-slides" id="onboardingSlides">
            <?php
                $onboardingSlides = [
                    [
                        'type' => 'image',
                        'media' => url('assets/img/onboarding/slide1.png'),
                        'title' => __('page.onboarding.colors.title'),
                        'description' => __('page.onboarding.colors.description'),
                    ],
                    [
                        'type' => 'image',
                        'media' => url('assets/img/onboarding/slide2.png'),
                        'title' => __('page.onboarding.widgets.title'),
                        'description' => __('page.onboarding.widgets.description'),
                    ],
                    [
                        'type' => 'image',
                        'media' => url('assets/img/onboarding/slide3.png'),
                        'title' => __('page.onboarding.widgets.settings.title'),
                        'description' => __('page.onboarding.widgets.settings.description'),
                    ],
                    [
                        'type' => 'gif',
                        'media' => url('assets/img/onboarding/slide4.gif'),
                        'title' => __('page.onboarding.try.title'),
                        'description' => __('page.onboarding.try.description'),
                    ],
                ];
            ?>

            <?php $__currentLoopData = $onboardingSlides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="page-edit-onboarding-slide" data-slide-index="<?php echo e($loop->index); ?>">
                    <div class="slide-media">
                        <?php if($slide['type'] === 'video'): ?>
                            <video src="<?php echo e($slide['media']); ?>" autoplay muted loop></video>
                        <?php elseif($slide['type'] === 'gif' || $slide['type'] === 'image'): ?>
                            <img src="<?php echo e($slide['media']); ?>" alt="<?php echo e($slide['title']); ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="slide-content">
                        <h3><?php echo e($slide['title']); ?></h3>
                        <p><?php echo e($slide['description']); ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="page-edit-onboarding-controls">
            <div class="page-edit-onboarding-indicators" id="onboardingIndicators"></div>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['type' => 'primary','id' => 'onboardingNextBtn','class' => 'next-btn']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'primary','id' => 'onboardingNextBtn','class' => 'next-btn']); ?><?php echo e(__('page.onboarding.next')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/partials/page-edit-onboarding.blade.php ENDPATH**/ ?>