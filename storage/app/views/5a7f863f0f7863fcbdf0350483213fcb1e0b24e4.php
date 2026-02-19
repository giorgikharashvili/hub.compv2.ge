<?php if(breadcrumb()->all()): ?>
    <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb navigation" hx-boost="true" hx-target="#main" hx-swap="outerHTML transition:true">
            <ul class="breadcrumb-links" itemscope itemtype="https://schema.org/BreadcrumbList">
                <?php $__currentLoopData = breadcrumb()->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $crumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <?php if($index > 0): ?>
                            <div class="breadcrumb-box">
                                <svg class="breadcrumb-icon" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                        clip-rule="evenodd" />
                                </svg>

                                <?php if($crumb['url']): ?>
                                    <a href="<?php echo e($crumb['url']); ?>" class="breadcrumb-text" itemprop="item">
                                        <span itemprop="name"><?php echo e($crumb['title']); ?></span>
                                    </a>
                                <?php else: ?>
                                    <span class="breadcrumb-text" itemprop="name"><?php echo e($crumb['title']); ?></span>
                                <?php endif; ?>
                                <meta itemprop="position" content="<?php echo e($index + 1); ?>" />
                            </div>
                        <?php else: ?>
                            <a href="<?php echo e($crumb['url'] ? $crumb['url'] : '#'); ?>" class="breadcrumb-box" itemprop="item">
                                <span itemprop="name" class="breadcrumb-text"><?php echo e($crumb['title']); ?></span>
                                <meta itemprop="position" content="<?php echo e($index + 1); ?>" />
                            </a>
                        <?php endif; ?>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </nav>
    </div>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/partials/breadcrumb.blade.php ENDPATH**/ ?>