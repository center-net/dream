<div class="input_fields_wrap">
  <?php
  $x = 0;
  ?>
  <?php $__currentLoopData = $module_data->inputs_columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $input): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php
  $rules = $input->rules;
  ?>
  <div class="col-md-12 well">
    <div class="col-md-3">
      <div class="form-group">
        <label for="col_name" class="col-md-12"><?php echo e(it_trans('it.col_name')); ?></label>
        <div class="col-md-12">
          <input type="text" name="col_name[]" value="<?php echo e($input->col_name); ?>" class="form-control col_name" placeholder="<?php echo e(it_trans('it.col_name')); ?>"  />
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group" style="margin-top: -16px;">
        <label for="col_type" class="col-md-12"><?php echo e(it_trans('it.col_type')); ?></label>
        <div class="col-md-12">
          <select name="col_type[]" class="form-control">
            <option <?php echo e($input->col_type == 'text'?'selected':''); ?> value="text"><?php echo e(it_trans('it.text')); ?></option>
            <option <?php echo e($input->col_type == 'number'?'selected':''); ?> value="number"><?php echo e(it_trans('it.number')); ?></option>
            <option <?php echo e($input->col_type == 'email'?'selected':''); ?> value="email"><?php echo e(it_trans('it.email')); ?></option>
            <option <?php echo e($input->col_type == 'url'?'selected':''); ?> value="url"><?php echo e(it_trans('it.url')); ?></option>
            <option <?php echo e($input->col_type == 'textarea'?'selected':''); ?> value="textarea"><?php echo e(it_trans('it.textarea')); ?></option>
            <option <?php echo e($input->col_type == 'textarea_ckeditor'?'selected':''); ?> value="textarea_ckeditor"><?php echo e(it_trans('it.textarea_ckeditor')); ?></option>
            <option <?php echo e($input->col_type == 'select'?'selected':''); ?> value="select"><?php echo e(it_trans('it.select')); ?></option>
            <option <?php echo e($input->col_type == 'file'?'selected':''); ?> value="file"><?php echo e(it_trans('it.file')); ?></option>
            <option <?php echo e($input->col_type == 'dropzone'?'selected':''); ?> value="dropzone"><?php echo e(it_trans('it.dropzone')); ?></option>
            <option <?php echo e($input->col_type == 'password'?'selected':''); ?> value="password"><?php echo e(it_trans('it.password')); ?></option>
            <option <?php echo e($input->col_type == 'checkbox'?'selected':''); ?> value="checkbox"><?php echo e(it_trans('it.checkbox')); ?></option>
            <option <?php echo e($input->col_type == 'radio'?'selected':''); ?> value="radio"><?php echo e(it_trans('it.radio')); ?></option>
            <option <?php echo e($input->col_type == 'date'?'selected':''); ?> value="date"><?php echo e(it_trans('it.date')); ?></option>
            <option <?php echo e($input->col_type == 'date_time'?'selected':''); ?> value="date_time"><?php echo e(it_trans('it.date_time')); ?></option>
            <option <?php echo e($input->col_type == 'time'?'selected':''); ?> value="time"><?php echo e(it_trans('it.time')); ?></option>
            <option <?php echo e($input->col_type == 'timestamp'?'selected':''); ?> value="timestamp"><?php echo e(it_trans('it.timestamp')); ?></option>
            <option <?php echo e($input->col_type == 'color'?'selected':''); ?> value="color"><?php echo e(it_trans('it.color')); ?></option>
          </select>
        </div>
        <div class="form-group">
          <label for="col_width" class="col-md-12"><?php echo e(it_trans('it.col_width')); ?></label>
          <div class="col-md-3">
            <p>col-lg-<?php echo e($input->col_width_lg); ?></p>
            <select name="col_width_lg[]" class="form-control">
              <option <?php echo e($input->col_width_lg == 1?'selected':''); ?> value="1">1</option>
              <option <?php echo e($input->col_width_lg == 2?'selected':''); ?> value="2">2</option>
              <option <?php echo e($input->col_width_lg == 3?'selected':''); ?> value="3">3</option>
              <option <?php echo e($input->col_width_lg == 4?'selected':''); ?> value="4">4</option>
              <option <?php echo e($input->col_width_lg == 5?'selected':''); ?> value="5">5</option>
              <option <?php echo e($input->col_width_lg == 6?'selected':''); ?> value="6" selected>6</option>
              <option <?php echo e($input->col_width_lg == 7?'selected':''); ?> value="7">7</option>
              <option <?php echo e($input->col_width_lg == 8?'selected':''); ?> value="8">8</option>
              <option <?php echo e($input->col_width_lg == 9?'selected':''); ?> value="9">9</option>
              <option <?php echo e($input->col_width_lg == 10?'selected':''); ?> value="10">10</option>
              <option <?php echo e($input->col_width_lg == 11?'selected':''); ?> value="11">11</option>
              <option <?php echo e($input->col_width_lg == 12?'selected':''); ?> value="12">12</option>
            </select>
          </div>
          <div class="col-md-3">
            <p>col-md-<?php echo e($input->col_width_md); ?></p>
            <select name="col_width_md[]" class="form-control">
              <option <?php echo e($input->col_width_md == 1?'selected':''); ?> value="1">1</option>
              <option <?php echo e($input->col_width_md == 2?'selected':''); ?> value="2">2</option>
              <option <?php echo e($input->col_width_md == 3?'selected':''); ?> value="3">3</option>
              <option <?php echo e($input->col_width_md == 4?'selected':''); ?> value="4">4</option>
              <option <?php echo e($input->col_width_md == 5?'selected':''); ?> value="5">5</option>
              <option <?php echo e($input->col_width_md == 6?'selected':''); ?> value="6" selected>6</option>
              <option <?php echo e($input->col_width_md == 7?'selected':''); ?> value="7">7</option>
              <option <?php echo e($input->col_width_md == 8?'selected':''); ?> value="8">8</option>
              <option <?php echo e($input->col_width_md == 9?'selected':''); ?> value="9">9</option>
              <option <?php echo e($input->col_width_md == 10?'selected':''); ?> value="10">10</option>
              <option <?php echo e($input->col_width_md == 11?'selected':''); ?> value="11">11</option>
              <option <?php echo e($input->col_width_md == 12?'selected':''); ?> value="12">12</option>
            </select>
          </div>
          <div class="col-md-3">
            <p>col-sm-<?php echo e($input->col_width_sm); ?></p>
            <select name="col_width_sm[]" class="form-control">
              <option <?php echo e($input->col_width_sm == 1?'selected':''); ?> value="1">1</option>
              <option <?php echo e($input->col_width_sm == 2?'selected':''); ?> value="2">2</option>
              <option <?php echo e($input->col_width_sm == 3?'selected':''); ?> value="3">3</option>
              <option <?php echo e($input->col_width_sm == 4?'selected':''); ?> value="4">4</option>
              <option <?php echo e($input->col_width_sm == 5?'selected':''); ?> value="5">5</option>
              <option <?php echo e($input->col_width_sm == 6?'selected':''); ?> value="6" selected>6</option>
              <option <?php echo e($input->col_width_sm == 7?'selected':''); ?> value="7">7</option>
              <option <?php echo e($input->col_width_sm == 8?'selected':''); ?> value="8">8</option>
              <option <?php echo e($input->col_width_sm == 9?'selected':''); ?> value="9">9</option>
              <option <?php echo e($input->col_width_sm == 10?'selected':''); ?> value="10">10</option>
              <option <?php echo e($input->col_width_sm == 11?'selected':''); ?> value="11">11</option>
              <option <?php echo e($input->col_width_sm == 12?'selected':''); ?> value="12">12</option>
            </select>
          </div>
          <div class="col-md-3">
            <p>col-xs-<?php echo e($input->col_width_xs); ?></p>
            <select name="col_width_xs[]" class="form-control">
              <option <?php echo e($input->col_width_xs == 1?'selected':''); ?> value="1">1</option>
              <option <?php echo e($input->col_width_xs == 2?'selected':''); ?> value="2">2</option>
              <option <?php echo e($input->col_width_xs == 3?'selected':''); ?> value="3">3</option>
              <option <?php echo e($input->col_width_xs == 4?'selected':''); ?> value="4">4</option>
              <option <?php echo e($input->col_width_xs == 5?'selected':''); ?> value="5">5</option>
              <option <?php echo e($input->col_width_xs == 6?'selected':''); ?> value="6">6</option>
              <option <?php echo e($input->col_width_xs == 7?'selected':''); ?> value="7">7</option>
              <option <?php echo e($input->col_width_xs == 8?'selected':''); ?> value="8">8</option>
              <option <?php echo e($input->col_width_xs == 9?'selected':''); ?> value="9">9</option>
              <option <?php echo e($input->col_width_xs == 10?'selected':''); ?> value="10">10</option>
              <option <?php echo e($input->col_width_xs == 11?'selected':''); ?> value="11">11</option>
              <option <?php echo e($input->col_width_xs == 12?'selected':''); ?> value="12" selected>12</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="form-group">
        <div class="col-md-12">
          <label for="col_name_convention" class="col-md-12"><?php echo e(it_trans('it.col_name_convention')); ?>

            <a href="#" data-toggle="modal" data-target="#column_input_modal_info">
              <i class="fa fa fa-info-circle" style="color:#090"></i>
            </a>
          </label>
          <input type="text" name="col_name_convention[]"  to="<?php echo e($x); ?>" value="<?php echo e($input->col_name_convention); ?>" class="form-control col_name_convention" placeholder="<?php echo e(it_trans('it.col_name_convention')); ?>"  />
          <div class="clearfix"></div>
          <hr />
          <div class="col-md-4">
            <label>
              <?php echo e(it_trans('it.connect_ajax')); ?>

              <input type="checkbox" class="link_ajax"  <?php echo e(isset($input->link_ajax->{'link_ajax'.$x})?'checked':''); ?> to="<?php echo e($x); ?>" name="link_ajax<?php echo e($x); ?>" value="yes">
            </label>
          </div>
          <div class="col-md-8 each_ajax_cols<?php echo e($x); ?>">
            <?php if(isset($input->link_ajax->{'link_ajax'.$x})): ?>
            <select name="select_ajax_link<?php echo e($x); ?>" class="form-control">
              <?php $__currentLoopData = $module_data->inputs_columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $input_ajax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($input_ajax->col_name_convention); ?>"
                <?php echo e($input->link_ajax->{'link_ajax'.$x} == $input_ajax->col_name_convention?'selected':''); ?>

              ><?php echo e($input_ajax->col_name_convention); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php endif; ?>
          </div>

        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <hr />
    <div class="col-md-12 alert alert-info validation">
      <div class="col-md-12">
        <label class="mt-radio">
          <input type="radio" name="col_name_null<?php echo e($x); ?>" class="col_name_null" list="<?php echo e($x); ?>" id="col_name_null" value="null" <?php echo e($input->{'col_name_null'.$x} !='has'?'checked':''); ?>>
          <?php echo e(it_trans('it.col_name_null')); ?>

          <span></span>
        </label>
        -
        <label class="mt-radio">
          <input type="radio" name="col_name_null<?php echo e($x); ?>" class="col_name_null" list="<?php echo e($x); ?>" id="col_name_null" <?php echo e($input->{'col_name_null'.$x} =='has'?'checked':''); ?>  value="has">
          <?php echo e(it_trans('it.not_null')); ?>

          <span></span>
        </label>
      </div>
      <div class="clearfix"></div>
      <hr />
      <div class="col-md-12 list_validation<?php echo e($x); ?> <?php echo e($input->{'col_name_null'.$x} !='has'?'hidden':''); ?>">
        <!--- Start Card Rules  -->
