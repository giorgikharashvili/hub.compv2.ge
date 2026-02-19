<?php if(empty($html)): ?>
    <?php echo __('widgets.editor_empty'); ?>
<?php else: ?>
    <?php if($inCard): ?>
        <div class="content-editor card md-content">
            <div class="card-body" hx-boost="true" hx-target="#main" hx-swap="outerHTML transition:true">
                <?php echo $html; ?>

            </div>
        </div>
    <?php else: ?>
        <div class="content-editor widget-editor md-content" hx-boost="true" hx-target="#main" hx-swap="outerHTML transition:true">
            <?php echo $html; ?>

        </div>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/widgets/editor.blade.php ENDPATH**/ ?>