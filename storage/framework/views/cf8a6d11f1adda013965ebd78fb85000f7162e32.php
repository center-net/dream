<table class="table  table-striped table-bordered table-hover routelist">
	<caption><?php echo e(@$name); ?></caption>
	<thead>
		<tr>
			<th>host</th>
			<th>method</th>
			<th>uri</th>
			<th>name</th>
			<th>action</th>
			<th>middleware</th>
		</tr>
	</thead>
	<tbody>
		<?php if(!empty($routes)): ?>
		<?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php if(empty($in) || is_numeric(array_search($in,$route->methods))): ?>
		<tr>
			<td>
				<?php echo e($route->domain()); ?>

			</td>
			<td width="10%">
				<?php if(!empty($in)): ?>
				<span class="label
					<?php echo e($in == 'GET'?'label-success':''); ?>

					<?php echo e($in == 'HEAD'?'label-default':''); ?>

					<?php echo e($in == 'DELETE'?'label-danger':''); ?>

					<?php echo e($in == 'PUT'?'label-warning':''); ?>

					<?php echo e($in == 'POST'?'label-warning':''); ?>

					<?php echo e($in == 'PATCH'?'label-warning':''); ?>

					<?php echo e($in == 'OPTION'?'label-primary':''); ?>

					">
					<?php echo e($in); ?>

					</span> &nbsp;
				<?php else: ?>
				<?php $__currentLoopData = $route->methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<span class="label
					<?php echo e($method == 'GET'?'label-success':''); ?>

					<?php echo e($method == 'HEAD'?'label-default':''); ?>

					<?php echo e($method == 'DELETE'?'label-danger':''); ?>

					<?php echo e($method == 'PUT'?'label-warning':''); ?>

					<?php echo e($method == 'POST'?'label-warning':''); ?>

					<?php echo e($method == 'PATCH'?'label-warning':''); ?>

					<?php echo e($method == 'OPTION'?'label-primary':''); ?>

					">
					<?php echo e($method); ?>

					</span>&nbsp;
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
			</td>
			<td width="20%">
				<?php echo e($route->uri); ?>

			</td>
			<td>
				<?php echo e($route->getName()); ?>

			</td>
			<td>
				<?php echo e($route->getActionName()); ?>

			</td>
			<td width="15%">
				<?php echo e(implode(' | ', $route->action['middleware'])); ?>

			</td>
		</tr>
		<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>
	</tbody>
</table>
<?php /**PATH /home/helplgvr/public_html/dream/vendor/phpanonymous/it/it/views/route.blade.php ENDPATH**/ ?>