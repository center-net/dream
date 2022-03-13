<?php if(!empty($image)): ?>
<?php
$random = Str::random(5);
?>
<div style="margin-top: 5px;display: inline-block;">
<a href="#" data-toggle="modal" data-target="#img_<?php echo e($random); ?>">

  <img src="<?php echo e(it()->url($image)); ?>" style="width: 48px;height: 48px;object-fit: cover;border-radius: 50%;" class="img-thumbnail rounded-circle" alt="Cinque Terre">
</a>
</div>
<div id="img_<?php echo e($random); ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="">
        <button type="button" class="btn btn-default btn-sm float-left" data-dismiss="modal">x</button>
      </div>
      <div class="modal-body">
        <center>
          <img src="<?php echo e(it()->url($image)); ?>" style="width:100%;height:100%;" />
        </center>
      </div>
    </div>
  </div>
</div>
<?php endif; ?><?php /**PATH /home/helplgvr/public_html/dream/resources/views/admin/show_image.blade.php ENDPATH**/ ?>