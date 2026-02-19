<li>
    <button hx-get="<?php echo e(url('sidebar/notifications')); ?>" class="navbar__notifications" hx-target="#right-sidebar-content"
        hx-swap="innerHTML transition:false" aria-expanded="false" data-disable-loading-states
        data-tooltip="<?php echo e(__('def.notifications')); ?>" aria-label="<?php echo e(__('def.notifications')); ?>">
        <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.bell'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['aria-hidden' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>

        <span class="navbar__notifications-indicator" id="notification-count" hx-target-4x="#error-hide-div"
            hx-target-error="#error-hide-div" hx-get="<?php echo e(url('api/notifications/count-unread')); ?>"
            hx-trigger="load, every 10s, refresh" hx-target="#notification-count" hx-swap="innerHTML" role="status"
            aria-label="<?php echo e(__('def.unread_notifications')); ?>" data-disable-loading-states data-noprogress
            hx-on="htmx:afterRequest: let response = (event.detail && event.detail.xhr && event.detail.xhr.responseText) ? event.detail.xhr.responseText.trim() : ''; let count = parseInt(response) || 0; this.style.display = count > 0 ? 'inline-block' : 'none';"
            style="<?php echo e(notification()->countUnread() > 0 ? 'display: inline-block;' : 'display: none;'); ?>">
        </span>
    </button>
    <div id="error-hide-div" style="display: none;"></div>
</li>
<?php /**PATH /home/compvge/public_html/app/Themes/standard/views/components/header/notifications.blade.php ENDPATH**/ ?>