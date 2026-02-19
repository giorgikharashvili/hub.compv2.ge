<?php
    $colors = app('flute.view.manager')->getColors();
?>

<?php if(!empty($colors)): ?>
    <style>
        <?php if(isset($colors['dark'])): ?>
            :root[data-theme="dark"] {
                <?php $__currentLoopData = $colors['dark']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($key); ?>: <?php echo e($value); ?>;
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }
            
            <?php if(isset($colors['dark']['--background-type'])): ?>
                <?php
                    $bgType = $colors['dark']['--background-type'] ?? 'solid';
                    $bgColor = $colors['dark']['--background'] ?? '#1c1c1e';
                    $grad1 = $colors['dark']['--bg-grad1'] ?? ($colors['dark']['--accent'] ?? '#A5FF75');
                    $grad2 = $colors['dark']['--bg-grad2'] ?? ($colors['dark']['--primary'] ?? '#f2f2f7');
                    $grad3 = $colors['dark']['--bg-grad3'] ?? $bgColor;
                ?>

                html[data-theme="dark"] body {
                    <?php if($bgType === 'linear-gradient'): ?>
                        background: 
                            linear-gradient(135deg, <?php echo e($bgColor); ?> 0%, <?php echo e($bgColor); ?> 45%, <?php echo e($grad1); ?>18 100%),
                            radial-gradient(1200px circle at 90% -10%, <?php echo e($grad1); ?>0f 0%, transparent 60%),
                            radial-gradient(800px circle at 10% 110%, <?php echo e($grad2); ?>0c 0%, transparent 60%),
                            <?php echo e($bgColor); ?>;
                    <?php elseif($bgType === 'radial-gradient'): ?>
                        background: 
                            radial-gradient(1000px circle at 30% 10%, <?php echo e($grad1); ?>14 0%, transparent 55%),
                            radial-gradient(1200px circle at 82% 78%, <?php echo e($grad2); ?>0f 0%, transparent 60%),
                            <?php echo e($bgColor); ?>;
                    <?php elseif($bgType === 'mesh-gradient'): ?>
                        background: 
                            radial-gradient(at 20% 20%, <?php echo e($grad1); ?>12 0px, transparent 45%),
                            radial-gradient(at 80% 75%, <?php echo e($grad2); ?>0d 0px, transparent 45%),
                            radial-gradient(at 40% 70%, <?php echo e($grad1); ?>0a 0px, transparent 40%),
                            radial-gradient(at 70% 30%, <?php echo e($grad2); ?>08 0px, transparent 45%),
                            <?php echo e($bgColor); ?>;
                    <?php elseif($bgType === 'subtle-gradient'): ?>
                        background: linear-gradient(160deg, <?php echo e($bgColor); ?> 0%, <?php echo e($grad1); ?>0d 50%, <?php echo e($grad2); ?>0a 100%);
                    <?php elseif($bgType === 'aurora-gradient'): ?>
                        background: 
                            radial-gradient(1200px circle at 10% 20%, <?php echo e($grad1); ?>12 0%, transparent 55%),
                            radial-gradient(1000px circle at 80% 30%, <?php echo e($grad2); ?>10 0%, transparent 55%),
                            radial-gradient(1400px circle at 50% 80%, <?php echo e($grad3); ?>0d 0%, transparent 60%),
                            <?php echo e($bgColor); ?>;
                    <?php elseif($bgType === 'sunset-gradient'): ?>
                        background: linear-gradient(180deg, 
                            <?php echo e($grad1); ?>18 0%, 
                            <?php echo e($grad1); ?>10 28%, 
                            <?php echo e($grad2); ?>0d 68%, 
                            <?php echo e($bgColor); ?> 100%);
                    <?php elseif($bgType === 'ocean-gradient'): ?>
                        background: 
                            radial-gradient(900px ellipse at top, <?php echo e($grad1); ?>10 0%, transparent 50%),
                            radial-gradient(700px ellipse at bottom, <?php echo e($grad2); ?>0d 0%, transparent 50%),
                            linear-gradient(180deg, <?php echo e($bgColor); ?> 0%, <?php echo e($grad3); ?>06 100%);
                    <?php elseif($bgType === 'spotlight-gradient'): ?>
                        background: radial-gradient(800px circle at 70% 30%, 
                            <?php echo e($grad1); ?>20 0%, 
                            <?php echo e($grad1); ?>0d 28%, 
                            <?php echo e($bgColor); ?> 70%);
                    <?php else: ?>
                        background-color: <?php echo e($bgColor); ?>;
                    <?php endif; ?>
                }
            <?php endif; ?>
        <?php endif; ?>

        <?php if(isset($colors['light'])): ?>
            :root[data-theme="light"] {
                <?php $__currentLoopData = $colors['light']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($key); ?>: <?php echo e($value); ?>;
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }
            
            <?php if(isset($colors['light']['--background-type'])): ?>
                <?php
                    $bgType = $colors['light']['--background-type'] ?? 'solid';
                    $bgColor = $colors['light']['--background'] ?? '#ffffff';
                    $grad1 = $colors['light']['--bg-grad1'] ?? ($colors['light']['--accent'] ?? '#34c759');
                    $grad2 = $colors['light']['--bg-grad2'] ?? ($colors['light']['--primary'] ?? '#1d1d1f');
                    $grad3 = $colors['light']['--bg-grad3'] ?? $bgColor;
                ?>
                
                html[data-theme="light"] body {
                    <?php if($bgType === 'linear-gradient'): ?>
                        background: 
                            linear-gradient(135deg, <?php echo e($bgColor); ?> 0%, <?php echo e($bgColor); ?> 45%, <?php echo e($grad1); ?>0f 100%),
                            radial-gradient(1000px circle at 92% -8%, <?php echo e($grad1); ?>0a 0%, transparent 58%),
                            radial-gradient(700px circle at 8% 106%, <?php echo e($grad2); ?>08 0%, transparent 58%),
                            <?php echo e($bgColor); ?>;
                    <?php elseif($bgType === 'radial-gradient'): ?>
                        background: 
                            radial-gradient(900px circle at 28% 12%, <?php echo e($grad1); ?>0d 0%, transparent 55%),
                            radial-gradient(1100px circle at 82% 78%, <?php echo e($grad2); ?>08 0%, transparent 60%),
                            <?php echo e($bgColor); ?>;
                    <?php elseif($bgType === 'mesh-gradient'): ?>
                        background: 
                            radial-gradient(at 20% 20%, <?php echo e($grad1); ?>0a 0px, transparent 45%),
                            radial-gradient(at 80% 75%, <?php echo e($grad2); ?>08 0px, transparent 45%),
                            radial-gradient(at 40% 70%, <?php echo e($grad3); ?>06 0px, transparent 40%),
                            radial-gradient(at 70% 30%, <?php echo e($grad2); ?>05 0px, transparent 45%),
                            <?php echo e($bgColor); ?>;
                    <?php elseif($bgType === 'subtle-gradient'): ?>
                        background: linear-gradient(160deg, <?php echo e($bgColor); ?> 0%, <?php echo e($grad1); ?>08 50%, <?php echo e($grad2); ?>06 100%);
                    <?php elseif($bgType === 'aurora-gradient'): ?>
                        background: 
                            radial-gradient(1100px circle at 12% 22%, <?php echo e($grad1); ?>0a 0%, transparent 55%),
                            radial-gradient(900px circle at 82% 30%, <?php echo e($grad2); ?>08 0%, transparent 55%),
                            radial-gradient(1200px circle at 50% 80%, <?php echo e($grad3); ?>06 0%, transparent 60%),
                            <?php echo e($bgColor); ?>;
                    <?php elseif($bgType === 'sunset-gradient'): ?>
                        background: linear-gradient(180deg, 
                            <?php echo e($grad1); ?>12 0%, 
                            <?php echo e($grad1); ?>0c 30%, 
                            <?php echo e($grad2); ?>08 70%, 
                            <?php echo e($bgColor); ?> 100%);
                    <?php elseif($bgType === 'ocean-gradient'): ?>
                        background: 
                            radial-gradient(800px ellipse at top, <?php echo e($grad1); ?>0c 0%, transparent 50%),
                            radial-gradient(650px ellipse at bottom, <?php echo e($grad2); ?>08 0%, transparent 50%),
                            linear-gradient(180deg, <?php echo e($bgColor); ?> 0%, <?php echo e($grad3); ?>05 100%);
                    <?php elseif($bgType === 'spotlight-gradient'): ?>
                        background: radial-gradient(700px circle at 70% 30%, 
                            <?php echo e($grad1); ?>12 0%, 
                            <?php echo e($grad1); ?>08 30%, 
                            <?php echo e($bgColor); ?> 70%);
                    <?php else: ?>
                        background-color: <?php echo e($bgColor); ?>;
                    <?php endif; ?>
                }
            <?php endif; ?>
        <?php endif; ?>
    </style>
