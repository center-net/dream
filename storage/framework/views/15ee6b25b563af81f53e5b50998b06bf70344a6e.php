<div class="input_fields_wrap2">
	<?php if(!empty($module_data) && count($module_data->relations) > 0): ?>
	<?php
	$x = 0;
	?>
	<?php $__currentLoopData = $module_data->relations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="col-md-12 well">
		<div class="col-md-4">
			<div class="form-group">
				<label for="schema_name"><?php echo e(it_trans('it.schema_name')); ?></label>
				<div>
					<input type="text" name="schema_name[]"  value="<?php echo e($relation->schema_name); ?>" class="form-control schema_name" number="<?php echo e($x); ?>"  placeholder="<?php echo e(it_trans('it.schema_name')); ?>" >
					<!--label> Null: <input type="checkbox" name="schema_null[]" value="1"></label-->
					<br><b>output relation like <br> <code>public function  <span class="funcname<?php echo e($x); ?>"><?php echo e($relation->schema_name); ?></span>(){<br>return $this-><span class="typedata_relation<?php echo e($x); ?>"><?php echo e($relation->relation_type); ?></span>(<span class="classSpace<?php echo e($x); ?>">\<?php echo e($relation->linkatmodel); ?></span>,"id","<span class="forginkey<?php echo e($x); ?>"><?php echo e($relation->schema_name); ?></span>"); <br>}</code> </b>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="linkatmodel"><?php echo e(it_trans('it.linkatmodel')); ?></label>
				<div>
					<select name="linkatmodel[]" class="form-control linkatmodel" linkmod="<?php echo e($x); ?>">
						<option disabled selected>Select Model</option>
						<optgroup label="App">
							<?php $__currentLoopData = array_filter(glob(app_path().'/*'), 'is_file'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app_model_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php
$app_model_file = explode('app', $app_model_file);
$app_model_file = str_replace('.php', '::class', $app_model_file[1]);
$app_model_file = str_replace('/', '\\\\', $app_model_file);
$app_model_file = str_replace('\\\\', '\\', $app_model_file);
?>
							<option value="App<?php echo e($app_model_file); ?>"
								<?php echo e($relation->linkatmodel == 'App'.$app_model_file?'selected':''); ?>

							>App<?php echo e($app_model_file); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</optgroup>
						<?php $__currentLoopData = array_filter(glob(app_path().'/*'), 'is_dir'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php
$data_ = explode('/', $model_list);
$explode_last = $data_[count($data_) - 1];
?>
						<?php if(!in_array($explode_last,['Console','Http','Handlers','DataTables','Exceptions','Mail','Providers'])): ?>
						<optgroup label="<?php echo e($explode_last); ?>">
							<?php $__currentLoopData = array_filter(glob($model_list.'/*'), 'is_file'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app_model_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php
$app_model_file = explode('app', $app_model_file);
$app_model_file = str_replace('.php', '::class', $app_model_file[1]);
$app_model_file = str_replace('/', '\\', $app_model_file);
$app_model_file = str_replace('\\\\', '\\', $app_model_file);
?>
							<option value="App<?php echo e($app_model_file); ?>"
								<?php echo e($relation->linkatmodel == 'App'.$app_model_file?'selected':''); ?>

							>App<?php echo e($app_model_file); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</optgroup>
						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
					<br><small>Example: Namespace/ExtraPath/ModelName</small>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="relation_type" ><?php echo e(it_trans('it.relation_type')); ?></label>
				<div>
					<select name="relation_type[]" class="form-control relation_type" linkmods="<?php echo e($x); ?>">
						<option <?php echo e($relation->relation_type == 'hasOne'?'selected':''); ?> value="hasOne"><?php echo e(it_trans('it.hasone')); ?></option>
						<option <?php echo e($relation->relation_type == 'hasMany'?'selected':''); ?> value="hasMany"><?php echo e(it_trans('it.hasmany')); ?></option>
						<option <?php echo e($relation->relation_type == 'belongsToMany'?'selected':''); ?> value="belongsToMany"><?php echo e(it_trans('it.belongstomany')); ?></option>
						<option <?php echo e($relation->relation_type == 'hasManyThrough'?'selected':''); ?> value="hasManyThrough"><?php echo e(it_trans('it.hasmanythrough')); ?></option>
						<option <?php echo e($relation->relation_type == 'belongsTo'?'selected':''); ?> value="belongsTo"><?php echo e(it_trans('it.belongsto')); ?></option>
						<option <?php echo e($relation->relation_type == 'morphMap'?'selected':''); ?> value="morphMap"><?php echo e(it_trans('it.morphmap')); ?></option>
						<option <?php echo e($relation->relation_type == 'morphMany'?'selected':''); ?> value="morphMany"><?php echo e(it_trans('it.morphmany')); ?></option>
					</select>
				</div>
			</div>
		</div>
		<a href="#" class="remove_field2 btn btn-danger"><i class="fa fa-trash"></i></a>
	</div>
	<?php
	$x++;
	?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
</div>
<br>
<div class="col-offset-left-2">
	<button class="add_field_button2 btn btn-success" style="background: #090">Add Relation Column DB <i class="fa fa-database"></i></button>
</div>
<br><?php /**PATH /home/helplgvr/public_html/dream/vendor/phpanonymous/it/it/views/baboon/relations.blade.php ENDPATH**/ ?>