<?php $__env->startSection('title'); ?>
    <?php echo e(!empty(page()->title) ? page()->title : t('auth.header.register')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('content'); ?>
    <div class="h-100 container mt-4">
        <section class="auth-container">
            <header class="auth-header">
                <h2><?php echo __('auth.header.register'); ?></h2>
                <p><?php echo __('auth.have_account'); ?> <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.link','data' => ['hxBoost' => 'true','hxTarget' => '#main','hxSwap' => 'outerHTML transition:true','href' => ''.e(url('/login')).'','type' => 'accent']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['hx-boost' => 'true','hx-target' => '#main','hx-swap' => 'outerHTML transition:true','href' => ''.e(url('/login')).'','type' => 'accent']); ?><?php echo __('auth.login'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?></p>
            </header>

            <article>
                <?php $__env->startFragment('register-card'); ?>
                    <?php echo $__env->make('flute::partials.social-login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php
$yoyo = \Clickfwd\Yoyo\Yoyo::getInstance();
if (Yoyo\is_spinning()) {
    echo $yoyo->mount('register')->refresh();
} else {
    echo $yoyo->mount('register')->render();
}
?>
                <?php echo $__env->stopFragment(); ?>
            </article>
        </section>
    </div>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('flute::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/pages/register.blade.php ENDPATH**/ ?>