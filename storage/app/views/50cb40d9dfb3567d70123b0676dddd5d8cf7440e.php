<div class="chart-wrapper skeleton"
    style="min-height: <?php echo e(is_int($height) ? $height . 'px' : $height); ?>; min-width: <?php echo e(is_int($width) ? $width . 'px' : $width); ?>">
    <div id="<?php echo $id; ?>" data-chart-options="<?php echo base64_encode(json_encode($chart->getChartOptions())); ?>"
        style="min-height: <?php echo e(is_int($height) ? $height . 'px' : $height); ?>; min-width: <?php echo e(is_int($width) ? $width . 'px' : $width); ?>">
    </div>
</div>
<?php /**PATH /home/compvge/public_html/app/Core/Charts/Views/container.blade.php ENDPATH**/ ?>