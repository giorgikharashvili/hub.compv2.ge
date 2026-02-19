<?php
    $toasts = app(\Flute\Core\Services\ToastService::class)->getToasts();
?>

<?php if(!empty($toasts)): ?>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toasts = <?php echo json_encode($toasts, 15, 512) ?>;
            toasts.forEach(function(toast) {
                displayToast(toast);
            });
        });
    </script>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Core/Modules/Admin/Resources/views/partials/toasts.blade.php ENDPATH**/ ?>