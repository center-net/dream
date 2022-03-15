<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.ajax',[
        'typeForm'=>'create',
        'selectID'=>'region_id',
        'outputClass'=>'street_id',
        'url'=>aurl('routers/get/street/id'),
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
                        <a href="<?php echo e(aurl('routers')); ?>" style="color:#343a40" class="dropdown-item">
                            <i class="fas fa-list"></i> <?php echo e(trans('admin.show_all')); ?></a>
                    </div>
                </div>
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <?php echo Form::open(['url'=>aurl('/routers'),'id'=>'routers','files'=>true,'class'=>'form-horizontal form-row-seperated']); ?>

            <div class="row">

                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <?php echo Form::label('router_number',trans('admin.router_number'),['class'=>' control-label']); ?>

                        <?php echo Form::text('router_number',old('router_number'),['class'=>'form-control','placeholder'=>trans('admin.router_number')]); ?>

                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-4">
                    <div class="form-group">
                        <?php echo Form::label('region_id',trans('admin.region_id')); ?>

                        <?php echo Form::select('region_id',App\Models\Region::pluck('regionsName','id'),old('region_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]); ?>

                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-4">
                    <div class="form-group">
                        <?php echo Form::label('street_id',trans('admin.street_id')); ?>

                        <span class="street_id"></span>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-4">
                    <div class="form-group">
                        <?php echo Form::label('ip_router',trans('admin.ip_router'),['class'=>' control-label']); ?>

                        <?php echo Form::text('ip_router',old('ip_router'),['class'=>'form-control','pattern'=>"^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$",'placeholder'=>trans('admin.ip_router')]); ?>

                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <?php echo Form::label('address',trans('admin.address'),['class'=>' control-label']); ?>

                        <?php echo Form::text('address',old('address'),['class'=>'form-control','placeholder'=>trans('admin.address')]); ?>

                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <?php echo Form::label('note',trans('admin.note'),['class'=>' control-label']); ?>

                        <?php echo Form::text('note',old('note'),['class'=>'form-control','placeholder'=>trans('admin.note')]); ?>

                    </div>
                </div>


            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="add" class="btn btn-primary btn-flat"><i
                    class="fa fa-plus"></i> <?php echo e(trans('admin.add')); ?></button>
            <button type="submit" name="add_back" class="btn btn-success btn-flat"><i
                    class="fa fa-plus"></i> <?php echo e(trans('admin.add_back')); ?></button>
            <?php echo Form::close(); ?>    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/helplgvr/public_html/dream/resources/views/admin/routers/create.blade.php ENDPATH**/ ?>