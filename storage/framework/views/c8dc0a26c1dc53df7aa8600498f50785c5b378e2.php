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
				<a href="<?php echo e(aurl('purchases')); ?>"  style="color:#343a40"  class="dropdown-item">
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
								
<?php echo Form::open(['url'=>aurl('/purchases'),'id'=>'purchases','files'=>true,'class'=>'form-horizontal form-row-seperated']); ?>

<div class="row">

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('item',trans('admin.item'),['class'=>' control-label']); ?>

            <?php echo Form::text('item',old('item'),['class'=>'form-control','placeholder'=>trans('admin.item')]); ?>

    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('quantity',trans('admin.quantity'),['class'=>' control-label']); ?>

            <?php echo Form::text('quantity',old('quantity'),['class'=>'form-control','placeholder'=>trans('admin.quantity')]); ?>

    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('price',trans('admin.price'),['class'=>' control-label']); ?>

            <?php echo Form::text('price',old('price'),['class'=>'form-control','placeholder'=>'السعر بالشيكل']); ?>

    </div>
</div>
</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer"><button type="submit" name="add" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> <?php echo e(trans('admin.add')); ?></button>

<?php echo Form::close(); ?>	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/helplgvr/public_html/dream/resources/views/admin/purchases/create.blade.php ENDPATH**/ ?>