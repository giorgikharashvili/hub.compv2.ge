<?php if(!empty(page()->getBlocks())): ?>
    <section class="container mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="page-widgets" id="page-widgets">
                    <?php echo page()->renderAllWidgets(); ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/partials/widgets.blade.php ENDPATH**/ ?>