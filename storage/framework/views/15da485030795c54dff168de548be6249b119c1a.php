<?php $__env->startSection('content'); ?>
<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">


            <?php if($tickets->status == 6): ?>
            <button type="submit" class="btn btn-flat btn-sm btn-primary">العطل مغلق</button>
            <?php else: ?>
                 <?php if(admin()->user()->role("tickets_edit")): ?>
            <form action="<?php echo e(route('closed', $tickets->id)); ?>" method="post" style="display: inline-block">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
            <input type="hidden" name="ticket_id" value="<?php echo e($tickets->id); ?>">
            <button type="submit" class="btn btn-flat btn-sm btn-primary">إغلاق التذكرة</button>
        </form>

                <form action="<?php echo e(route('reconsidering', $tickets->id)); ?>" method="post" style="display: inline-block">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                <input type="hidden" name="ticket_id" value="<?php echo e($tickets->id); ?>">
                <button type="submit" class="btn btn-flat btn-sm btn-primary">إعدتها للصيانة</button>
            </form>
            <?php endif; ?>
            <?php endif; ?>


			<a><?php echo e(!empty($title)?$title:''); ?></a>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
				<span class="sr-only"></span>
			</a>

			<div class="dropdown-menu" role="menu">
				<a href="<?php echo e(aurl('tickets')); ?>" class="dropdown-item"  style="color:#343a40">
				<i class="fas fa-list"></i> <?php echo e(trans('admin.show_all')); ?></a>
                <?php if(admin()->user()->role("tickets_edit")): ?>
				<a class="dropdown-item"  style="color:#343a40" href="<?php echo e(aurl('tickets/'.$tickets->id.'/edit')); ?>">
					<i class="fas fa-edit"></i> <?php echo e(trans('admin.edit')); ?>

				</a>
                <?php endif; ?>
				<div class="dropdown-divider"></div>
                <?php if(admin()->user()->role("tickets_delete")): ?>
				<a data-toggle="modal" data-target="#deleteRecord<?php echo e($tickets->id); ?>" class="dropdown-item"  style="color:#343a40" href="#">
					<i class="fas fa-trash"></i> <?php echo e(trans('admin.delete')); ?>

				</a>
                <?php endif; ?>
			</div>
		</div>
		</h3>
		<?php $__env->startPush('js'); ?>
		<div class="modal fade" id="deleteRecord<?php echo e($tickets->id); ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"><?php echo e(trans('admin.delete')); ?></h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>  <?php echo e(trans('admin.ask_del')); ?> <?php echo e(trans('admin.id')); ?> (<?php echo e($tickets->id); ?>)
					</div>
					<div class="modal-footer">
						<?php echo Form::open([
               'method' => 'DELETE',
               'route' => ['tickets.destroy', $tickets->id]
               ]); ?>

                <?php echo Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger btn-flat']); ?>

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

	<!-- /.card-header -->
	<div class="card-body">

        <div class="row">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>إسم المشترك</th>
                    <th>العطل</th>
                    <th>الحالة</th>
                    <th>تاريخ التذكرة</th>
                  </tr>
                </thead>
                <tbody>
                        <tr>
                            <td><?php echo e($tickets->subscriber_id()->first()->subscriberName); ?></td>
                            <td><?php echo e($tickets->damage_id()->first()->damageName); ?></td>
                            <td><?php echo e(trans("admin.".$tickets->status)); ?></td>
                            <td><?php echo e($tickets->created_at); ?></td>
                        </tr>

                </tbody>
              </table>
        </div>

        <div class="row">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>إسم الفني</th>
                    <th>التشخيص</th>
                    <th>الإجراء المتخذ</th>
                    <th>تاريخ الصيانة </th>
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $tickets->Troubleshootings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Troubleshooting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($Troubleshooting->admin_id()->first()->first_name); ?>

                                <?php echo e($Troubleshooting->admin_id()->first()->last_name); ?></td>
                            <td><?php echo e($Troubleshooting->diagnosis); ?></td>
                            <td><?php echo e($Troubleshooting->action_id()->first()->name_actions); ?></td>
                            <td><?php echo e($Troubleshooting->created_at); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
              </table>
        </div>
	</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/helplgvr/public_html/dream/resources/views/admin/tickets/show.blade.php ENDPATH**/ ?>