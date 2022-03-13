<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.ajax',[
	'typeForm'=>'create',
	'selectID'=>'region_id',
	'outputClass'=>'street_id',
	'url'=>aurl('subscribers/get/street/id'),
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


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
				<a href="<?php echo e(aurl('subscribers')); ?>"  style="color:#343a40"  class="dropdown-item">
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

<?php echo Form::open(['url'=>aurl('/subscribers'),'id'=>'subscribers','files'=>true,'class'=>'form-horizontal form-row-seperated']); ?>

<div class="row">

<div class="col-md-4 col-lg-4 col-sm-4 col-xs-6">
    <div class="form-group">
        <?php echo Form::label('subscriberName',trans('admin.subscriberName'),['class'=>' control-label']); ?>

            <?php echo Form::text('subscriberName',old('subscriberName'),['class'=>'form-control','placeholder'=>trans('admin.subscriberName')]); ?>

    </div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-6">
    <div class="form-group">
        <?php echo Form::label('mobile',trans('admin.mobile'),['class'=>' control-label']); ?>

            <?php echo Form::text('mobile',old('mobile'),['class'=>'form-control','placeholder'=>trans('admin.mobile')]); ?>

    </div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-6">
    <div class="form-group">
            <?php echo Form::label('type',trans('admin.type'),['class'=>'control-label']); ?>

            <?php echo Form::select('type',['0'=>'منزلي','1'=>'هوت سبوت',], old('type') ,['class'=>'form-control select2','placeholder'=>trans('admin.choose')]); ?>

    </div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-6">
	<div class="form-group">
		<?php echo Form::label('region_id',trans('admin.region_id')); ?>

		<?php echo Form::select('region_id',App\Models\Region::pluck('regionsName','id'),old('region_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]); ?>

	</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-6">
	<div class="form-group">
		<?php echo Form::label('street_id',trans('admin.street_id')); ?>

		<span class="street_id"></span>
	</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-6">
    <div class="form-group">
        <?php echo Form::label('address',trans('admin.address'),['class'=>' control-label']); ?>

            <?php echo Form::text('address',old('address'),['class'=>'form-control','placeholder'=>trans('admin.address')]); ?>

    </div>
</div>
<div class="col-md-8 col-lg-8 col-sm-8 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('note',trans('admin.note'),['class'=>'control-label']); ?>

            <?php echo Form::text('note',old('note'),['class'=>'form-control','placeholder'=>trans('admin.note')]); ?>

    </div>
</div>

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
	<div class="form-group">
		<?php echo Form::label('status1','حالة العطل'); ?>

		<?php echo Form::select('status1',['1'=>'مستعجل','2'=>'مهمة','3'=>'عادية'],old('status1'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]); ?>

	</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
	<div class="form-group">
		<?php echo Form::label('damage_id',trans('admin.damage_id')); ?>

		<?php echo Form::select('damage_id',App\Models\Damage::pluck('damageName','id'),old('damage_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]); ?>

	</div>
</div>
<div class="col-md-10 col-lg-10 col-sm-10 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('note',trans('admin.note'),['class'=>' control-label']); ?>

            <?php echo Form::text('note',old('note'),['class'=>'form-control','placeholder'=>trans('admin.note')]); ?>

    </div>
</div>
</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer"><button type="submit" name="add" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> <?php echo e(trans('admin.add')); ?></button>
<?php echo Form::close(); ?>

</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/helplgvr/public_html/dream/resources/views/admin/subscribers/create.blade.php ENDPATH**/ ?>