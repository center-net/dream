<?php $__env->startPush('baboon_js'); ?>
<!-- Modal -->
<div id="column_input_modal_info" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg" style="margin-top: 65px;">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-body">
				<ul>
					<li><small style="color:#c33">Select - active|1,yes/0,no</small></li>
					<li><small style="color:#c33">Select - user_id|App\Models\User::pluck('name','id')</small></li>
					<li><small style="color:#c33">checkbox or radio - input1 => active#1  input2 =>active#2 for same name with different values</small></li>
				</ul>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopPush(); ?>
<?php if(!empty($module_data)): ?>
<?php echo $__env->make('baboon.new_input_edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
<?php echo $__env->make('baboon.new_input_add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH E:\xampp\htdocs\dream\vendor\phpanonymous\it\it\views/baboon/columns_input.blade.php ENDPATH**/ ?>