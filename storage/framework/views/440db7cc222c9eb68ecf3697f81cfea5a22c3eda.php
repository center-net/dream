<?php $__env->startSection('content'); ?>
<div class="row">
  <section class="col-lg-12 connectedSortable">
    <div class="card" item_name="statistics">
      <div class="card-header d-flex p-0">
        <h3 class="card-title p-3">
        <i class="fas fa-calculator mr-1"></i>
        Statistics
        </h3>
        </div><!-- /.card-header -->
          <div class="card-body">
            <div class="row">
          <?php echo $__env->make('admin.layouts.statistics.module_counters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
          </div><!-- /.card-body -->
        </div>
  </section>
</div>
<?php if(admin()->user()->role('advances_show')): ?>
<?php if($advances2->count() > 0): ?>
<div class="row">
    <section class="col-lg-12 ">
      <div class="card" item_name="statistics">
        <div class="card-header d-flex p-0">
          <h3 class="card-title p-3">
          <i class="fas fa-calculator mr-1"></i>
          <?php echo e(trans("admin.advances")); ?>

          
          </h3>
          </div><!-- /.card-header -->
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
                  <tbody id="totale_advan<?php echo e(admin()->user()->id); ?>">
                    <?php $__currentLoopData = $advances2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                            <td><?php echo e(App\Models\Admin::find($advan->admin_id)->first_name." ". 
                            App\Models\Admin::find($advan->admin_id)->last_name); ?></td>
                            <td><?php echo e($advan->advance); ?></td>
                            <td><?php echo e($advan->created_at); ?></td>
                            <td><?php echo e($advan->description); ?></td>
                            <td>
                                <form action="<?php echo e(route('advances.destroy', $advan->id)); ?>" method="post" style="display: inline-block">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                <button type="submit" class="btn btn-flat btn-sm btn-danger">رفض</button>
                                </form>
                                <button type="button" class="btn btn-flat btn-sm btn-primary" data-toggle="modal" data-target="#yes<?php echo e($advan->id); ?>">
                                      موافقة
                                </button>
                                
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
        </div>
            </div><!-- /.card-body -->
          </div>
    </section>
  </div>
<?php endif; ?>
<?php endif; ?>
<div class="row">
    <section class="col-lg-12 ">
      <div class="card" item_name="statistics">
        <div class="card-header d-flex p-0">
          <h3 class="card-title p-3">
          <i class="fas fa-calculator mr-1"></i>
          <?php echo e(trans("admin.advances")); ?>

          </h3>
          </div><!-- /.card-header -->
            <div class="card-body">
                <div class="row">
            <?php echo $__env->make('admin.layouts.statistics.advances', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
            </div><!-- /.card-body -->
          </div>
    </section>
  </div>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/helplgvr/public_html/dream/resources/views/admin/home.blade.php ENDPATH**/ ?>