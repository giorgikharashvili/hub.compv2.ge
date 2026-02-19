<?php $__env->startSection('title'); ?>
    <?php echo e(!empty(page()->title) ? page()->title : t('auth.header.login')); ?>

<?php $__env->stopSection(); ?>

<?php
    $allowStandardAuth =
        !config('auth.only_social', false) || (config('auth.only_social', false) && sizeof(social()->getAll()) === 0);
?>

<?php $__env->startPush('content'); ?>
    <div class="h-100 container mt-4">
        <section class="auth-container">
            <header class="auth-header">
                <h2><?php echo __('auth.header.login'); ?></h2>

                <?php if($allowStandardAuth): ?>
                    <p><?php echo __('auth.no_account'); ?> <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.link','data' => ['hxBoost' => 'true','hxTarget' => '#main','hxSwap' => 'outerHTML transition:true','href' => ''.e(url('/register')).'','type' => 'accent']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['hx-boost' => 'true','hx-target' => '#main','hx-swap' => 'outerHTML transition:true','href' => ''.e(url('/register')).'','type' => 'accent']); ?><?php echo __('auth.register'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?></p>
                <?php endif; ?>
            </header>

            <article>
                <?php $__env->startFragment('auth-card'); ?>
                    <?php echo $__env->make('flute::partials.social-login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php if($allowStandardAuth): ?>
                        <?php
$yoyo = \Clickfwd\Yoyo\Yoyo::getInstance();
if (Yoyo\is_spinning()) {
    echo $yoyo->mount('login')->refresh();
} else {
    echo $yoyo->mount('login')->render();
}
?>
                    <?php endif; ?>
                <?php echo $__env->stopFragment(); ?>
            </article>
        </section>
    </div>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('flute::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/pages/login.blade.php ENDPATH**/ ?>