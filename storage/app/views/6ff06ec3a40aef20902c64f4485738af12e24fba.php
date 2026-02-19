<div id="dropzone-overlay" class="dropzone-overlay">
    <div class="dropzone-overlay__content">
        <div class="upload-initial">
            <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.bold.cloud-arrow-up-bold','class' => 'dropzone-icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
            <h3><?php echo e(__('admin-modules.dropzone.overlay_title')); ?></h3>
            <p><?php echo e(__('admin-modules.dropzone.overlay_description')); ?></p>
        </div>

        <div class="upload-progress-view" style="display: none;">
            <div class="upload-progress-container">
                <div class="upload-progress-info">
                    <span id="upload-file-name"></span>
                    <span id="upload-progress-percent">0%</span>
                </div>
                <div class="upload-progress-bar">
                    <div class="upload-progress" id="upload-progress-bar" style="width: 0%"></div>
                </div>
            </div>
        </div>
    </div>

    <input type="file" name="module_archive" id="module-file-input" style="display:none;" accept=".zip">
</div><?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Packages/Modules/Resources/views/dropzone.blade.php ENDPATH**/ ?>