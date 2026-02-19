<td class="text-<?php echo e($align); ?> <?php if(!$width): ?> text-truncate <?php endif; ?> <?php echo e($class); ?>"
    data-column="<?php echo e($data_column ?? $slug); ?>" 
    colspan="<?php echo e($colspan); ?>" 
    <?php if(isset($aria_hidden)): ?> aria-hidden="<?php echo e($aria_hidden); ?>" <?php endif; ?>
    style="<?php echo \Illuminate\Support\Arr::toCssStyles([
        "min-width:$width;" => $width,
        "$style" => $style,
    ]) ?>">
    <div>
        <?php if(isset($render)): ?>
            <?php echo $value; ?>

        <?php else: ?>
            <?php echo e($value); ?>

        <?php endif; ?>
    </div>
</td>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Core/Modules/Admin/Resources/views/partials/layouts/td.blade.php ENDPATH**/ ?>