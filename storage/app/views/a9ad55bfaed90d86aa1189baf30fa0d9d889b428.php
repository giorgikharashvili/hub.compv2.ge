<a class="footer__logo footer__logo-dark" href="<?php echo e(url('/')); ?>" aria-label="<?php echo e(config('app.name')); ?>" itemprop="url">
    <img src="<?php echo e(asset(config('app.logo'))); ?>" loading="lazy" alt="<?php echo e(config('app.name')); ?>" width="150" height="40" itemprop="logo">
</a>

<a class="footer__logo footer__logo-light" href="<?php echo e(url('/')); ?>" aria-label="<?php echo e(config('app.name')); ?>" itemprop="url">
    <img src="<?php echo e(asset(config('app.logo_light', config('app.logo')))); ?>" loading="lazy" alt="<?php echo e(config('app.name')); ?>" width="150" height="40" itemprop="logo">
</a>

<?php if(!empty(config('app.footer_description'))): ?>
    <p class="footer__description" itemprop="description"><?php echo __(config('app.footer_description', '')); ?></p>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/app/Themes/standard/views/components/footer/logo.blade.php ENDPATH**/ ?>