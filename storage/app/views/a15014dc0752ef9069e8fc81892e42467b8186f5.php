<span class="navbar__logo-monitoring" data-tooltip="<?php echo e(__('monitoring.navbar.logo')); ?>">
    <span class="navbar__logo-monitoring-indicator"></span>
    <span class="navbar__logo-monitoring-count">
        <?php echo e(app('monitoring.service')->getTotalPlayersCount()['players']); ?>

    </span>
</span>

<script>
    document.addEventListener('htmx:afterSwap', function(evt) {
        const monitoringCount = document.querySelector('.navbar__logo-monitoring-count');
        const count = evt.detail.xhr.getResponseHeader('Monitoring-count');

        if (typeof count === 'string' && count !== '') {
            monitoringCount.textContent = count;
        }
    });
</script>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Modules/Monitoring/Resources/views/components/navbar-logo.blade.php ENDPATH**/ ?>