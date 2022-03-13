<?php $__env->startSection('content'); ?>
<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<a><?php echo e(!empty($title)?$title:''); ?></a>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
				<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="<?php echo e(aurl('purchases')); ?>" class="dropdown-item"  style="color:#343a40">
				<i class="fas fa-list"></i> <?php echo e(trans('admin.show_all')); ?></a>
				<a class="dropdown-item"  style="color:#343a40" href="<?php echo e(aurl('purchases/'.$purchases->id.'/edit')); ?>">
					<i class="fas fa-edit"></i> <?php echo e(trans('admin.edit')); ?>

				</a>
				<a class="dropdown-item"  style="color:#343a40" href="<?php echo e(aurl('purchases/create')); ?>">
					<i class="fas fa-plus"></i> <?php echo e(trans('admin.create')); ?>

				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord<?php echo e($purchases->id); ?>" class="dropdown-item"  style="color:#343a40" href="#">
					<i class="fas fa-trash"></i> <?php echo e(trans('admin.delete')); ?>

				</a>
			</div>
		</div>
		</h3>
		<?php $__env->startPush('js'); ?>
		<div class="modal fade" id="deleteRecord<?php echo e($purchases->id); ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"><?php echo e(trans('admin.delete')); ?></h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>  <?php echo e(trans('admin.ask_del')); ?> <?php echo e(trans('admin.id')); ?> (<?php echo e($purchases->id); ?>)
					</div>
					<div class="modal-footer">
						<?php echo Form::open([
               'method' => 'DELETE',
               'route' => ['purchases.destroy', $purchases->id]
               ]); ?>

                <?php echo Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger btn-flat']); ?>

						 <a class="btn btn-default" data-dismiss="modal"><?php echo e(trans('admin.cancel')); ?></a>
                <?php echo Form::close(); ?>

					</div>
				</div>
			</div>
		</div>
		<?php $__env->stopPush(); ?>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-xs-12">
				<b><?php echo e(trans('admin.id')); ?> :</b> <?php echo e($purchases->id); ?>

			</div>
			<div class="clearfix"></div>
			<hr />
			<?php if(!empty($purchases->admin_id()->first())): ?>
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
				<b><?php echo e(trans('admin.admin_id')); ?> :</b>
				<?php echo e($purchases->admin_id()->first()->name); ?>

			</div>
			<?php endif; ?>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b><?php echo e(trans('admin.item')); ?> :</b>
				<?php echo $purchases->item; ?>

			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b><?php echo e(trans('admin.quantity')); ?> :</b>
				<?php echo $purchases->quantity; ?>

			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b><?php echo e(trans('admin.status')); ?> :</b>
				<?php echo e(trans("admin.".$purchases->status)); ?>

			</div>
			<!-- /.row -->
		</div>
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/helplgvr/public_html/dream/resources/views/admin/purchases/show.blade.php ENDPATH**/ ?>