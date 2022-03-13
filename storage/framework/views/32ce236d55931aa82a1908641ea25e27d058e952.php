<?php $__env->startSection('content'); ?>
<?php $__env->startPush('js'); ?>
<script type="text/javascript">
$(document).ready(function(){
$(document).on('click','.checkinput',function(){
	var permission_name = $(this).attr('permission_name');
	if($('.'+permission_name+'_validation').prop("checked") &&
	$(this).hasClass(permission_name+'_validation')){
		$('.'+permission_name+'_show').prop('checked',true);
		$('.'+permission_name+'_add').prop('checked',true);
		$('.'+permission_name+'_edit').prop('checked',true);
		$('.'+permission_name+'_delete').prop('checked',true);
	}else if(
		!$('.'+permission_name+'_validation').prop("checked") &&
		$(this).hasClass(permission_name+'_validation')){
		$('.'+permission_name+'_show').prop('checked',false);
		$('.'+permission_name+'_add').prop('checked',false);
		$('.'+permission_name+'_edit').prop('checked',false);
		$('.'+permission_name+'_delete').prop('checked',false);
	}else if(!$(this).hasClass(permission_name+'_show') && !$(this).hasClass(permission_name+'_show') && $(this).prop("checked")){
	$('.'+permission_name+'_show').prop('checked',true);
	}else if(
		!$('.'+permission_name+'_add').prop("checked") &&
		!$('.'+permission_name+'_edit').prop("checked") &&
		!$('.'+permission_name+'_delete').prop("checked") &&
		!$('.'+permission_name+'_validation').prop("checked") &&
		!$(this).hasClass(permission_name+'_show')){
		$('.'+permission_name+'_show').prop('checked',false);
	}
});
});
</script>
<?php $__env->stopPush(); ?>
<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="btn-group">
			<a><?php echo e(!empty($title)?$title:''); ?></a>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
			<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="<?php echo e(aurl('admingroups')); ?>" class="dropdown-item" style="color:#343a40">
				<i class="fas fa-list"></i> <?php echo e(trans('admin.show_all')); ?></a>
				<a class="dropdown-item" style="color:#343a40" href="<?php echo e(aurl('admingroups/'.$admingroups->id)); ?>">
					<i class="fa fa-eye"></i> <?php echo e(trans('admin.show')); ?>

				</a>
				<a class="dropdown-item" style="color:#343a40" href="<?php echo e(aurl('admingroups/create')); ?>">
					<i class="fa fa-plus"></i> <?php echo e(trans('admin.create')); ?>

				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord<?php echo e($admingroups->id); ?>" class="dropdown-item" style="color:#343a40" href="#">
					<i class="fa fa-trash"></i> <?php echo e(trans('admin.delete')); ?>

				</a>
			</div>
		</div>
		</h3>
		<?php $__env->startPush('js'); ?>
		<div class="modal fade" id="deleteRecord<?php echo e($admingroups->id); ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"><?php echo e(trans('admin.delete')); ?></h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   <?php echo e(trans('admin.ask_del')); ?> <?php echo e(trans('admin.id')); ?> (<?php echo e($admingroups->id); ?>)
					</div>
					<div class="modal-footer">
						<?php echo Form::open([
						'method' => 'DELETE',
						'route' => ['admingroups.destroy', $admingroups->id]
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
		</a>
	</div>
</div>
<!-- /.card-header -->
<div class="card-body">
		<?php echo Form::open(['url'=>aurl('/admingroups/'.$admingroups->id),'method'=>'put','id'=>'admingroups','files'=>true,'class'=>'form-horizontal form-row-seperated']); ?>

	<div class="row">
		<div class="form-group col-md-12">
			<?php echo Form::label('group_name',trans('admin.group_name'),['class'=>'control-label']); ?>

			<?php echo Form::text('group_name',$admingroups->group_name,['class'=>'form-control','placeholder'=>trans('admin.group_name')]); ?>

		</div>
		<div class="col-md-12 col-lg-12">
			<table class="table table-striped table-hover  ">
				<thead>
					<tr>
						<th><?php echo e(trans('admin.name')); ?></th>
						<th><?php echo e(trans('admin.show')); ?></th>
						<th><?php echo e(trans('admin.create')); ?></th>
						<th><?php echo e(trans('admin.edit')); ?></th>
						<th><?php echo e(trans('admin.delete')); ?></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo e(trans('admin.settings')); ?></td>
						<td>
							<div class="form-group">
								<div class="custom-control custom-switch">
									<input
									type="checkbox"
									class="custom-control-input checkinput settings_show"
									permission_name="settings"
									name="settings_show"
									<?php echo e(checkPermissionGroup('settings_show',$admingroups)?'checked':''); ?>

									value="yes"
									id="settings_show">
									<label class="custom-control-label" for="settings_show"></label>
								</div>
							</div>
						</td>
						<td>
						</td>
						<td>
							<div class="form-group">
								<div class="custom-control custom-switch">
									<input
									type="checkbox"
									class="custom-control-input checkinput settings_edit"
									permission_name="settings"
									name="settings_edit"
									<?php echo e(checkPermissionGroup('settings_edit',$admingroups)?'checked':''); ?>

									value="yes"
									id="settings_edit">
									<label class="custom-control-label" for="settings_edit"></label>
								</div>
							</div>
						</td>
						<td>
						</td>
					</tr>
					<?php $__currentLoopData = require app_path('Http/AdminRouteList.php'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e(!is_array($value)?trans('admin.'.$value):trans('admin.'.$key)); ?></td>
						<td>
							<?php if(!is_array($value) || is_array($value) && in_array('read',$value)): ?>
							<div class="form-group">
								<div class="custom-control custom-switch">
									<input
									type="checkbox"
									class="custom-control-input checkinput <?php echo e($key); ?>_show"
									permission_name="<?php echo e($key); ?>"
									name="<?php echo e($key); ?>_show"
									<?php echo e(checkPermissionGroup($key.'_show',$admingroups)?'checked':''); ?>

									value="yes"
									id="<?php echo e($key); ?>_show">
									<label class="custom-control-label" for="<?php echo e($key); ?>_show"></label>
								</div>
							</div>
							<?php endif; ?>
						</td>
						<td>
							<?php if(!is_array($value) || is_array($value) && in_array('create',$value)): ?>
							<div class="form-group">
								<div class="custom-control custom-switch">
									<input
									type="checkbox"
									class="custom-control-input checkinput <?php echo e($key); ?>_add"
									permission_name="<?php echo e($key); ?>"
									name="<?php echo e($key); ?>_add"
									<?php echo e(checkPermissionGroup($key.'_add',$admingroups)?'checked':''); ?>

									value="yes"
									id="<?php echo e($key); ?>_add">
									<label class="custom-control-label" for="<?php echo e($key); ?>_add"></label>
								</div>
							</div>
							<?php endif; ?>
						</td>
						<td>
							<?php if(!is_array($value) || is_array($value) && in_array('update',$value)): ?>
							<div class="form-group">
								<div class="custom-control custom-switch">
									<input
									type="checkbox"
									class="custom-control-input checkinput <?php echo e($key); ?>_edit"
									permission_name="<?php echo e($key); ?>"
									name="<?php echo e($key); ?>_edit"
									<?php echo e(checkPermissionGroup($key.'_edit',$admingroups)?'checked':''); ?>

									value="yes"
									id="<?php echo e($key); ?>_edit">
									<label class="custom-control-label" for="<?php echo e($key); ?>_edit"></label>
								</div>
							</div>
							<?php endif; ?>
						</td>
						<td>
							<?php if(!is_array($value) || is_array($value) && in_array('delete',$value)): ?>
							<div class="form-group">
								<div class="custom-control custom-switch">
									<input
									type="checkbox"
									class="custom-control-input checkinput <?php echo e($key); ?>_delete"
									permission_name="<?php echo e($key); ?>"
									name="<?php echo e($key); ?>_delete"
									<?php echo e(checkPermissionGroup($key.'_delete',$admingroups)?'checked':''); ?>

									value="yes"
									id="<?php echo e($key); ?>_delete">
									<label class="custom-control-label" for="<?php echo e($key); ?>_delete"></label>
								</div>
							</div>
							<?php endif; ?>
						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
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
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/helplgvr/public_html/dream/resources/views/admin/admingroups/edit.blade.php ENDPATH**/ ?>