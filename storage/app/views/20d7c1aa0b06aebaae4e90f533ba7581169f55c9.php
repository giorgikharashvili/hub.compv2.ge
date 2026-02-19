<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.modal','data' => ['id' => 'search-dialog','withoutCloseButton' => true,'contentClass' => 'search-dialog__content','dataIgnoreOverflow' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'search-dialog','withoutCloseButton' => true,'contentClass' => 'search-dialog__content','data-ignore-overflow' => true]); ?>
    <div class="search-dialog__container">
        <form class="w-full"
            onsubmit="return false;">
            <input type="text" name="query" class="search-dialog__input" placeholder="<?php echo e(__('search.lets_search')); ?>"
                hx-get="<?php echo e(url('admin/search')); ?>" hx-trigger="keyup changed delay:200ms" hx-sync="this:abort"
                hx-target="#search-results" hx-swap="innerHTML" autocomplete="off"
                aria-label="<?php echo e(__('search.search_input')); ?>" aria-controls="search-results" aria-expanded="false" data-noprogress>
        </form>
        <div id="command-suggestions" class="command-suggestions search-results--hidden" role="listbox"></div>
        <div id="search-results" class="search-results search-results--hidden" role="listbox"></div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Core/Modules/Admin/Resources/views/partials/search.blade.php ENDPATH**/ ?>