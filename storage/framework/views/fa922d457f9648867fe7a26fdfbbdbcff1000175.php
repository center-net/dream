<?php $__env->startSection('content'); ?>
<div class="card-body">

    <div class="row">
        <table class="table table-hover">
            <thead>
              <tr>
                <th>إسم المشترك</th>
                <th>رقم الجوال</th>
                <th>نوع الإشتراك</th>
                <th>الإجراء</th>
              </tr>
            </thead>
            <tbody>
                    <tr>
                        <td><?php echo $subscribers->subscriberName; ?></td>
                        <td><?php echo $subscribers->mobile; ?></td>
                        <td><?php echo e(trans("admin.".$subscribers->type)); ?></td>
                        <td>
                            <h3 class="card-title">
                            <div class="">
                                <a><?php echo e(!empty($title)?$title:''); ?></a>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only"></span>
                                </a>
                                <div class="dropdown-menu" role="menu">
                                    <a href="<?php echo e(aurl('subscribers')); ?>" class="dropdown-item"  style="color:#343a40">
                                    <i class="fas fa-list"></i> <?php echo e(trans('admin.show_all')); ?></a>
                                    <a class="dropdown-item"  style="color:#343a40" href="<?php echo e(aurl('subscribers/'.$subscribers->id.'/edit')); ?>">
                                        <i class="fas fa-edit"></i> <?php echo e(trans('admin.edit')); ?>

                                    </a>
                                    <a class="dropdown-item"  style="color:#343a40" href="<?php echo e(aurl('subscribers/create')); ?>">
                                        <i class="fas fa-plus"></i> <?php echo e(trans('admin.create')); ?>

                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a data-toggle="modal" data-target="#deleteRecord<?php echo e($subscribers->id); ?>" class="dropdown-item"  style="color:#343a40" href="#">
                                        <i class="fas fa-trash"></i> <?php echo e(trans('admin.delete')); ?>

                                    </a>
                                </div>
                            </div>
                            </h3>
                        </td>
                    </tr>

            </tbody>
          </table>
    </div>

</div>
<?php $__currentLoopData = $subscribers->tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card card-dark <?php echo e($ticket->status == '6' ? 'collapsed-card' :''); ?>">
	<div class="card-header">
		<h3 class="card-title" style=" width: 90%;">
            <table class="table">
                <tbody>
                    <tr>
                        <td><?php echo e($ticket->admin_id()->first()->first_name); ?>

                            <?php echo e($ticket->admin_id()->first()->last_name); ?></td>
                        <td><?php echo e(trans("admin.".$ticket->status)); ?></td>
                        <td>
                            <?php echo e($ticket->damage_id()->first()->damageName); ?>

                        </td>
                        <td><?php echo e($ticket->note); ?></td>
                        <td><?php echo e($ticket->created_at); ?></td>
                        <td>
                            <?php if(admin()->user()->role("tickets_edit")): ?>
                           <?php if($ticket->status != '6'): ?>
                               <form action="<?php echo e(route('closed', $ticket->id)); ?>" method="post" style="display: inline-block">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                            <input type="hidden" name="ticket_id" value="<?php echo e($ticket->id); ?>">
                            <button type="submit" class="btn btn-flat btn-sm btn-primary">إغلاق التذكرة</button>
                        </form>
                        <form action="<?php echo e(route('reconsidering', $ticket->id)); ?>" method="post" style="display: inline-block">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                <input type="hidden" name="ticket_id" value="<?php echo e($ticket->id); ?>">
                                <button type="submit" class="btn btn-flat btn-sm btn-primary">إعدتها للصيانة</button>
                            </form>
                           <?php else: ?>
                           <button type="submit" class="btn btn-flat btn-sm btn-primary">العطل مغلق</button>
                           <?php endif; ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                </tbody>
              </table>
		</h3>
		<div class="card-tools">

			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas <?php echo e($ticket->status == '4' ? 'fa-plus' :'fa-minus'); ?>"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>

    <div class="card-body">
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
                    <?php $__currentLoopData = $ticket->Troubleshootings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Troubleshooting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->startPush('js'); ?>
<div class="modal fade" id="deleteRecord<?php echo e($subscribers->id); ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo e(trans('admin.delete')); ?></h4>
                <button class="close" data-dismiss="modal">x</button>
            </div>
            <div class="modal-body">
                <i class="fa fa-exclamation-triangle"></i>  <?php echo e(trans('admin.ask_del')); ?> <?php echo e(trans('admin.id')); ?> (<?php echo e($subscribers->id); ?>)
            </div>
            <div class="modal-footer">
                <?php echo Form::open([
       'method' => 'DELETE',
       'route' => ['subscribers.destroy', $subscribers->id]
       ]); ?>

        <?php echo Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger btn-flat']); ?>

                 <a class="btn btn-default" data-dismiss="modal"><?php echo e(trans('admin.cancel')); ?></a>
        <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/helplgvr/public_html/dream/resources/views/admin/subscribers/show.blade.php ENDPATH**/ ?>