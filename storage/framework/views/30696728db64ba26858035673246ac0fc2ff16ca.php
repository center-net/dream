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
				<a href="<?php echo e(aurl('admins')); ?>" class="dropdown-item" style="color:#343a40">
				<i class="fas fa-list"></i> <?php echo e(trans('admin.show_all')); ?></a>
				<a class="dropdown-item" href="<?php echo e(aurl('admins/'.$admins->id)); ?>" style="color:#343a40">
					<i class="fa fa-eye"></i> <?php echo e(trans('admin.show')); ?>

				</a>
				<a class="dropdown-item" href="<?php echo e(aurl('admins/create')); ?>" style="color:#343a40">
					<i class="fa fa-plus"></i> <?php echo e(trans('admin.create')); ?>

				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord<?php echo e($admins->id); ?>" class="dropdown-item" href="#" style="color:#343a40">
					<i class="fa fa-trash"></i> <?php echo e(trans('admin.delete')); ?>

				</a>
			</div>
		</div>
		</h3>
		<?php $__env->startPush('js'); ?>
		<div class="modal fade" id="deleteRecord<?php echo e($admins->id); ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"><?php echo e(trans('admin.delete')); ?></h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   <?php echo e(trans('admin.ask_del')); ?> <?php echo e(trans('admin.id')); ?> (<?php echo e($admins->id); ?>)
					</div>
					<div class="modal-footer">
						<?php echo Form::open([
						'method' => 'DELETE',
						'route' => ['admins.destroy', $admins->id]
						]); ?>

						<?php echo Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']); ?>

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
			<?php echo Form::open(['url'=>aurl('/admins/'.$admins->id),'method'=>'put','id'=>'admins','files'=>true,'class'=>'form-horizontal form-row-seperated']); ?>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<?php echo Form::label('first_name',trans('admin.first_name'),['class'=>'control-label']); ?>

					<?php echo Form::text('first_name', $admins->first_name ,['class'=>'form-control','placeholder'=>trans('admin.first_name')]); ?>

				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<?php echo Form::label('last_name',trans('admin.last_name'),['class'=>'control-label']); ?>

					<?php echo Form::text('last_name', $admins->last_name ,['class'=>'form-control','placeholder'=>trans('admin.last_name')]); ?>

				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<?php echo Form::label('mobile',trans('admin.mobile'),['class'=>'control-label']); ?>

					<?php echo Form::text('mobile', $admins->mobile ,['class'=>'form-control','placeholder'=>trans('admin.mobile')]); ?>

				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<?php echo Form::label('username',trans('admin.username'),['class'=>'control-label']); ?>

					<?php echo Form::text('username', $admins->username ,['class'=>'form-control','placeholder'=>trans('admin.username'),'readonly']); ?>

				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<?php echo Form::label('password',trans('admin.password'),['class'=>'control-label']); ?>

					<?php echo Form::password('password',['class'=>'form-control','placeholder'=>trans('admin.password')]); ?>

				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label for="photo_profile"><?php echo e(trans('admin.photo_profile')); ?></label>
							<div class="input-group">
								<div class="custom-file">
									<?php echo Form::file('photo_profile',['class'=>'custom-file-input','placeholder'=>trans('admin.photo_profile')]); ?>

									<?php echo Form::label('photo_profile',trans('admin.photo_profile'),['class'=>'custom-file-label']); ?>

								</div>
								<div class="input-group-append">
									<span class="input-group-text" id=""><?php echo e(trans('admin.upload')); ?></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<br />
						<?php echo $__env->make("admin.show_image",["image"=>$admins->photo_profile], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<?php echo Form::label('email',trans('admin.email'),['class'=>'control-label']); ?>

					<?php echo Form::email('email', $admins->email ,['class'=>'form-control','placeholder'=>trans('admin.email')]); ?>

				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<?php echo Form::label('group_id',trans('admin.group_id'),['class'=>'control-label']); ?>

					<?php echo Form::select('group_id',App\Models\AdminGroup::pluck('group_name','id'), $admins->group_id ,['class'=>'form-control select2','placeholder'=>trans('admin.group_id')]); ?>

				</div>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
		<?php echo Form::submit(trans('admin.save'),['class'=>'btn btn-success btn-flat']); ?>

		<?php echo Form::close(); ?>

	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/helplgvr/public_html/dream/resources/views/admin/admins/edit.blade.php ENDPATH**/ ?>