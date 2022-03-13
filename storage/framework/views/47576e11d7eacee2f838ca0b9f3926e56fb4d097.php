<?php $__env->startSection('content'); ?>
<div class="error-page">
    <h2 class="headline text-info">403</h2>
    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-info"></i> <?php echo e(trans('admin.error_permission_1')); ?></h3>
        <p>
          <?php echo e(trans('admin.error_permission_2')); ?>

        </p>
         <p> <?php echo e(trans('admin.error_permission_4')); ?>

                <br/>
                <a href="<?php echo e(aurl('/')); ?>"> <?php echo e(trans('admin.error_permission_5')); ?> </a>
            <?php echo e(trans('admin.error_permission_6')); ?> </p>

    </div>
</div>
<!-- /.error-page -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/helplgvr/public_html/dream/resources/views/admin/no_permission.blade.php ENDPATH**/ ?>