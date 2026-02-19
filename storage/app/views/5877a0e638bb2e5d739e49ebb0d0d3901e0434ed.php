<?php $__env->startSection('title'); ?>
    <?php echo e($code.' - '.$message); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('content'); ?>
    <div class="status-page error-page">
        <div class="error-container">
            <div class="error-code-container">
                <h1 class="error-code"><?php echo e($code); ?></h1>
                <div class="error-code-shadow"></div>
            </div>

            <div class="error-content">
                <h2 class="error-message"><?php echo e($message); ?></h2>
                <p class="error-description">
                    <?php if($code == 404): ?>
                        <?php echo e(__('error.404_description')); ?>

                    <?php elseif($code == 403): ?>
                        <?php echo e(__('error.403_description')); ?>

                    <?php elseif($code == 500): ?>
                        <?php echo e(__('error.500_description')); ?>

                    <?php else: ?>
                        <?php echo e(__('error.default_description')); ?>

                    <?php endif; ?>
                </p>

                <div class="error-actions" hx-boost="true" hx-target="#main" hx-swap="outerHTML transition:true">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['href' => ''.e(url('/')).'','type' => 'accent','class' => 'error-button']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(url('/')).'','type' => 'accent','class' => 'error-button']); ?>
                        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.house'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <?php echo e(__('def.back_home')); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                    <?php if($code == 404): ?>
                        <?php $prevUrl = (string)url()->previous(); ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['href' => ''.e($prevUrl).'','swap' => ''.e(!str_contains($prevUrl, 'admin/') ? 'true' : 'false').'','type' => 'outline-accent','class' => 'error-button']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e($prevUrl).'','swap' => ''.e(!str_contains($prevUrl, 'admin/') ? 'true' : 'false').'','type' => 'outline-accent','class' => 'error-button']); ?>
                            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.arrow-left'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <?php echo e(__('error.go_back')); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="error-decoration">
                <?php if($code == 404): ?>
                    <div class="error-illustration">
                        <div class="search-animation">
                            <div class="magnifier">
                                <div class="magnifier-handle"></div>
                                <div class="magnifier-glass"></div>
                                <div class="magnifier-reflection"></div>
                            </div>
                            <div class="question-marks">
                                <div class="question-mark q1">?</div>
                                <div class="question-mark q2">?</div>
                                <div class="question-mark q3">?</div>
                            </div>
                        </div>
                    </div>
                    
                <?php else: ?>
                    <div class="error-illustration">
                        <div class="generic-error-animation">
                            <div class="error-icon"></div>
                            <div class="error-pulse"></div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="error-particles">
            <?php for($i = 1; $i <= 20; $i++): ?>
                <div class="particle particle-<?php echo e($i); ?>"></div>
            <?php endfor; ?>
        </div>
    </div>

    <script>
        document.addEventListener('htmx:load', function () {
            const particles = document.querySelectorAll('.particle');
            particles.forEach(particle => {
                const randomX = Math.random() * 100 - 50;
                const randomY = Math.random() * 100 - 50;
                const randomDelay = Math.random() * 5;
                const randomDuration = 3 + Math.random() * 7;

                particle.classList.add('particle-animation');
                particle.style.setProperty('--x', `${randomX}px`);
                particle.style.setProperty('--y', `${randomY}px`);
                particle.style.setProperty('--delay', `${randomDelay}s`);
                particle.style.setProperty('--duration', `${randomDuration}s`);
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('flute::layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/pages/error.blade.php ENDPATH**/ ?>