<?php $__env->startSection('content'); ?>

<?php echo Form::open(["method" => "post","url" => [aurl('/tickets/multi_delete')]]); ?>

<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title"><?php echo e(!empty($title)?$title:''); ?></h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="row">
			<div class="table-responsive">
			<?php echo $dataTable->table(["class"=> "table table-striped table-bordered table-hover table-checkable dataTable no-footer"],true); ?>

			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
	</div>
</div>
<div class="modal fade" id="multi_delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
					<h4 class="modal-title"><?php echo e(trans("admin.delete")); ?> </h4>
					<button class="close" data-dismiss="modal">x</button>
			</div>
			<div class="modal-body">
					<div class="delete_done"><i class="fa fa-exclamation-triangle"></i> <?php echo e(trans("admin.ask-delete")); ?> <span id="count"></span> <?php echo e(trans("admin.record")); ?> </div>
					<div class="check_delete"><?php echo e(trans("admin.check-delete")); ?></div>
			</div>
			<div class="modal-footer">
					<?php echo Form::submit(trans("admin.approval"), ["class" => "btn btn-danger btn-flat delete_done"]); ?>

					<a class="btn btn-default" data-dismiss="modal"><?php echo e(trans("admin.cancel")); ?></a>
			</div>
		</div>
	</div>
</div>
<?php echo Form::close(); ?>



<div class="modal fade" id="addaction">
	<div class="modal-dialog ">
		<div class="modal-content" style="width: 140%;">
			<div class="modal-header ">
					<h4 class="modal-title">addaction </h4>
					<button class="close" data-dismiss="modal">x</button>
			</div>
			<div class="modal-body">
                <div class="card-body">

                    <?php echo Form::open(['url'=>aurl('/troubleshootings'),'id'=>'troubleshootings','files'=>true,'class'=>'form-horizontal form-row-seperated']); ?>

                <div class="row">
                    <input type="hidden" class="ticket_id" name="ticket_id" value="">
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <?php echo Form::label('diagnosis',trans('admin.diagnosis'),['class'=>' control-label']); ?>

                            <?php echo Form::text('diagnosis',old('diagnosis'),['class'=>'form-control','placeholder'=>trans('admin.diagnosis')]); ?>

                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <?php echo Form::label('action_id',trans('admin.action_id')); ?>

                        <?php echo Form::select('action_id',App\Models\Action::pluck('name_actions','id'),old('action_id'),['class'=>'form-control select2','style'=>" width: 100%;",'placeholder'=>trans('admin.choose')]); ?>

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
			</div>
			<div class="modal-footer">
                <div class="card-footer"><button type="submit" name="add" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> <?php echo e(trans('admin.add')); ?></button>

                <?php echo Form::close(); ?>

			</div>
		</div>
	</div>
</div>


<?php $__env->startPush('js'); ?>

<?php echo $dataTable->scripts(); ?>


<script>
    $('#addaction').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var modal = $(this)
        modal.find('.modal-body .ticket_id').val( recipient)
      })
    </script>

<?php $__env->stopPush(); ?>
		<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/helplgvr/public_html/dream/resources/views/admin/tickets/index.blade.php ENDPATH**/ ?>