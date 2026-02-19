<?php echo app('Flute\Core\Template\TemplateAssets')->assetFunction(path('app/Modules/MiniBalance/Resources/assets/js/mini-balance.js'), false); ?>

<li class="mini-balance-container is-compact" role="button" data-tooltip="<?php echo e(__('minibalance.balance')); ?>" tabindex="0"
    aria-label="<?php echo e(__('minibalance.balance')); ?>"
    <?php if(config('lk.only_modal')): ?> data-modal-open="lk-modal" 
    <?php else: ?>
        hx-get="<?php echo e(url('lk')); ?>"
        hx-target="#main"
        hx-swap="outerHTML transition:true"
        hx-trigger="click" <?php endif; ?>>
    <div class="mini-balance-amount">
        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.wallet','class' => 'mini-balance-icon'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
        <span class="mini-balance-value" data-profile-balance>
            <?php echo e(number_format(user()->balance ?? 0)); ?>

        </span>
        <span class="mini-balance-currency"><?php echo e(config('lk.currency_view')); ?></span>
    </div>

    <span class="mini-balance-btn" aria-hidden="true">
        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
    </span>
</li>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Modules/MiniBalance/Resources/views/index.blade.php ENDPATH**/ ?>