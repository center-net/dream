<?php $__env->startSection('content'); ?>


<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<span>
			<?php echo e(!empty($title)?$title:''); ?>

			</span>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
			<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="<?php echo e(aurl('subcategories')); ?>"  style="color:#343a40"  class="dropdown-item">
				<i class="fas fa-list"></i> <?php echo e(trans('admin.show_all')); ?></a>
			</div>
		</div>
		</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
								
<?php echo Form::open(['url'=>aurl('/subcategories'),'id'=>'subcategories','files'=>true,'class'=>'form-horizontal form-row-seperated']); ?>

<div class="row">

<div class="col-md-4 col-lg-4 col-sm-4 col-xs-6">
    <div class="form-group">
        <?php echo Form::label('category_name',trans('admin.category_name'),['class'=>' control-label']); ?>

            <?php echo Form::text('category_name',old('category_name'),['class'=>'form-control','placeholder'=>trans('admin.category_name')]); ?>

    </div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-6">
	<div class="form-group">
		<?php echo Form::label('category_id',trans('admin.category_id')); ?>

		<?php echo Form::select('category_id',App\Models\Category::pluck('category_name','id'),old('category_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]); ?>

	</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-6">
	<div class="form-group">
		<?php echo Form::label('status',trans('admin.status')); ?>

		<?php echo Form::select('status',['yes'=>trans('admin.yes'),'no'=>trans('admin.no'),],old('status'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]); ?>

	</div>
</div>

</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer"><button type="submit" name="add" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> <?php echo e(trans('admin.add')); ?></button>
<button type="submit" name="add_back" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> <?php echo e(trans('admin.add_back')); ?></button>
<?php echo Form::close(); ?>	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\dream\resources\views/admin/subcategories/create.blade.php ENDPATH**/ ?>