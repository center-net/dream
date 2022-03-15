<?php $__env->startSection('content'); ?>


<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<span><?php echo e(!empty($title)?$title:''); ?></span>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
			<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="<?php echo e(aurl('categories')); ?>" class="dropdown-item" style="color:#343a40">
				<i class="fas fa-list"></i> <?php echo e(trans('admin.show_all')); ?> </a>
				<a href="<?php echo e(aurl('categories/'.$categories->id)); ?>" class="dropdown-item" style="color:#343a40">
				<i class="fa fa-eye"></i> <?php echo e(trans('admin.show')); ?> </a>
				<a class="dropdown-item" style="color:#343a40" href="<?php echo e(aurl('categories/create')); ?>">
					<i class="fa fa-plus"></i> <?php echo e(trans('admin.create')); ?>

				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord<?php echo e($categories->id); ?>" class="dropdown-item" style="color:#343a40" href="#">
					<i class="fa fa-trash"></i> <?php echo e(trans('admin.delete')); ?>

				</a>
			</div>
		</div>
		</h3>
		<?php $__env->startPush('js'); ?>
		<div class="modal fade" id="deleteRecord<?php echo e($categories->id); ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"><?php echo e(trans('admin.delete')); ?></h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   <?php echo e(trans('admin.ask_del')); ?> <?php echo e(trans('admin.id')); ?>  (<?php echo e($categories->id); ?>)
					</div>
					<div class="modal-footer">
						<?php echo Form::open([
						'method' => 'DELETE',
						'route' => ['categories.destroy', $categories->id]
						]); ?>

						<?php echo Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger btn-flat']); ?>

						<a class="btn btn-default btn-flat" data-dismiss="modal"><?php echo e(trans('admin.cancel')); ?></a>
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
										
<?php echo Form::open(['url'=>aurl('/categories/'.$categories->id),'method'=>'put','id'=>'categories','files'=>true,'class'=>'form-horizontal form-row-seperated']); ?>

<div class="row">

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
    <div class="form-group">
        <?php echo Form::label('category_name',trans('admin.category_name'),['class'=>'control-label']); ?>

        <?php echo Form::text('category_name', $categories->category_name ,['class'=>'form-control','placeholder'=>trans('admin.category_name')]); ?>

    </div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-6">
		<div class="form-group">
				<?php echo Form::label('status',trans('admin.status'),['class'=>'control-label']); ?>

<?php echo Form::select('status',['yes'=>trans('admin.yes'),'no'=>trans('admin.no'),], $categories->status ,['class'=>'form-control select2','placeholder'=>trans('admin.status')]); ?>

		</div>
</div>

</div>
		<!-- /.row -->
		</div>
	<!-- /.card-body -->
	<div class="card-footer"><button type="submit" name="save" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> <?php echo e(trans('admin.save')); ?></button>
<button type="submit" name="save_back" class="btn btn-success btn-flat"><i class="fa fa-save"></i> <?php echo e(trans('admin.save_back')); ?></button>
<?php echo Form::close(); ?>

</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/helplgvr/public_html/dream/resources/views/admin/categories/edit.blade.php ENDPATH**/ ?>