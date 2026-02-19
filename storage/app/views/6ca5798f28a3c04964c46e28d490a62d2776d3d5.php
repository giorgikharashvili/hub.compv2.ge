<nav class="breadcrumb" hx-swap-oob="innerHTML:#breadcrumb-container">
    <ul class="breadcrumb-links" hx-boost="true" hx-target="#main" hx-swap="morph:outerHTML transition:true">
        <?php $__currentLoopData = breadcrumb()->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $crumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <?php if($index > 0): ?>
                    <div class="breadcrumb-box">
                        <span class="breadcrumb-icon">/</span>

                        <?php if($crumb['url']): ?>
                            <a href="<?php echo e($crumb['url']); ?>" class="breadcrumb-text"><?php echo e($crumb['title']); ?></a>
                        <?php else: ?>
                            <span class="breadcrumb-text"><?php echo e($crumb['title']); ?></span>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <a href="<?php echo e($crumb['url'] ? $crumb['url'] : '#'); ?>" class="breadcrumb-box">
                        <span class="breadcrumb-text"><?php echo e($crumb['title']); ?></span>
                    </a>
                <?php endif; ?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</nav>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Core/Modules/Admin/Resources/views/partials/breadcrumb.blade.php ENDPATH**/ ?>