<?php endif; ?>

<?php
    $containerWidth = null;
    if (!empty($colors['dark']['--container-width'])) {
        $containerWidth = $colors['dark']['--container-width'];
    } elseif (!empty($colors['light']['--container-width'])) {
        $containerWidth = $colors['light']['--container-width'];
    }
?>

<?php if($containerWidth === 'fullwidth'): ?>
    <style>
        .container:not(.keep-container) {
            max-width: none !important;
            width: 100% !important;
            padding-left: 1rem !important;
            padding-right: 1rem !important;
        }
    </style>
    <script>
        document.documentElement.setAttribute('data-container-width', 'fullwidth');
        if (typeof window !== 'undefined') {
            window.addEventListener('DOMContentLoaded', function() {
                const toggle = document.getElementById('container-width-checkbox');
                if (toggle) {
                    toggle.checked = true;
                    localStorage.setItem('container-width-mode', 'fullwidth');
                }
            });
        }
    </script>
<?php else: ?>
    <script>
        document.documentElement.setAttribute('data-container-width', 'container');
        if (typeof window !== 'undefined') {
            window.addEventListener('DOMContentLoaded', function() {
                const toggle = document.getElementById('container-width-checkbox');
                if (toggle) {
                    toggle.checked = false;
                    localStorage.setItem('container-width-mode', 'container');
                }
            });
        }
    </script>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/partials/colors.blade.php ENDPATH**/ ?>