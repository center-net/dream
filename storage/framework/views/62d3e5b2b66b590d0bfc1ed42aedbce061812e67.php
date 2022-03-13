<!--<?php echo e(App\Models\Advance::whereBetween('created_at',[$from, $to])->get()); ?>-->

<?php if(admin()->user()->role('advances_show')): ?>
<?php $__currentLoopData = $adminalls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adminall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(!$adminall->salarie_id->isEmpty()): ?>
<div class="col-md-4 col-sm-6 col-12">
    <div class="info-box" id="totale_salarie">
      <button class="info-box-icon bg-primary" id="rest<?php echo e($adminall->id); ?>" data-toggle="modal"  data-target="#exchange_rank<?php echo e($adminall->id); ?>">
             <?php $__currentLoopData = $adminall->salarie_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <?php echo e(($sal->salarie + $sal->previous_balance + $sal->reward) - $sal->discount); ?>

           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </button>
      <div class="modal" id="exchange_rank<?php echo e($adminall->id); ?>">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">صرف راتب <?php echo e($adminall->first_name." ". $adminall->last_name); ?></h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <?php echo Form::open(['url'=>aurl('/advances'),'id'=>'advances','files'=>true,'class'=>'form-horizontal form-row-seperated']); ?>

                <div class="row">
                    <input type="hidden" name="status" value="yes">
                    <input type="hidden" name="admin_id" value="<?php echo e($adminall->id); ?>">
                    <input type="hidden" name="totale" id="totale" value="">
                    <input type="hidden" name="salarie" id="salarie" value="">
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <?php echo Form::label('advance','باقي الراتب',['class'=>' control-label']); ?>

                            <?php echo Form::text('advance',old('advance'),['class'=>'form-control','id'=>'advance','placeholder'=>trans('admin.advance')]); ?>

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
        </div>
      </div>
      <div class="info-box-content">
        <span class="info-box-text"><?php echo e($adminall->first_name." ". $adminall->last_name); ?></span>

        <?php $__currentLoopData = $adminall->salarie_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span class="info-box-text">الراتب الإسبوعي
        <span class="badge badge-info" id="salarie<?php echo e($adminall->id); ?>">
                <?php echo e($sal->salarie); ?>

            </span>
        </span>
        <span class="info-box-text">رصيد سابق
            <span class="badge badge-info" id="previous_balance<?php echo e($adminall->id); ?>">
                <?php echo e($sal->previous_balance); ?>

            </span>
        </span>
        <span class="info-box-text">الخصومات
            <span class="badge badge-danger" id="discount<?php echo e($adminall->id); ?>">
                <?php echo e($sal->discount); ?>

            </span>
        </span>
        <span class="info-box-text">المكافئات
            <span class="badge badge-info" id="reward<?php echo e($adminall->id); ?>">
                <?php echo e($sal->reward); ?>

            </span>
        </span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <span class="info-box-text">إجمالي السلف <span class="badge badge-danger" id="totale<?php echo e($adminall->id); ?>">0</span></span>
      </div>
      <span class="info-box-icon bg-primary">
        <span class="info-box-icon bg-primary" style="font-size: large;" id="totale_rest<?php echo e($adminall->id); ?>">           <?php $__currentLoopData = $adminall->salarie_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <?php echo e(($sal->salarie + $sal->previous_balance + $sal->reward) - $sal->discount); ?>

           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></span>
      </span>
      <!-- /.info-box-content -->
    </div>
      <div class="card card-dark collapsed-card">
        <div class="card-header">
            <div class="card-tools" >
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                    <h3 class="card-title">
                        <span class="info-box-text">تفاصيل السلف</span>
                    </h3>
                </button>

            </div>
        </div>

        <div class="card-body">
            <div class="row">

                <table class="table table-hover" >
                    <thead>
                        <tr>
                          <th>قيمة السلفة</th>
                          <th>تاريخ </th>
                          <th>الوصف </th>
                          <th>الإجراء </th>
                        </tr>
                      </thead>
                      <tbody id="totale_advan<?php echo e($adminall->id); ?>">
                        <?php $__currentLoopData = App\Models\Advance::whereBetween('created_at',[$from, $to])->where('admin_id',$adminall->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($advan->advance); ?></td>
                            <?php if($advan->status == 'yes'): ?>
                            <td  id="advance<?php echo e($advan->admin_id); ?>"style="display: none;"><?php echo e($advan->advance); ?></td>
                            <?php endif; ?>
                            <td><?php echo e($advan->created_at); ?></td>
                            <td><?php echo e($advan->description); ?></td>
                            <td>
                                <?php if($advan->status == 'yes'): ?>
                                <button type="submit" class="btn btn-flat btn-sm btn-danger">تمت الموافقة</button>
                                <?php else: ?>
                                <form action="<?php echo e(route('advances.destroy', $advan->id)); ?>" method="post" style="display: inline-block">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                <button type="submit" class="btn btn-flat btn-sm btn-danger">رفض</button>
                                </form>
                                <button type="button" class="btn btn-flat btn-sm btn-primary" data-toggle="modal" data-target="#yes<?php echo e($advan->id); ?>">
                                      موافقة
                                </button>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <div class="modal fade" id="yes<?php echo e($advan->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <?php echo Form::open(['url'=>aurl('/advances/'.$advan->id),'method'=>'put','id'=>'advances','files'=>true,'class'=>'form-horizontal form-row-seperated']); ?>

                                <div class="row">

                                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <?php echo Form::label('advance',trans('admin.advance'),['class'=>'control-label']); ?>

                                        <?php echo Form::text('advance', $advan->advance ,['class'=>'form-control','placeholder'=>trans('admin.advance')]); ?>

                                    </div>
                                </div>

                                </div>
                                		<!-- /.row -->
                                		</div>
                                	<!-- /.card-body -->
                                	<div class="card-footer"><button type="submit" name="save" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> <?php echo e(trans('admin.save')); ?></button>

                                <?php echo Form::close(); ?>

                              </div>
                            </div>
                          </div>
                        </div>
                        <?php $__env->startPush('js'); ?>
                        <script type='text/javascript'>
                       $("#totale_salarie").ready(function() {
                                    var salarie = 0;
                                    var previous_balance = 0;
                                    var totale = 0;
                                    var rest = 0;
                                    var advance = 0;
                                    var total_advance = 0;
                                    $('#salarie<?php echo e($adminall->id); ?>').each(function(index) {
                                        salarie = parseFloat($(this).html());
                                    });
                                    $('#previous_balance<?php echo e($adminall->id); ?>').each(function(index) {
                                        previous_balance = parseFloat($(this).html());
                                    });
                                    $('#reward<?php echo e($adminall->id); ?>').each(function(index) {
                                        reward = parseFloat($(this).html());
                                    });
                                   $('#discount<?php echo e($adminall->id); ?>').each(function(index) {
                                        discount = parseFloat($(this).html());
                                    });
                                    $('#totale_rest<?php echo e($adminall->id); ?>').each(function(index) {
                                        totale_rest = parseFloat($(this).html());
                                    });
                                    
                                    $('#totale_advan<?php echo e($adminall->id); ?> #advance<?php echo e($advan->admin_id); ?>').each(function(index) {
                                        advance += parseFloat($(this).html());
                                    });


                                    $("#totale<?php echo e($adminall->id); ?>").html(advance);
                                    total_advance = ((totale_rest) - (advance));
                                    
                                    if(total_advance >= 0){

                                        $('#rest<?php echo e($adminall->id); ?>').html('<span class="info-box-icon bg-primary"style="font-size: large;">صرف<br>الباقي<br>' + total_advance + '</span>');
                                    }else if(total_advance < 0){
                                        $('#rest<?php echo e($adminall->id); ?>').html('<span class="info-box-icon bg-danger"style="font-size: large;">المديونية<br>' + total_advance + '</span>');
                                    }

                                    $('#exchange_rank<?php echo e($adminall->id); ?>').on('show.bs.modal', function (event) {
                                    var modal = $(this)
                                    modal.find('.modal-body #advance').val(total_advance)
                                    modal.find('.modal-body #totale').val(advance)
                                    modal.find('.modal-body #salarie').val(salarie)
                                })

                                });

                                // $.ajax({
                                // type:'POST',
                                // url:"aurl('/salaries/'.$salaries->id)",
                                // data:{salarie:salarie},
                                // success:function(data){
                                //     alert(data.success);
                                // }
                                // });
                          </script>
                        <?php $__env->stopPush(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
            </div>
        </div>
    </div>


    <!-- /.info-box -->
  </div>
  <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<div class="card card-dark ">
	<div class="card-header">
		<div class="card-tools" id="totale_salarie">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                <h3 class="card-title">
                    <?php echo e(admin()->user()->first_name." ". admin()->user()->last_name); ?>


                    <span class="badge card-header">الراتب الإسبوعي</span>
                        <?php $__currentLoopData = admin()->user()->salarie_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="badge badge-info" id="salarie<?php echo e(admin()->user()->id); ?>">
                            <?php echo e($sal->salarie); ?>

                            </span>
                            <span class="info-box-text">الخصومات
                                <span class="badge badge-danger" id="discount<?php echo e(admin()->user()->id); ?>">
                                    <?php echo e($sal->discount); ?>

                                </span>
                            </span>
                            <span class="info-box-text">المكافئات
                                <span class="badge badge-info" id="reward<?php echo e(admin()->user()->id); ?>">
                                    <?php echo e($sal->reward); ?>

                                </span>
                            </span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <span class="badge card-header" >إجمالي السلف لهذا الأسبوع</span>
                    <span class="badge badge-danger" id="totale<?php echo e(admin()->user()->id); ?>">0</span>

                    <span class="badge card-header">باقي الراتب</span>
                    <span  id="rest<?php echo e(admin()->user()->id); ?>">0</span>

                </h3>
            </button>

		</div>
	</div>

    <div class="card-body">
        <div class="">

            <table class="table table-hover" >
                <thead>
                    <tr>
                      <th>الحالة</th>
                      <th>قيمة السلفة</th>
                      <th>تاريخ </th>
                    </tr>
                  </thead>
                  <tbody id="totale_advan<?php echo e(admin()->user()->id); ?>">
                      <?php $__currentLoopData = App\Models\Advance::whereBetween('created_at',[$from, $to])->where('admin_id',admin()->user()->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <tr>
                        <td>
                            <?php if($advan->status == 'yes'): ?>
                            <button type="submit" class="btn btn-flat btn-sm btn-success">تمت الموافقة</button>
                            <?php else: ?>
                            <button type="submit" class="btn btn-flat btn-sm btn-danger">إنتظار الموافقة</button>
                            <?php endif; ?>

                        </td>
                        <td><?php echo e($advan->advance); ?></td>
                        <?php if($advan->status == 'yes'): ?>
                        <td  id="advance<?php echo e($advan->admin_id); ?>"style="display: none;"><?php echo e($advan->advance); ?></td>
                        <?php endif; ?>
                        <td><?php echo e($advan->created_at); ?></td>
                    </tr>
                    <?php $__env->startPush('js'); ?>
                    <script type='text/javascript'>
                              $("#totale_salarie").ready(function() {
                                    var salarie = 0;
                                    var previous_balance = 0;
                                    var totale = 0;
                                    var rest = 0;
                                    var advance = 0;
                                    var total_advance = 0;
                                    $('#salarie<?php echo e(admin()->user()->id); ?>').each(function(index) {
                                        salarie = parseFloat($(this).html());
                                    });
                                    $('#previous_balance<?php echo e(admin()->user()->id); ?>').each(function(index) {
                                        previous_balance = parseFloat($(this).html());
                                    });
                                    $('#totale_advan<?php echo e(admin()->user()->id); ?> #advance<?php echo e($advan->admin_id); ?>').each(function(index) {
                                        advance += parseFloat($(this).html());
                                    });


                                    $("#totale<?php echo e(admin()->user()->id); ?>").html(advance);
                                    total_advance = (salarie - advance + previous_balance);
                                    if(total_advance >= 0){

                                        $('#rest<?php echo e(admin()->user()->id); ?>').html('<span class="info-box-icon bg-primary"style="font-size: large;">صرف الباقي ' + total_advance + '</span>');
                                    }else{
                                        $('#rest<?php echo e(admin()->user()->id); ?>').html('<span class="info-box-icon bg-danger"style="font-size: large;">المديونية ' + total_advance + '</span>');
                                    }


                                });
                      </script>
                    <?php $__env->stopPush(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
        </div>

	</div>
</div>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\dream\resources\views/admin/layouts/statistics/advances.blade.php ENDPATH**/ ?>