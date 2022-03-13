<?php $__env->startPush('js'); ?>
<script type="text/javascript">
$(document).ready(function(){
<?php if($typeForm == 'create'): ?>
   var selectID = '<?php echo e($selectID); ?>';
   $(document).on('change','#'+selectID,function(){
    var selectIDValue = $('#'+selectID+' option:selected').val();
    if(selectIDValue > 0){
    $.ajax({
       url:'<?php echo e($url); ?>',
       dataType:'html',
       type:'post',
       data:{_token:'<?php echo e(csrf_token()); ?>','<?php echo e($selectID); ?>':selectIDValue},
       beforeSend: function(){
        $('.<?php echo e($outputClass); ?>').html('<center><i class="fa fa-spinner fa-spin"></i></center>');
       },success: function(data){
        $('.<?php echo e($outputClass); ?>').html(data);
        $('#<?php echo e($outputClass); ?>').select2();
       }
    });
    }else{
        $('.<?php echo e($outputClass); ?>').html('<select class="form-control" id="<?php echo e($outputClass); ?>"></select>');
        $('#<?php echo e($outputClass); ?>').select2();
    }
    });

    $('.<?php echo e($outputClass); ?>').html('<select class="form-control" id="<?php echo e($outputClass); ?>"></select>');
    $('#<?php echo e($outputClass); ?>').select2();

    <?php if(old($outputClass)): ?>
    var selectIDValue = $('#'+selectID+' option:selected').val();
    $.ajax({
       url:'<?php echo e($url); ?>',
       dataType:'html',
       type:'post',
       data:{_token:'<?php echo e(csrf_token()); ?>','<?php echo e($selectID); ?>':selectIDValue,select:'<?php echo e(old($outputClass)); ?>'},
       beforeSend: function(){
        $('.<?php echo e($outputClass); ?>').html('<center><i class="fa fa-spinner fa-spin"></i></center>');
       },success: function(data){
        $('.<?php echo e($outputClass); ?>').html(data);
        $('#<?php echo e($outputClass); ?>').select2();
       }
    });
   <?php endif; ?>
 <?php elseif($typeForm == 'edit'): ?>
   var selectID = '<?php echo e($selectID); ?>';
   $(document).on('change','#'+selectID,function(){
    var selectIDValue = $('#'+selectID+' option:selected').val();
    if(selectIDValue > 0){
    $.ajax({
       url:'<?php echo e($url); ?>',
       dataType:'html',
       type:'post',
       data:{_token:'<?php echo e(csrf_token()); ?>','<?php echo e($selectID); ?>':selectIDValue},
       beforeSend: function(){
        $('.<?php echo e($outputClass); ?>').html('<center><i class="fa fa-spinner fa-spin"></i></center>');
       },success: function(data){
        $('.<?php echo e($outputClass); ?>').html(data);
        $('#<?php echo e($outputClass); ?>').select2();
       }
    });
    }else{
        $('.<?php echo e($outputClass); ?>').html('<select class="form-control" id="<?php echo e($outputClass); ?>"></select>');
        $('#<?php echo e($outputClass); ?>').select2();
    }
    });

    $('.<?php echo e($outputClass); ?>').html('<select class="form-control select2" id="<?php echo e($outputClass); ?>"></select>');
    $('#<?php echo e($outputClass); ?>').select2();


    <?php if($selectedvalue > 0): ?>
    var selectIDValue = $('#'+selectID+' option:selected').val();
    $.ajax({
       url:'<?php echo e($url); ?>',
       dataType:'html',
       type:'post',
       data:{
        _token:'<?php echo e(csrf_token()); ?>',
        '<?php echo e($selectID); ?>': '<?php echo e($parentValue); ?>',
        select:'<?php echo e($selectedvalue); ?>'
       },
       beforeSend: function(){
        $('.<?php echo e($outputClass); ?>').html('<center><i class="fa fa-spinner fa-spin"></i></center>');
       },success: function(data){
        $('.<?php echo e($outputClass); ?>').html(data);
        $('#<?php echo e($outputClass); ?>').select2();
       }
    });
   <?php endif; ?>
 <?php endif; ?>
});
</script>
<?php $__env->stopPush(); ?>

<?php /**PATH /home/helplgvr/public_html/dream/resources/views/admin/ajax.blade.php ENDPATH**/ ?>