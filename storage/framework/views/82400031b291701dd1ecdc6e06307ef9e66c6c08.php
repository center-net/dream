<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse js-navbar-collapse">
	<ul class="nav navbar-nav navbar-left">
		<li class="nav-item">
			<a class="navbar-brand" href="<?php echo e(url('it')); ?>">
			<?php echo $__env->make('layouts.logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</a>
		</li>
		<li class="nav-item baboon_monkey">
			<a href="<?php echo e(url('it/baboon-sd')); ?>">
				<i>&#128018;</i>
				<?php echo e(it_trans('it.baboon-sd')); ?>

			</a>
		</li>
		<li class="nav-item">
			<a href="<?php echo e(url('it/routelist')); ?>"><i class="fa fa-route"></i> <?php echo e(it_trans('it.routelist')); ?> </a>
		</li>
		<li class="nav-item">
			<a href="<?php echo e(url('it/workflow')); ?>"><i class="fa fa-cog "></i> <?php echo e(it_trans('it.workflow')); ?></a></li>
		<?php if(class_exists('Barryvdh\Elfinder\ElfinderController')): ?>
		<li class="nav-item"><a href="<?php echo e(url('it/merge')); ?>"><i class="fa fa-cloud "></i> <?php echo e(it_trans('it.merge')); ?></a></li>
		<?php endif; ?>
		<li class="nav-item">
			<a data-toggle="modal" data-href="#loginModal" data-target="#loginModal" style="cursor:pointer;">
			<i class="fa fa-bug"></i>
			Have Bugs !!
			</a>
		</li>
		<li class="nav-item">
			<a href="<?php echo e(url('it/docs')); ?>" title="<?php echo e(it_trans('it.document_offline')); ?>">
				<i class="fa fa-newspaper"></i>
				<?php echo e(it_trans('it.document_offline')); ?>

			</a>
		</li>
		<li class="nav-item">
			<a href="#" data-toggle="modal" data-target="#donate" title="donate">
				<i style="font-size:20px">&#9749;</i>&nbsp; <?php echo e(it_trans('it.donate')); ?>

			</a>
		</li>
		<li>
			<a href="#" onclick="darkmode()">
				<i class="fa fa-lightbulb"></i>
			Dark Mode</a>
		</li>

	</ul>
	
	</div><!-- /.nav-collapse --><?php /**PATH E:\xampp\htdocs\dream\vendor\phpanonymous\it\it\views/layouts/menu.blade.php ENDPATH**/ ?>