<div class="col-md-6 well">
  <div class="col-md-12 well">
    <div class="form-group project_title">
      <label for="project_title" class="col-md-12"><?php echo e(it_trans('it.project_title')); ?></label>
      <div class="col-md-10">
        <input type="text" name="project_title"  class="form-control project_title_input"
        value="<?php echo e(!empty($module_data)? $module_data->module_name:old('project_title')); ?>" placeholder="<?php echo e(it_trans('it.project_title')); ?>"  />
      </div>
      <div class="col-md-2">
        <a href="#" data-toggle="modal" data-target="#falist"><i class="fa fa-icons fa-2x"></i></a>
      </div>
    </div>
  </div>
  <div class="col-md-12 form-group model_name well">
    <div class="col-md-1" style="text-align: center;">
      <h3>M</h3>
    </div>
    <div class="col-md-11">
      <label for="model_name" class="col-md-12"><?php echo e(it_trans('it.model_name')); ?></label>
      <input type="text" name="model_name" dir="ltr" value="<?php echo e(!empty($module_data)?$module_data->model_name: old('model_name')); ?>" class="form-control" placeholder="<?php echo e(it_trans('it.model_name')); ?>"  />
      <label for="model_namespace" class="col-md-12"><?php echo e(it_trans('it.model_namespace')); ?></label>
      <select name="model_namespace" size="5" class="form-control model_namespace">
        <option value="App" selected>App</option>
        <?php $__currentLoopData = array_filter(glob(app_path().'/*'), 'is_dir'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $namespaces): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
