<?php if (Session::get_flash('success')): ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p>
        <?php echo implode('</p><p>', (array) Session::get_flash('success')); ?>
        </p>
    </div>
<?php endif; ?>

<?php if (Session::get_flash('error')): ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p>
        <?php echo implode('</p><p>', (array) Session::get_flash('error')); ?>
        </p>
    </div>
<?php endif; ?>