<?php if(isset($js)): ?>
    <?php $__env->startPush('scripts'); ?>
        <?php $__currentLoopData = $js; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jsFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction($jsFile, false); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php $__env->stopPush(); ?>
<?php endif; ?>

<?php if(isset($css)): ?>
    <?php $__env->startPush('styles'); ?>
        <?php $__currentLoopData = $css; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cssFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction($cssFile, false); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php $__env->stopPush(); ?>
<?php endif; ?>

<!-- ID need for correct htmx swap -->
<?php
    $dirtyConfig = is_array($screenDirty ?? null) ? $screenDirty : null;
    $dirtyEnabled = (bool) ($dirtyConfig['enabled'] ?? false);
?>

<div
    id="screen-container"
    <?php if($dirtyEnabled): ?>
        data-dirty-enabled="true"
        data-dirty-config='<?php echo json_encode($dirtyConfig, 15, 512) ?>'
    <?php endif; ?>
>
    <?php $__env->startSection('title', (string) __($screenName ?? '')); ?>
    <?php $__env->startSection('description', (string) __($screenDescription ?? '')); ?>

    <?php if($screenName || $screenDescription || ! empty($screenCommandBar)): ?>
        <legend class="base-legend">
            <div>
                <h4><?php echo e(__($screenName ?? '')); ?> <?php if($screenPopover): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.popover','data' => ['content' => $screenPopover]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['content' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($screenPopover)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php endif; ?>
                </h4>

                <?php if(! empty($screenDescription)): ?>
                    <small class="d-block text-muted text-balance mb-0">
                        <?php echo __($screenDescription ?? ''); ?>

                    </small>
                <?php endif; ?>
            </div>
            <ul class="row g-2 p-0">
                <?php $__currentLoopData = $screenCommandBar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $command): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="col">
                        <?php echo $command; ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </legend>
    <?php endif; ?>

    <?php echo $__env->renderWhen(request()->isBoost(), 'admin::partials.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

    <?php echo $screenLayouts ?? ''; ?>


    <div id="modals-container" <?php if(user()->device()->isMobile()): ?> hx-swap="outerHTML" <?php endif; ?>>
        <?php echo $__env->yieldPushContent('modals-container'); ?>
    </div>

    <?php if($dirtyEnabled): ?>
        <?php echo $__env->make('admin::partials.dirty', ['config' => $dirtyConfig], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</div><?php /**PATH /home/compvge/public_html/bootstrap/../app/Core/Modules/Admin/Resources/views/layouts/base.blade.php ENDPATH**/ ?>