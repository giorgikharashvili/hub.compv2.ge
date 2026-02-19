<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.alert','data' => ['type' => 'warning','withClose' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'warning','withClose' => 'false']); ?>
    <div>
        <strong><?php echo __('admin-dashboard.ioncube.perf_title'); ?></strong>
        <div><?php echo __('admin-dashboard.ioncube.perf_desc'); ?></div>

        <div>
            <div class="font-bold mt-2"><?php echo __('admin-dashboard.ioncube.ini_title'); ?></div>
            <div class="mb-1"><?php echo __('admin-dashboard.ioncube.ini_note'); ?></div>
            <pre><code><?php echo e($ini_line); ?></code></pre>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/app/Core/Modules/Admin/Packages/Dashboard/Resources/views/components/ioncube-notice.blade.php ENDPATH**/ ?>