<?php if(count(config('lang.available')) > 1): ?>
    <li hx-boost="false">
        <div class="navbar__lang" data-dropdown-open="langs" data-tooltip="<?php echo e(__('def.language')); ?>" aria-label="<?php echo e(__('def.language')); ?>" role="button" aria-haspopup="true" aria-expanded="false">
            <span>
                <img src="<?php echo e(asset('assets/img/langs/' . app()->getLang() . '.svg')); ?>" alt="<?php echo e(__('langs.' . app()->getLang())); ?>"
                    loading="lazy" width="20" height="20">
            </span>
        </div>
        <div class="navbar__langs" data-dropdown="langs" aria-label="<?php echo e(__('def.language_select')); ?>" role="menu">
            <?php $__currentLoopData = config('lang.available'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(url()->addParams(['lang' => $lang])); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => $lang === app()->getLang()]) ?>" 
                   hreflang="<?php echo e($lang); ?>" lang="<?php echo e($lang); ?>" role="menuitem" aria-current="<?php echo e($lang === app()->getLang() ? 'page' : 'false'); ?>">
                    <span>
                        <img src="<?php echo e(asset('assets/img/langs/' . $lang . '.svg')); ?>" alt="<?php echo e(__('langs.' . $lang)); ?>"
                            loading="lazy" width="20" height="20">
                    </span>
                    <small><?php echo e(__('langs.' . $lang)); ?></small>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </li>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/app/Themes/standard/views/components/header/language-selector.blade.php ENDPATH**/ ?>