<?php
$col_name_convention_ex = explode('|', $input->col_name_convention);
$col_name_convention = !empty($col_name_convention_ex) && count($col_name_convention_ex) > 0 ?$col_name_convention_ex[0]:$input->col_name_convention;
?>
        <div id="rulesCard<?php echo e($x); ?>">
          <div class="card">
            <div class="card-header">
              <a class="card-link" data-toggle="collapse" data-parent="#rulesCard<?php echo e($x); ?>" href="#basic_rules<?php echo e($x); ?>">Basic Rules (<span class="col_name_<?php echo e($x); ?>"><?php echo e($col_name_convention); ?></span>)</a>
            </div>
            <div id="basic_rules<?php echo e($x); ?>" class="collapse">
              <div class="card-body">
                <!-- Start basic Rules -->
                <div class="col-md-12">
                  <div class="col-md-2">
                    <label class="form-check-input" dir="rtl">
                      email
                      <input type="checkbox" value="1" <?php echo e($rules->{'email'.$x}); ?> name="email<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl">
                      <?php echo e(it_trans('it.url')); ?>

                      <input type="checkbox" value="1" <?php echo e($rules->{'url'.$x}); ?> name="url<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> <?php echo e(it_trans('it.required')); ?>

                      <input type="checkbox" value="1" <?php echo e($rules->{'required'.$x}); ?>  name="required<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> <?php echo e(it_trans('it.string')); ?>

                      <input type="checkbox" value="1" <?php echo e($rules->{'string'.$x}); ?> name="string<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> integer
                      <input type="checkbox" value="1" <?php echo e($rules->{'integer'.$x}); ?> name="integer<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> <?php echo e(it_trans('it.numeric')); ?>

                      <input type="checkbox" value="1" <?php echo e($rules->{'numeric'.$x}); ?>  name="numeric<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> <?php echo e(it_trans('it.sometimes')); ?>

                      <input type="checkbox" value="1" <?php echo e($rules->{'sometimes'.$x}); ?>   name="sometimes<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> <?php echo e(it_trans('it.nullable')); ?>

                      <input type="checkbox" value="1" <?php echo e($rules->{'nullable'.$x}); ?> name="nullable<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> <?php echo e(it_trans('it.confirmed')); ?>

                      <input type="checkbox" value="1" <?php echo e($rules->{'confirmed'.$x}); ?>  name="confirmed<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> filled
                      <input type="checkbox" value="1"  <?php echo e($rules->{'filled'.$x}); ?> name="filled<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> alpha
                      <input type="checkbox" value="1"  <?php echo e($rules->{'alpha'.$x}); ?> name="alpha<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> <?php echo e(it_trans('it.alpha-dash')); ?>

                      <input type="checkbox" value="1" <?php echo e($rules->{'alpha-dash'.$x}); ?> name="alpha-dash<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> alpha_num
                      <input type="checkbox" value="1" <?php echo e($rules->{'alpha_num'.$x}); ?> name="alpha_num<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> active_url
                      <input type="checkbox" value="1" <?php echo e($rules->{'active_url'.$x}); ?>  name="active_url<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> accepted
                      <input type="checkbox" value="1"  <?php echo e($rules->{'accepted'.$x}); ?> name="accepted<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> boolean
                      <input type="checkbox" value="1" <?php echo e($rules->{'boolean'.$x}); ?> name="boolean<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> uuid
                      <input type="checkbox" value="1" <?php echo e($rules->{'uuid'.$x}); ?>  name="uuid<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> bail
                      <input type="checkbox" value="1" <?php echo e($rules->{'bail'.$x}); ?>  name="bail<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> present
                      <input type="checkbox" value="1" <?php echo e($rules->{'present'.$x}); ?>    name="present<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> timezone
                      <input type="checkbox" value="1" <?php echo e($rules->{'timezone'.$x}); ?> name="timezone<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> json
                      <input type="checkbox" value="1" <?php echo e($rules->{'json'.$x}); ?>   name="json<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> array
                      <input type="checkbox" value="1" <?php echo e($rules->{'array'.$x}); ?>   name="array<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> ip
                      <input type="checkbox" value="1" <?php echo e($rules->{'ip'.$x}); ?>   name="ip<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> ipv4
                      <input type="checkbox" value="1" <?php echo e($rules->{'ipv4'.$x}); ?>  name="ipv4<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> ipv6
                      <input type="checkbox" value="1" <?php echo e($rules->{'ipv6'.$x}); ?>   name="ipv6<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="clearfix"></div>
                  <hr />
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> file
                      <input type="checkbox" value="1" <?php echo e($rules->{'file'.$x}); ?>  name="file<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> <?php echo e(it_trans('it.image')); ?>

                      <input type="checkbox" value="1" <?php echo e($rules->{'image'.$x}); ?> name="image<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> pdf
                      <input type="checkbox" value="1" <?php echo e($rules->{'pdf'.$x}); ?> name="pdf<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="clearfix"></div>
                  <hr />
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> office
                      <input type="checkbox" value="1" <?php echo e(!empty($rules->{'office'.$x})? $rules->{'office'.$x}:''); ?> name="office<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> docx
                      <input type="checkbox" value="1" <?php echo e(!empty($rules->{'docx'.$x})? $rules->{'docx'.$x}:''); ?> name="docx<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> xlsx
                      <input type="checkbox" value="1" <?php echo e(!empty($rules->{'xlsx'.$x})? $rules->{'xlsx'.$x}:''); ?> name="xlsx<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> xls
                      <input type="checkbox" value="1" <?php echo e(!empty($rules->{'xls'.$x})? $rules->{'xls'.$x}:''); ?> name="xls<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> xltx
                      <input type="checkbox" value="1" <?php echo e(!empty($rules->{'xltx'.$x})? $rules->{'xltx'.$x}:''); ?> name="xltx<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> ppt
                      <input type="checkbox" value="1" <?php echo e(!empty($rules->{'ppt'.$x})? $rules->{'ppt'.$x}:''); ?> name="ppt<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> ppam
                      <input type="checkbox" value="1" <?php echo e(!empty($rules->{'ppam'.$x})? $rules->{'ppam'.$x}:''); ?> name="ppam<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> pptm
                      <input type="checkbox" value="1" <?php echo e(!empty($rules->{'pptm'.$x})? $rules->{'pptm'.$x}:''); ?> name="pptm<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> ppsm
                      <input type="checkbox" value="1" <?php echo e(!empty($rules->{'ppsm'.$x})? $rules->{'ppsm'.$x}:''); ?> name="ppsm<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> potm
                      <input type="checkbox" value="1" <?php echo e(!empty($rules->{'potm'.$x})? $rules->{'potm'.$x}:''); ?> name="potm<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> sldm
                      <input type="checkbox" value="1" <?php echo e(!empty($rules->{'sldm'.$x})? $rules->{'sldm'.$x}:''); ?> name="sldm<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="clearfix"></div>
                  <hr />
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> audio
                      <input type="checkbox" value="1" <?php echo e(!empty($rules->{'audio'.$x})? $rules->{'audio'.$x}:''); ?> name="audio<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> mp3
                      <input type="checkbox" value="1" <?php echo e($rules->{'mp3'.$x}); ?> name="mp3<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> wav
                      <input type="checkbox" value="1" <?php echo e(!empty($rules->{'wav'.$x})?$rules->{'wav'.$x}:''); ?> name="wav<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> xm
                      <input type="checkbox" value="1" <?php echo e(!empty($rules->{'xm'.$x})? $rules->{'xm'.$x}:''); ?> name="xm<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> ogg
                      <input type="checkbox" value="1" <?php echo e(!empty($rules->{'ogg'.$x})? $rules->{'ogg'.$x}:''); ?> name="ogg<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="clearfix"></div>
                  <hr />
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> video
                      <input type="checkbox" value="1" <?php echo e($rules->{'video'.$x}); ?> name="video<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> mp4
                      <input type="checkbox" value="1" <?php echo e($rules->{'mp4'.$x}); ?> name="mp4<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> mpeg
                      <input type="checkbox" value="1" <?php echo e($rules->{'mpeg'.$x}); ?> name="mpeg<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> mov
                      <input type="checkbox" value="1" <?php echo e($rules->{'mov'.$x}); ?> name="mov<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> 3gp
                      <input type="checkbox" value="1" <?php echo e($rules->{'3gp'.$x}); ?> name="3gp<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> webm
                      <input type="checkbox" value="1" <?php echo e($rules->{'webm'.$x}); ?> name="webm<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> mkv
                      <input type="checkbox" value="1" <?php echo e($rules->{'mkv'.$x}); ?> name="mkv<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> wmv
                      <input type="checkbox" value="1" <?php echo e($rules->{'wmv'.$x}); ?> name="wmv<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> avi
                      <input type="checkbox" value="1" <?php echo e($rules->{'avi'.$x}); ?> name="avi<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-2" >
                    <label class="form-check-input" dir="rtl"> vob
                      <input type="checkbox" value="1" <?php echo e($rules->{'vob'.$x}); ?> name="vob<?php echo e($x); ?>" />
                    </label>
                  </div>
                </div>
                <!-- End basic Rules -->
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <a class="collapsed card-link" data-toggle="collapse" data-parent="#rulesCard<?php echo e($x); ?>" href="#advanced_rules<?php echo e($x); ?>">Advanced Rules (<span class="col_name_<?php echo e($x); ?>"><?php echo e($col_name_convention); ?></span>)</a>
            </div>
            <div id="advanced_rules<?php echo e($x); ?>" class="collapse">
              <div class="card-body">
                <!-- Start Advanced Rules -->
                <div class="col-md-12">
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> required_if
                      <input type="checkbox" class="additional_input" input_name="required_if_text" num="<?php echo e($x); ?>" value="1" <?php echo e(!empty($rules->{'required_if'.$x})?'checked':''); ?> name="required_if<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'required_if'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'required_if'.$x})): ?>
                      <?php if(!empty($rules->{'required_if'.$x}[1])): ?>
                      value="<?php echo e($rules->{'required_if'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="request_name,=,value"
                      <?php endif; ?>
                      name="required_if_text<?php echo e($x); ?>" />
                      <p>(example: required_if:payment_type,cc or request_name,=,value or request_name,>,value or request_name,<,value or request_name,!=,value)</p>
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> required_unless:anotherfield,value,...
                      <input type="checkbox" class="additional_input" input_name="required_unless_text" num="<?php echo e($x); ?>" value="1" name="required_unless<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'required_unless'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'required_unless'.$x})): ?>
                      <?php if(!empty($rules->{'required_unless'.$x}[1])): ?>
                      value="<?php echo e($rules->{'required_unless'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="anotherfield,value"
                      <?php endif; ?>
                      name="required_unless_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> required_with:foo,bar,...
                      <input type="checkbox" class="additional_input" input_name="required_with_text" num="<?php echo e($x); ?>" value="1" name="required_with<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'required_with'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'required_with'.$x})): ?>
                      <?php if(!empty($rules->{'required_with'.$x}[1])): ?>
                      value="<?php echo e($rules->{'required_with'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="foo,bar"
                      <?php endif; ?>
                      name="required_with_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> required_with_all:foo,bar,...
                      <input type="checkbox" class="additional_input" input_name="required_with_all_text" num="<?php echo e($x); ?>" value="1" name="required_with_all<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'required_with_all'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'required_with_all'.$x})): ?>
                      <?php if(!empty($rules->{'required_with_all'.$x}[1])): ?>
                      value="<?php echo e($rules->{'required_with_all'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="foo,bar"
                      <?php endif; ?>
                      name="required_with_all_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> required_without:foo,bar,...
                      <input type="checkbox" class="additional_input" input_name="required_without_text" num="<?php echo e($x); ?>" value="1" name="required_without<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'required_without'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'required_without'.$x})): ?>
                      <?php if(!empty($rules->{'required_without'.$x}[1])): ?>
                      value="<?php echo e($rules->{'required_without'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="foo,bar"
                      <?php endif; ?>
                      name="required_without_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> required_without_all:foo,bar,...
                      <input type="checkbox" class="additional_input" input_name="required_without_all_text" num="<?php echo e($x); ?>" value="1" name="required_without_all<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'required_without_all'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'required_without_all'.$x})): ?>
                      <?php if(!empty($rules->{'required_without_all'.$x}[1])): ?>
                      value="<?php echo e($rules->{'required_without_all'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="foo,bar"
                      <?php endif; ?>
                      name="required_without_all_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> same:field
                      <input type="checkbox" class="additional_input" input_name="same_text" num="<?php echo e($x); ?>" value="1" name="same<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'same'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'same'.$x})): ?>
                      <?php if(!empty($rules->{'same'.$x}[1])): ?>
                      value="<?php echo e($rules->{'same'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="field"
                      <?php endif; ?>
                      name="same_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> size:value
                      <input type="checkbox" class="additional_input" input_name="size_text" num="<?php echo e($x); ?>" value="1" name="size<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'size'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'size'.$x})): ?>
                      <?php if(!empty($rules->{'size'.$x}[1])): ?>
                      value="<?php echo e($rules->{'size'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="value"
                      <?php endif; ?>
                      name="size_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> starts_with:foo,bar,...
                      <input type="checkbox" class="additional_input" input_name="starts_with_text" num="<?php echo e($x); ?>" value="1" name="starts_with<?php echo e($x); ?>" />
                      <input type="text" class="form-control  <?php echo e(empty($rules->{'starts_with'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'starts_with'.$x})): ?>
                      <?php if(!empty($rules->{'starts_with'.$x}[1])): ?>
                      value="<?php echo e($rules->{'starts_with'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="foo,bar"
                      <?php endif; ?>
                      name="starts_with_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> between:min,max
                      <input type="checkbox" class="additional_input" input_name="between_text" num="<?php echo e($x); ?>" value="1" name="between<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'between'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'between'.$x})): ?>
                      <?php if(!empty($rules->{'between'.$x}[1])): ?>
                      value="<?php echo e($rules->{'between'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="min,max"
                      <?php endif; ?>
                      name="between_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> digits_between:min,max
                      <input type="checkbox" class="additional_input" input_name="digits_between_text" num="<?php echo e($x); ?>" value="1" name="digits_between<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'digits_between'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'digits_between'.$x})): ?>
                      <?php if(!empty($rules->{'digits_between'.$x}[1])): ?>
                      value="<?php echo e($rules->{'digits_between'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="min,max"
                      <?php endif; ?>
                      name="digits_between_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> different:field
                      <input type="checkbox" class="additional_input" input_name="different_text" num="<?php echo e($x); ?>" value="1" name="different<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'different'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'different'.$x})): ?>
                      <?php if(!empty($rules->{'different'.$x}[1])): ?>
                      value="<?php echo e($rules->{'different'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="field_name_here"
                      <?php endif; ?>
                      name="different_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> dimensions:min_width=100,min_height=200
                      <input type="checkbox" class="additional_input" input_name="dimensions_text" num="<?php echo e($x); ?>" value="1" name="dimensions<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'dimensions'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'different'.$x})): ?>
                      <?php if(!empty($rules->{'different'.$x}[1])): ?>
                      value="<?php echo e($rules->{'different'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="min_width=100,min_height=200"
                      <?php endif; ?>
                      name="dimensions_text<?php echo e($x); ?>" />
                      <p>(min_width=100,min_height=200 or ratio=3/2)</p>
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> digits:value
                      <input type="checkbox" class="additional_input" input_name="digits_text" num="<?php echo e($x); ?>" value="1" name="digits<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'digits'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'digits'.$x})): ?>
                      <?php if(!empty($rules->{'digits'.$x}[1])): ?>
                      value="<?php echo e($rules->{'digits'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="value"
                      <?php endif; ?>
                      name="digits_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> ends_with:foo,bar,...
                      <input type="checkbox" class="additional_input" input_name="ends_with_text" num="<?php echo e($x); ?>" value="1" name="ends_with<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'ends_with'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'ends_with'.$x})): ?>
                      <?php if(!empty($rules->{'ends_with'.$x}[1])): ?>
                      value="<?php echo e($rules->{'ends_with'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="foo,bar,..."
                      <?php endif; ?>
                      name="ends_with_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> exclude_if:anotherfield,value
                      <input type="checkbox" class="additional_input" input_name="exclude_if_text" num="<?php echo e($x); ?>" value="1" name="exclude_if<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'exclude_if'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'exclude_if'.$x})): ?>
                      <?php if(!empty($rules->{'exclude_if'.$x}[1])): ?>
                      value="<?php echo e($rules->{'exclude_if'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="anotherfield,value"
                      <?php endif; ?>
                      name="exclude_if_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> exclude_unless:anotherfield,value
                      <input type="checkbox" class="additional_input" input_name="exclude_unless_text" num="<?php echo e($x); ?>" value="1" name="exclude_unless<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'exclude_unless'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'exclude_unless'.$x})): ?>
                      <?php if(!empty($rules->{'exclude_unless'.$x}[1])): ?>
                      value="<?php echo e($rules->{'exclude_unless'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="anotherfield,value"
                      <?php endif; ?>
                      name="exclude_unless_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> gt:field
                      <input type="checkbox" class="additional_input"  input_name="gt_text" num="<?php echo e($x); ?>" value="1" name="gt<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'gt'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'gt'.$x})): ?>
                      <?php if(!empty($rules->{'gt'.$x}[1])): ?>
                      value="<?php echo e($rules->{'gt'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="field"
                      <?php endif; ?>
                      name="gt_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> gte:field
                      <input type="checkbox" class="additional_input" input_name="gte_text" num="<?php echo e($x); ?>" value="1" name="gte<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'gte'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'gte'.$x})): ?>
                      <?php if(!empty($rules->{'gte'.$x}[1])): ?>
                      value="<?php echo e($rules->{'gte'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="field"
                      <?php endif; ?>
                      name="gte_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> lt:field
                      <input type="checkbox" class="additional_input"  input_name="lt_text" num="<?php echo e($x); ?>" value="1" name="lt<?php echo e($x); ?>" />
                      <input type="text" class="form-control  <?php echo e(empty($rules->{'lt'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'lt'.$x})): ?>
                      <?php if(!empty($rules->{'lt'.$x}[1])): ?>
                      value="<?php echo e($rules->{'lt'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="field"
                      <?php endif; ?>
                      name="lt_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> lte:field
                      <input type="checkbox" class="additional_input" input_name="lte_text" num="<?php echo e($x); ?>" value="1" name="lte<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'lte'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'lte'.$x})): ?>
                      <?php if(!empty($rules->{'lte'.$x}[1])): ?>
                      value="<?php echo e($rules->{'lte'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="field"
                      <?php endif; ?>
                      name="lte_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> max:value
                      <input type="checkbox" class="additional_input" input_name="max_text" num="<?php echo e($x); ?>" value="1" name="max<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'max'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'max'.$x})): ?>
                      <?php if(!empty($rules->{'max'.$x}[1])): ?>
                      value="<?php echo e($rules->{'max'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="value"
                      <?php endif; ?>
                      name="max_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> min:value
                      <input type="checkbox" class="additional_input" input_name="min_text" num="<?php echo e($x); ?>" value="1" name="min<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'min'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'min'.$x})): ?>
                      <?php if(!empty($rules->{'min'.$x}[1])): ?>
                      value="<?php echo e($rules->{'min'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="value"
                      <?php endif; ?>
                      name="min_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> multiple_of:value
                      <input type="checkbox" class="additional_input" input_name="multiple_of_text" num="<?php echo e($x); ?>" value="1" name="multiple_of<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'multiple_of'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'multiple_of'.$x})): ?>
                      <?php if(!empty($rules->{'multiple_of'.$x}[1])): ?>
                      value="<?php echo e($rules->{'multiple_of'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="value"
                      <?php endif; ?>
                      name="multiple_of_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> not_in:foo,bar,...
                      <input type="checkbox" class="additional_input" input_name="not_in_text" num="<?php echo e($x); ?>" value="1" name="not_in<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'not_in'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'not_in'.$x})): ?>
                      <?php if(!empty($rules->{'not_in'.$x}[1])): ?>
                      value="<?php echo e($rules->{'not_in'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="foo,bar"
                      <?php endif; ?>
                      name="not_in_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> not_regex:pattern
                      <input type="checkbox" class="additional_input" input_name="not_regex_text" num="<?php echo e($x); ?>" value="1" name="not_regex<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'not_regex'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'not_regex'.$x})): ?>
                      <?php if(!empty($rules->{'not_regex'.$x}[1])): ?>
                      value="<?php echo e($rules->{'not_regex'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="/^([0-9\s\-\+\(\)]*)$/"
                      <?php endif; ?>
                      name="not_regex_text<?php echo e($x); ?>" />
                      <p>
                        (Default regex checking for numbers digits)
                      </p>
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> regex:pattern
                      <input type="checkbox" class="additional_input" input_name="regex_text" num="<?php echo e($x); ?>" value="1" name="regex<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'regex'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'regex'.$x})): ?>
                      <?php if(!empty($rules->{'regex'.$x}[1])): ?>
                      value="<?php echo e($rules->{'regex'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="/^([0-9\s\-\+\(\)]*)$/"
                      <?php endif; ?>
                      name="regex_text<?php echo e($x); ?>" />
                      <p>
                        <small>(Default regex checking for numbers digits)</small><br>
                        ('email' => 'regex:/^.+@.+$/i'.)
                      </p>
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> mimetypes:text/plain,...
                      <input type="checkbox" class="additional_input" input_name="mimetypes_text" num="<?php echo e($x); ?>" value="1" name="mimetypes<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'mimetypes'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'mimetypes'.$x})): ?>
                      <?php if(!empty($rules->{'mimetypes'.$x}[1])): ?>
                      value="<?php echo e($rules->{'mimetypes'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="text/plain"
                      <?php endif; ?>
                      name="mimetypes_text<?php echo e($x); ?>" />
                      <p>
                        (example: 'video' => 'mimetypes:video/avi,video/mpeg,video/quicktime')
                      </p>
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> mimes:foo,bar,...
                      <input type="checkbox" class="additional_input" input_name="mimes_text" num="<?php echo e($x); ?>" value="1" name="mimes<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'mimes'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'mimes'.$x})): ?>
                      <?php if(!empty($rules->{'mimes'.$x}[1])): ?>
                      value="<?php echo e($rules->{'mimes'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="jpg,bmp,png"
                      <?php endif; ?>
                      name="mimes_text<?php echo e($x); ?>" />
                      <p>
                        (example: 'mimes:jpg,bmp,png')
                      </p>
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> in_array:anotherfield.*
                      <input type="checkbox" class="additional_input" input_name="in_array_text" num="<?php echo e($x); ?>" value="1" name="in_array<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'in_array'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'in_array'.$x})): ?>
                      <?php if(!empty($rules->{'in_array'.$x}[1])): ?>
                      value="<?php echo e($rules->{'in_array'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="anotherfield.*"
                      <?php endif; ?>
                      name="in_array_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> prohibited_if:anotherfield,value,...
                      <input type="checkbox" class="additional_input" input_name="prohibited_if_text" num="<?php echo e($x); ?>" value="1" name="prohibited_if<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'prohibited_if'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'prohibited_if'.$x})): ?>
                      <?php if(!empty($rules->{'prohibited_if'.$x}[1])): ?>
                      value="<?php echo e($rules->{'prohibited_if'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="anotherfield,value"
                      <?php endif; ?>
                      name="prohibited_if_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> prohibited_unless:anotherfield,value,...
                      <input type="checkbox" class="additional_input" input_name="prohibited_unless_text" num="<?php echo e($x); ?>" value="1" name="prohibited_unless<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'prohibited_unless'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'prohibited_unless'.$x})): ?>
                      <?php if(!empty($rules->{'prohibited_unless'.$x}[1])): ?>
                      value="<?php echo e($rules->{'prohibited_unless'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="anotherfield,value"
                      <?php endif; ?>
                      name="prohibited_unless_text<?php echo e($x); ?>" />
                    </label>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <label class="form-check-input" dir="ltr"> unique:table,column,except,idColumn
                      <input type="checkbox" class="additional_input" input_name="unique_text" num="<?php echo e($x); ?>" value="1" name="unique<?php echo e($x); ?>" />
                      <input type="text" class="form-control <?php echo e(empty($rules->{'unique'.$x})?'hidden':''); ?>"
                      <?php if(!empty($rules->{'unique'.$x})): ?>
                      <?php if(!empty($rules->{'unique'.$x}[1])): ?>
                      value="<?php echo e($rules->{'unique'.$x}[1]); ?>"
                      <?php endif; ?>
                      <?php else: ?>
                      value="table,column,except,idColumn"
                      <?php endif; ?>
                      name="unique_text<?php echo e($x); ?>" />
                      <p>
                        (or with Model Like 'email' => 'unique:App\Models\User,email_address') <br>
                        (or like 'email' => 'unique:users,email_address')
                      </p>
                    </label>
                  </div>
                  <div class="col-md-4">
                    <label class="form-check-input" dir="rtl"> <?php echo e(it_trans('it.exists_table')); ?>

                      <select name="exists_table<?php echo e($x); ?>" class="form-control exists_table" linkmod="<?php echo e($x); ?>">
                        <option value="">without check Exist</option>
                        <optgroup label="App">
                          <?php $__currentLoopData = array_filter(glob(app_path().'/*'), 'is_file'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app_model_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php
$app_model_file = explode('app', $app_model_file);
$app_model_file = str_replace('.php', '', $app_model_file[1]);
$app_model_file = str_replace('/', '\\', $app_model_file);
?>
                          <option value="App<?php echo e($app_model_file); ?>"
                            <?php echo e(!empty($rules->{'exists_table'.$x}) && $rules->{'exists_table'.$x}[1] == 'App'.$app_model_file?'selected':''); ?>

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
$app_model_file = str_replace('.php', '', $app_model_file[1]);
$app_model_file = str_replace('/', '\\', $app_model_file);
?>
                          <option value="App<?php echo e($app_model_file); ?>"
                            <?php echo e(!empty($rules->{'exists_table'.$x}) && $rules->{'exists_table'.$x}[1] == 'App'.$app_model_file?'selected':''); ?>

                          >App<?php echo e($app_model_file); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </optgroup>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </label>
                  </div>
                  <div class="col-md-8">
                    <label class="form-check-input" dir="rtl"> <?php echo e(it_trans('it.date')); ?>

                      <input type="checkbox" value="1" class="date_data" to="<?php echo e($x); ?>" name="date<?php echo e($x); ?>" <?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[0])?$rules->{'date'.$x}[0]:''); ?> />
                    </label>
                    <div class="date_list<?php echo e($x); ?> <?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[0])?'':'hidden'); ?> ">
                      <div class="col-md-3" >
                        <label class="" dir="rtl"> <?php echo e(it_trans('it.date_format')); ?></label>
                        <select name="date_format<?php echo e($x); ?>" class="form-control">
                          <option  selected>NULL</option>
                          <optgroup label="Date">
                            <option <?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[1]) && !empty($rules->{'date'.$x}[1]->{'date_format'.$x}) && $rules->{'date'.$x}[1]->{'date_format'.$x} == 'date_format:Y-m-d'?'selected':''); ?> value="date_format:Y-m-d">date_format:Y-m-d</option>
                            <option <?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[1]) && !empty($rules->{'date'.$x}[1]->{'date_format'.$x}) && $rules->{'date'.$x}[1]->{'date_format'.$x} == 'date_format:Y-M-D'?'selected':''); ?> value="date_format:Y-M-D">date_format:Y-M-D</option>
                            <option <?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[1]) && !empty($rules->{'date'.$x}[1]->{'date_format'.$x}) && $rules->{'date'.$x}[1]->{'date_format'.$x} == 'date_format:y-M-D'?'selected':''); ?> value="date_format:y-M-D">date_format:y-M-D</option>
                            <option <?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[1]) && !empty($rules->{'date'.$x}[1]->{'date_format'.$x}) && $rules->{'date'.$x}[1]->{'date_format'.$x} == 'date_format:y-m-D'?'selected':''); ?> value="date_format:y-m-D">date_format:y-m-D</option>
                            <option <?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[1]) && !empty($rules->{'date'.$x}[1]->{'date_format'.$x}) && $rules->{'date'.$x}[1]->{'date_format'.$x} == 'date_format:y-m-d'?'selected':''); ?> value="date_format:y-m-d">date_format:y-m-d</option>
                            <option <?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[1]) && !empty($rules->{'date'.$x}[1]->{'date_format'.$x}) && $rules->{'date'.$x}[1]->{'date_format'.$x} == 'date_format:d-m-Y'?'selected':''); ?> value="date_format:d-m-Y">date_format:d-m-Y</option>
                            <option <?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[1]) && !empty($rules->{'date'.$x}[1]->{'date_format'.$x}) && $rules->{'date'.$x}[1]->{'date_format'.$x} == 'date_format:d-M-Y'?'selected':''); ?> value="date_format:d-M-Y">date_format:d-M-Y</option>
                            <option <?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[1]) && !empty($rules->{'date'.$x}[1]->{'date_format'.$x}) && $rules->{'date'.$x}[1]->{'date_format'.$x} == 'date_format:D-M-Y'?'selected':''); ?> value="date_format:D-M-Y">date_format:D-M-Y</option>
                          </optgroup>
                          <optgroup label="Date & Time">
                            <option <?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[1]) && !empty($rules->{'date'.$x}[1]->{'date_format'.$x}) && $rules->{'date'.$x}[1]->{'date_format'.$x} == 'date_format:Y-m-d h:i:s'?'selected':''); ?> value="date_format:Y-m-d h:i:s">date_format:Y-m-d h:i:s</option>
                            <option <?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[1]) && !empty($rules->{'date'.$x}[1]->{'date_format'.$x}) && $rules->{'date'.$x}[1]->{'date_format'.$x} == 'date_format:Y-M-D h:i:s'?'selected':''); ?> value="date_format:Y-M-D h:i:s">date_format:Y-M-D h:i:s</option>
                            <option <?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[1]) && !empty($rules->{'date'.$x}[1]->{'date_format'.$x}) && $rules->{'date'.$x}[1]->{'date_format'.$x} == 'date_format:y-M-D h:i:s'?'selected':''); ?> value="date_format:y-M-D h:i:s">date_format:y-M-D h:i:s</option>
                            <option <?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[1]) && !empty($rules->{'date'.$x}[1]->{'date_format'.$x}) && $rules->{'date'.$x}[1]->{'date_format'.$x} == 'date_format:y-m-D h:i:s'?'selected':''); ?> value="date_format:y-m-D h:i:s">date_format:y-m-D h:i:s</option>
                            <option <?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[1]) && !empty($rules->{'date'.$x}[1]->{'date_format'.$x}) && $rules->{'date'.$x}[1]->{'date_format'.$x} == 'date_format:y-m-d h:i:s'?'selected':''); ?> value="date_format:y-m-d h:i:s">date_format:y-m-d h:i:s</option>
                            <option <?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[1]) && !empty($rules->{'date'.$x}[1]->{'date_format'.$x}) && $rules->{'date'.$x}[1]->{'date_format'.$x} == 'date_format:d-m-Y h:i:s'?'selected':''); ?> value="date_format:d-m-Y h:i:s">date_format:d-m-Y h:i:s</option>
                            <option <?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[1]) && !empty($rules->{'date'.$x}[1]->{'date_format'.$x}) && $rules->{'date'.$x}[1]->{'date_format'.$x} == 'date_format:d-M-Y h:i:s'?'selected':''); ?> value="date_format:d-M-Y h:i:s">date_format:d-M-Y h:i:s</option>
                            <option <?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[1]) && !empty($rules->{'date'.$x}[1]->{'date_format'.$x}) && $rules->{'date'.$x}[1]->{'date_format'.$x} == 'date_format:D-M-Y h:i:s'?'selected':''); ?> value="date_format:D-M-Y h:i:s">date_format:D-M-Y h:i:s</option>
                          </optgroup>
                        </select>
                      </div>
                      <div class="col-md-3" >
                        <label class="form-check-input" dir="rtl"> <?php echo e(it_trans('it.after')); ?>

                          <input type="radio" value="after" class="after_before" to="<?php echo e($x); ?>" name="after_before<?php echo e($x); ?>"
                          <?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[1]) && !empty($rules->{'date'.$x}[1]->{'date_format'.$x}) && $rules->{'date'.$x}[1]->{'after_before'.$x} == 'after'?'checked':''); ?>

                          />
                        </label>
                        -
                        <label class="form-check-input" dir="rtl"> <?php echo e(it_trans('it.before')); ?>

                          <input type="radio" value="before"
                          <?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[1]) && !empty($rules->{'date'.$x}[1]->{'date_format'.$x}) && $rules->{'date'.$x}[1]->{'after_before'.$x} == 'before'?'checked':''); ?>

                          class="after_before" to="<?php echo e($x); ?>" name="after_before<?php echo e($x); ?>" />
                        </label>
                        <div class="after_before_list<?php echo e($x); ?>

                          <?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[1]) && !empty($rules->{'date'.$x}[1]->{'before_after_tomorrow'.$x})?'':'hidden'); ?>

                          ">
                          <ol>
                            <li>
                              <label class="mt-radio" dir="rtl"> <?php echo e(it_trans('it.today')); ?>

                                <input type="radio" value="today" class="before_after_tomorrow"
                                <?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[1]) && !empty($rules->{'date'.$x}[1]->{'before_after_tomorrow'.$x}) && $rules->{'date'.$x}[1]->{'before_after_tomorrow'.$x} == 'today'?'checked':''); ?>

                                to="<?php echo e($x); ?>" name="before_after_tomorrow<?php echo e($x); ?>" />
                              </label>
                            </li>
                            <li>
                              <label class="mt-radio" dir="rtl"> <?php echo e(it_trans('it.tomorrow')); ?>

                                <input type="radio" value="tomorrow"
                                <?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[1]) && !empty($rules->{'date'.$x}[1]->{'before_after_tomorrow'.$x}) && $rules->{'date'.$x}[1]->{'before_after_tomorrow'.$x} == 'tomorrow'?'checked':''); ?>

                                class="before_after_tomorrow" to="<?php echo e($x); ?>" name="before_after_tomorrow<?php echo e($x); ?>" />
                              </label>
                            </li>
                            <li>
                              <label class="mt-radio" dir="rtl"> <?php echo e(it_trans('it.other_col')); ?>

                                <input type="radio" value="other_col"
                                <?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[1]) && !empty($rules->{'date'.$x}[1]->{'before_after_tomorrow'.$x}) && $rules->{'date'.$x}[1]->{'before_after_tomorrow'.$x} == 'other_col'?'checked':''); ?>

                                class="before_after_tomorrow" to="<?php echo e($x); ?>" name="before_after_tomorrow<?php echo e($x); ?>" />
                              </label>
                            </li>
                            <li>
                              <label class="mt-radio" dir="rtl"> <?php echo e(it_trans('it.other_carbon')); ?>

                                <input type="radio" value="other_carbon"
                                <?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[1]) && !empty($rules->{'date'.$x}[1]->{'before_after_tomorrow'.$x}) && $rules->{'date'.$x}[1]->{'before_after_tomorrow'.$x} == 'other_carbon'?'checked':''); ?>

                                class="before_after_tomorrow" to="<?php echo e($x); ?>" name="before_after_tomorrow<?php echo e($x); ?>" />
                              </label>
                            </li>
                          </ol>
                        </div>
                      </div>
                      <?php if(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[1]) && !empty($rules->{'date'.$x}[1]->{'before_after_tomorrow'.$x}) && $rules->{'date'.$x}[1]->{'before_after_tomorrow'.$x} == 'other_col'): ?>
                      <script type="text/javascript">
                      $(document).ready(function(){
                      var to = <?php echo e($x); ?>;
                      var val = 'other_col';
                      $('.each_other_carbon'+to).addClass('hidden');
                      $('.each_other_col'+to).removeClass('hidden');
                      var select_list = '<select name="other_cal_before_after'+to+'" class="form-control">';
                        $('input[name="col_name_convention[]"]').each(function(){
                        var vselect = $(this).val();
                        if(vselect == '<?php echo e($rules->{'date'.$x}[1]->{'other_cal_before_after'.$x}); ?>'){
                        var selectedVal = 'selected';
                        }else{
                        var selectedVal = '';
                        }
                        select_list += '<option value="'+vselect+'" '+selectedVal+'>'+vselect+'</option>';
                        });
                      select_list += '</select>';
                      $('.each_col_name_other_col'+to).html(select_list);
                      });
                      </script>
                      <?php endif; ?>
                      <div class="col-md-3 each_other_col<?php echo e($x); ?> hidden">
                        Select The Column
                        <span class="each_col_name_other_col<?php echo e($x); ?>"></span>
                      </div>
                      <div class="col-md-3 each_other_carbon<?php echo e($x); ?>

                        <?php echo e(empty($rules->{'date'.$x}) || empty($rules->{'date'.$x}[1]) || empty($rules->{'date'.$x}[1]->{'before_after_tomorrow'.$x}) || $rules->{'date'.$x}[1]->{'before_after_tomorrow'.$x} != 'other_carbon'?'hidden':''); ?>

                        ">
                        Write Carbon Days
                        <label>
                          Days <input type="text" name="other_carbon<?php echo e($x); ?>" placeholder="Days" class="form-control"
                          value="<?php echo e(!empty($rules->{'date'.$x}) && !empty($rules->{'date'.$x}[1]) && !empty($rules->{'date'.$x}[1]->{'before_after_tomorrow'.$x}) && $rules->{'date'.$x}[1]->{'before_after_tomorrow'.$x} == 'other_carbon'?$rules->{'date'.$x}[1]->{'other_carbon'.$x}:''); ?>"
                          />
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Advanced Rules -->
              </div>
            </div>
          </div>
        </div>
        <!--- End Card Rules  -->
        <div class="clearfix"></div>
        <br />
      </div>
      <div class="col-md-12 well">
        <h4>Schema Relation</h4>
        <div class="form-group">
          <label class="form-check-input" dir="rtl"> <?php echo e(it_trans('it.forginkeyto')); ?>      </label>
          <input type="checkbox" value="1" name="forginkeyto<?php echo e($x); ?>" class="forginkeyto" <?php echo e(!empty($rules->{'forginkeyto'.$x})?'checked':''); ?>  to="<?php echo e($x); ?>" value="1" />
        </div>
        <div class="forginkeyto<?php echo e($x); ?> <?php echo e(empty($rules->{'forginkeyto'.$x})?'hidden':''); ?>">
          <div class="form-group col-md-4">
            <label class="form-check-input" dir="rtl"> <?php echo e(it_trans('it.references')); ?>

              <input type="text" name="references<?php echo e($x); ?>"
              <?php if(!empty(!empty($rules->{'forginkeyto'.$x})) && !empty($rules->{'forginkeyto'.$x}[1])): ?>
              <?php if(!empty($rules->{'forginkeyto'.$x}[1]->{'references'.$x})): ?>
              value="<?php echo e($rules->{'forginkeyto'.$x}[1]->{'references'.$x}); ?>"
              <?php endif; ?>
              <?php endif; ?>
              placeholder="<?php echo e(it_trans('it.references')); ?>" class="form-control references" to="<?php echo e($x); ?>" />
            </div>
            <div class="form-group col-md-4">
              <label class="form-check-input" dir="rtl"> <?php echo e(it_trans('it.forgin_table_name')); ?>

                <input type="text" name="forgin_table_name<?php echo e($x); ?>"
                <?php if(!empty(!empty($rules->{'forginkeyto'.$x})) && !empty($rules->{'forginkeyto'.$x}[1])): ?>
                <?php if(!empty($rules->{'forginkeyto'.$x}[1]->{'forgin_table_name'.$x})): ?>
                value="<?php echo e($rules->{'forginkeyto'.$x}[1]->{'forgin_table_name'.$x}); ?>"
                <?php endif; ?>
                <?php endif; ?>
                placeholder="<?php echo e(it_trans('it.forgin_table_name')); ?>" class="form-control forgin_table_name"  to="<?php echo e($x); ?>" />
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-check-input" dir="rtl"> <?php echo e(it_trans('it.nullable')); ?>

                    <input type="checkbox" name="schema_nullable<?php echo e($x); ?>"
                    value="1"
                    <?php if(!empty(!empty($rules->{'forginkeyto'.$x})) && !empty($rules->{'forginkeyto'.$x}[1])): ?>
                    <?php if(!empty($rules->{'forginkeyto'.$x}[1]->{'schema_nullable'.$x})): ?>
                    <?php echo e($rules->{'forginkeyto'.$x}[1]->{'schema_nullable'.$x}); ?>

                    <?php endif; ?>
                    <?php endif; ?>
                    class="func_nullable" to="<?php echo e($x); ?>" />
                  </div>
                  <div class="form-group">
                    <label class="form-check-input" dir="rtl"> <?php echo e(it_trans('it.onDelete')); ?>

                      <input type="checkbox" name="schema_onDelete<?php echo e($x); ?>"
                      value="1"
                      <?php if(!empty(!empty($rules->{'forginkeyto'.$x})) && !empty($rules->{'forginkeyto'.$x}[1])): ?>
                      <?php if(!empty($rules->{'forginkeyto'.$x}[1]->{'schema_onDelete'.$x})): ?>
                      <?php echo e($rules->{'forginkeyto'.$x}[1]->{'schema_onDelete'.$x}); ?>

                      <?php endif; ?>
                      <?php endif; ?>
                      class="onDelete" to="<?php echo e($x); ?>" />
                    </div>
                    <div class="form-group">
                      <label class="form-check-input" dir="rtl"> <?php echo e(it_trans('it.onUpdate')); ?>

                        <input type="checkbox" name="schema_onUpdate<?php echo e($x); ?>"
                        value="1"
                        <?php if(!empty(!empty($rules->{'forginkeyto'.$x})) && !empty($rules->{'forginkeyto'.$x}[1])): ?>
                        <?php if(!empty($rules->{'forginkeyto'.$x}[1]->{'schema_onUpdate'.$x})): ?>
                        <?php echo e($rules->{'forginkeyto'.$x}[1]->{'schema_onUpdate'.$x}); ?>

                        <?php endif; ?>
                        <?php endif; ?>
                        class="onUpdate" to="<?php echo e($x); ?>" />
                      </div>
                    </div>
                    <div class="clearfix"></div>
                    <p>$table->foreignId('<span class="col_name_<?php echo e($x); ?>"><?php echo e(explode('|',$input->col_name_convention)[0]); ?></span>')->constrained('<span class="forgin_table_name<?php echo e($x); ?>"><?php if(!empty(!empty($rules->{'forginkeyto'.$x})) && !empty($rules->{'forginkeyto'.$x}[1]) && !empty($rules->{'forginkeyto'.$x}[1]->{'forgin_table_name'.$x})): ?><?php echo e($rules->{'forginkeyto'.$x}[1]->{'forgin_table_name'.$x}); ?><?php endif; ?></span>')->references('<span class="references<?php echo e($x); ?>"><?php if(!empty(!empty($rules->{'forginkeyto'.$x})) && !empty($rules->{'forginkeyto'.$x}[1]) && !empty($rules->{'forginkeyto'.$x}[1]->{'references'.$x})): ?><?php echo e($rules->{'forginkeyto'.$x}[1]->{'references'.$x}); ?><?php endif; ?></span>')<span  class="schema_onDelete<?php echo e($x); ?> <?php echo e(!empty(!empty($rules->{'forginkeyto'.$x})) && !empty($rules->{'forginkeyto'.$x}[1]) && $rules->{'forginkeyto'.$x}[1]->{'schema_onDelete'.$x}?'':'hidden'); ?>">->onDelete('cascade')</span><span  class="schema_onUpdate<?php echo e($x); ?> <?php echo e(!empty(!empty($rules->{'forginkeyto'.$x})) && !empty($rules->{'forginkeyto'.$x}[1]) && $rules->{'forginkeyto'.$x}[1]->{'schema_onUpdate'.$x}?'':'hidden'); ?>">->onUpdate('cascade')</span><span class="func_nullable<?php echo e($x); ?> <?php echo e(!empty(!empty($rules->{'forginkeyto'.$x})) && !empty($rules->{'forginkeyto'.$x}[1]) && !empty($rules->{'forginkeyto'.$x}[1]->{'schema_onDelete'.$x})?'':'hidden'); ?>">->nullable()</span>;</p>



                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="clearfix"></div>
              <a href="#" class="remove_field btn btn-danger pull-right"><i class="fa fa-trash"></i></a>
            </div>
            <?php
            $x++;
            ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <div class="col-md-12">
            <button class="add_field_button btn btn-success"><i class="fa fa-plus"></i></button>
          </div><?php /**PATH /home/helplgvr/public_html/dream/vendor/phpanonymous/it/it/views/baboon/new_input_edit.blade.php ENDPATH**/ ?>