// Check if Duplicate name to explode it
$namespace_ex_model = explode('app', $namespaces);
// check if offset 2 not empty and exisist
if (isset($namespace_ex_model[2]) && !empty($namespace_ex_model[2])) {
	$model_prefix = str_replace('/', '\\', 'App\\' . $namespace_ex_model[2]);
} else {
	$model_prefix = str_replace('/', '\\', 'App\\' . $namespace_ex_model[1]);
}
$model_prefix = str_replace('\\\\', '\\', $model_prefix);
?>
        <?php if(!preg_match('/Exceptions|Console|DataTables|it|ItHelpers|Mail|Http|Handlers|Providers/i',$model_prefix)): ?>
        <option value="<?php echo e($model_prefix); ?>"
          <?php echo e(!empty($module_data) && $module_data->model_namespace == $model_prefix?'selected':''); ?>

        ><?php echo e($model_prefix); ?></option>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
    </div>
  </div>
  <div class="col-md-12 well">
    <div class="col-md-1" style="text-align: center;">
      <h3>V</h3>
    </div>
    <div class="col-md-11">
      <div class="form-group">
        <label for="admin_folder_path" class="col-md-12"><?php echo e(it_trans('it.admin_folder_path')); ?></label>
        <select name="admin_folder_path" size="5" class="form-control admin_folder_path">
          <option value="resources/views"
            <?php echo e(!empty($module_data) && $module_data->admin_folder_path == 'resources/views' ?'selected':''); ?>

          >resources/views</option>
          <?php $__currentLoopData = array_filter(glob(base_path('resources/views').'/*'), 'is_dir'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin_pathes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
$admin_path = 'resources' . explode('resources', $admin_pathes)[1];
?>
          <option value="<?php echo e($admin_path); ?>"
            <?php if(!empty($module_data) ): ?>
            <?php echo e($module_data->admin_folder_path == $admin_path ?'selected':''); ?>

            <?php else: ?>
            <?php echo e(preg_match('/admin/i',$admin_path)?'selected':''); ?>

            <?php endif; ?>
          ><?php echo e($admin_path); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
    </div>
  </div>
  <div class="col-md-12 well">
    <div class="col-md-1" style="text-align: center;">
      <h3>C</h3>
    </div>
    <div class="col-md-11">
      <div class="form-group controller_name">
        <label for="controller_name" class="col-md-12"><?php echo e(it_trans('it.controller_name')); ?> -
          <small>
            <i class="fa fa-exclamation-triangle" style="width:10px;height:10px;color:orange;"></i>&nbsp; don't write <del style="color:red">ExampleController
          </del><i class="fa fa-times" style="color:red"></i>
           write <b style="color:#090">Example
            <i class="fa fa-check" style="width:10px;height:10px;color:green;"></i>
          </b>
          </small>
          </label>
        <input type="text" name="controller_name" dir="ltr" value="<?php echo e(!empty($module_data)?$module_data->controller_name:old('controller_name')); ?>" class="form-control" placeholder="<?php echo e(it_trans('it.controller_name')); ?>"  />
        <label for="controller_namespace" class="col-md-12"><?php echo e(it_trans('it.controller_namespace')); ?></label>
        <select name="controller_namespace" size="5" class="form-control controller_namespace">
          
          <?php $__currentLoopData = array_filter(glob(app_path('Http/Controllers').'/*'), 'is_dir'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $namespaces): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
// Check if Duplicate name to explode it
$ex_controller_path = explode('app', $namespaces);
// check if offset 2 not empty and exisist
if (isset($ex_controller_path[2]) && !empty($ex_controller_path[2])) {
	$controller_namespace_prefix = str_replace('/', '\\', 'App\\' . $ex_controller_path[2]);
} else {
	$controller_namespace_prefix = str_replace('/', '\\', 'App\\' . $ex_controller_path[1]);
}
$controller_namespace_prefix = str_replace('\\\\', '\\', $controller_namespace_prefix);
?>
          <?php if(!empty($controller_namespace_prefix) && !preg_match('/Api|Auth|Validations/i',$controller_namespace_prefix)): ?>
          <option value="<?php echo e($controller_namespace_prefix); ?>"
            <?php echo e(!empty($module_data) && $module_data->controller_namespace == $controller_namespace_prefix?'selected':''); ?>

          ><?php echo e($controller_namespace_prefix); ?></option>
          <?php echo getnamespace($controller_namespace_prefix); ?>

          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <input type="text" placeholder="Add New Namespace Controller" name="c_namespace"
        class="form-control c_namespace" />
        <a href="#" class="btn btn-primary addcnamespace"><i class="fa fa-plus"></i> Add New Namespace Controllers</a>
        <p class="preview_c_namespace"></p>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-6">
  <div class="col-md-12">
    <?php if(!empty($getAllModule) && count($getAllModule) > 0): ?>
    <script type="text/javascript">
    $(document).ready(function(){
    $(document).on('change','.select_module',function(){
    var select_module = $('.select_module option:selected').val();
    if(select_module != ''){
    window.location.href = '<?php echo e(url('it/baboon-sd')); ?>?module='+select_module;
    }
    });
    });
    </script>
    <div class="form-group modules alert alert-info well">
      <label for="modules" class="col-md-12">Edit Module From List</label>
      <div class="col-md-12">
        <select name="module" class="form-control select_module">
          <option>......Choose Module.......</option>
          <?php $__currentLoopData = $getAllModule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($module['file']); ?>" <?php echo e(request('module') == $module['file']?'selected':''); ?>><?php echo e($module['module_name']); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if(!empty(request('module')) && !empty($module_last_modified)): ?>
        <p>
          <b>Last Modified: <?php echo e($module_last_modified); ?></b> <br>
          <a href="<?php echo e(url('it/baboon-sd')); ?>" class="btn btn-primary">Cancel to edit this module</a>
          <a href="#" class="btn btn-danger" data-toggle="modal"
          data-target="#delete_module" >Delete this module</a>
        </p>
        <?php $__env->startPush('baboon_js'); ?>
        <!-- Delete Modal -->
        <div id="delete_module" class="modal fade" role="dialog">
          <div class="modal-dialog " style="margin-top: 65px;">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Module</h4>
              </div>
              <div class="modal-body">
                <h4><i class="fa fa-warning"></i> You may lose important files in your project and the table will be deleted from its database</h4>
                <h5>Are you sure to delete this module ?</h5>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                <a href="<?php echo e(url()->current()); ?>?delete_module=<?php echo e(request('module')); ?>" class="btn btn-danger">Delete</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Delete Modal End -->
        <?php $__env->stopPush(); ?>
        <?php endif; ?>
      </div>
      <div class="clearfix"></div>
    </div>
    <br />
    <?php endif; ?>

    <div class="col-md-6 well">
      <div class="alert alert-info" style="height: 177px;">
      <h4>CRUD Menu List</h4>
      <br/>
      <ul>
        <li><span class="fa_menulist">
          <i class="<?php echo e(!empty($module_data)? $module_data->fa_icon:''); ?>"></i>
          </span> <span class="project_title_final"><?php echo e(!empty($module_data)? $module_data->module_name:'None Name'); ?></span> </li>
          <li>
            <ul>
              <li>
                <span class="fa_menulist">
                  <i class="<?php echo e(!empty($module_data)? $module_data->fa_icon:''); ?>"></i>
                  </span> <span class="project_title_final"><?php echo e(!empty($module_data)? $module_data->module_name:'None Name'); ?></span> </li>
                  <li><i class="fa fa-plus"></i> Create </li>
                </ul>
              </li>
            </ul>
            <input type="hidden" name="fa_icon" value="<?php echo e(!empty($module_data)? $module_data->fa_icon:old('fa_icon')); ?>" class="fa_icon">
          </div>
    </div>

 <?php echo $__env->make('baboon.cube_counter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="clearfix"></div>
    <hr />
        </div>
      </div>
      <div class="clearfix"></div>
      <!-- Modal -->
      <div id="falist" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" style="width:95%;margin-top: 65px;">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Font Awesome Icons</h4>
            </div>
            <div class="modal-body">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Search From List</label>
                  <input type="text" name="search_list" class="search_list form-control">
                </div>
              </div>
              <div class="col-md-6">
                <br />
                <p>Icon Selected: <span class="fa_menulist"></span></p>
              </div>
              <div class="bodyfalist"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div><?php /**PATH E:\xampp\htdocs\dream\vendor\phpanonymous\it\it\views/baboon/Initialize.blade.php ENDPATH**/ ?>