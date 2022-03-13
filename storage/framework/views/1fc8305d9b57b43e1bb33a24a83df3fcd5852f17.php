<!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
<li class="nav-header"></li>
<li class="nav-item">
  <a href="<?php echo e(aurl('')); ?>" class="nav-link <?php echo e(active_link(null,'active')); ?>">
    <i class="nav-icon fas fa-home"></i>
    <p>
      <?php echo e(trans('admin.dashboard')); ?>

    </p>
  </a>
</li>
<?php if(admin()->user()->role("admins_show")): ?>
<li class="nav-item">
    <a href="<?php echo e(aurl('admins')); ?>" class="nav-link <?php echo e(active_link('admins','active')); ?>">
      <i class="fas fa-users nav-icon"></i>
      <p><?php echo e(trans('admin.admins')); ?></p>
    </a>
  </li>
<?php endif; ?>
<!--subscribers_start_route-->
<?php if(admin()->user()->role("subscribers_show")): ?>
<li class="nav-item">
    <a href="<?php echo e(aurl('subscribers')); ?>" class="nav-link  <?php echo e(active_link('subscribers','active')); ?>">
      <i class="fa fa-icons nav-icon"></i>
      <p><?php echo e(trans('admin.subscribers')); ?> </p>
    </a>
  </li>
<?php endif; ?>
<!--subscribers_end_route-->
<!--tickets_start_route-->
<?php if(admin()->user()->role("tickets_show")): ?>
<li class="nav-item">
    <a href="<?php echo e(aurl('tickets')); ?>" class="nav-link  <?php echo e(active_link('tickets','active')); ?>">
      <i class="fa fa-icons nav-icon"></i>
      <p><?php echo e(trans('admin.tickets')); ?> </p>
    </a>
  </li>
<?php endif; ?>
<!--tickets_end_route-->
<!--tickets_start_route-->
<?php if(admin()->user()->role("tickets_show")): ?>
<li class="nav-item">
    <a href="<?php echo e(aurl('archives')); ?>" class="nav-link  <?php echo e(active_link('archives','active')); ?>">
      <i class="fa fa-icons nav-icon"></i>
      <p>أرشيف الأعطال </p>
    </a>
  </li>
<?php endif; ?>
<!--tickets_end_route-->

<?php if(admin()->user()->role("settings_show")): ?>
<li class="nav-item <?php echo e(active_link('admins','menu-open')); ?>">
  <a href="#" class="nav-link  <?php echo e(active_link('admins','active')); ?>">
    <i class="nav-icon fas fa-users"></i>
    <p>
      <?php echo e(trans('admin.settings')); ?>

      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">

<!--damages_start_route-->
<?php if(admin()->user()->role("damages_show")): ?>
<li class="nav-item">
    <a href="<?php echo e(aurl('damages')); ?>" class="nav-link  <?php echo e(active_link('damages','active')); ?>">
      <i class="fa fa-icons nav-icon"></i>
      <p><?php echo e(trans('admin.damages')); ?> </p>
    </a>
  </li>
<?php endif; ?>
<!--damages_end_route-->
<!--regions_start_route-->
<?php if(admin()->user()->role("regions_show")): ?>
<li class="nav-item">
    <a href="<?php echo e(aurl('regions')); ?>" class="nav-link  <?php echo e(active_link('regions','active')); ?>">
      <i class="fa fa-icons nav-icon"></i>
      <p><?php echo e(trans('admin.regions')); ?> </p>
    </a>
  </li>
<?php endif; ?>
<!--regions_end_route-->
<!--streets_start_route-->
<?php if(admin()->user()->role("streets_show")): ?>
<li class="nav-item">
    <a href="<?php echo e(aurl('streets')); ?>" class="nav-link  <?php echo e(active_link('streets','active')); ?>">
      <i class="fa fa-icons nav-icon"></i>
      <p><?php echo e(trans('admin.streets')); ?> </p>
    </a>
  </li>
<?php endif; ?>
<!--streets_end_route-->
<?php if(admin()->user()->role("admingroups_show")): ?>
<li class="nav-item">
    <a href="<?php echo e(aurl('admingroups')); ?>" class="nav-link <?php echo e(active_link('admingroups','active')); ?>">
      <i class="fas fa-users nav-icon"></i>
      <p><?php echo e(trans('admin.admingroups')); ?></p>
    </a>
  </li>
<?php endif; ?>
<?php if(admin()->user()->role('settings_show')): ?>
<li class="nav-item">
  <a href="<?php echo e(aurl('settings')); ?>" class="nav-link  <?php echo e(active_link('settings','active')); ?>">
    <i class="nav-icon fas fa-cogs"></i>
    <p>
      <?php echo e(trans('admin.settings')); ?>

    </p>
  </a>
</li>
<?php endif; ?>
<?php if(admin()->user()->role("actions_show")): ?>
<li class="nav-item">
    <a href="<?php echo e(aurl('actions')); ?>" class="nav-link  <?php echo e(active_link('actions','active')); ?>">
      <i class="fa fa-icons nav-icon"></i>
      <p><?php echo e(trans('admin.actions')); ?> </p>
    </a>
  </li>
  <?php endif; ?>


  </ul>
</li>
<?php endif; ?>


<?php if(admin()->user()->role("reports_show")): ?>
<li class="nav-item <?php echo e(active_link('admins','menu-open')); ?>">
  <a href="#" class="nav-link  <?php echo e(active_link('admins','active')); ?>">
    <i class="nav-icon fas fa-users"></i>
    <p>
      <?php echo e(trans('admin.reports')); ?>

      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">

<!--damages_start_route-->
<?php if(admin()->user()->role("salaryreports_show")): ?>
<li class="nav-item">
    <a href="<?php echo e(aurl('salaryreports')); ?>" class="nav-link  <?php echo e(active_link('salaryreports','active')); ?>">
      <i class="fa fa-icons nav-icon"></i>
      <p><?php echo e(trans('admin.salaryreports')); ?> </p>
    </a>
  </li>
<?php endif; ?>
<!--damages_end_route-->
<!--regions_start_route-->

  </ul>
</li>
<?php endif; ?>


<!--salaries_start_route-->
<?php if(admin()->user()->role("salaries_show")): ?>
<li class="nav-item <?php echo e(active_link('salaries','menu-open')); ?> ">
  <a href="#" class="nav-link <?php echo e(active_link('salaries','active')); ?>">
    <i class="nav-icon fa fa-icons"></i>
    <p>
      <?php echo e(trans('admin.salaries')); ?>

      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo e(aurl('salaries')); ?>" class="nav-link  <?php echo e(active_link('salaries','active')); ?>">
        <i class="fa fa-icons nav-icon"></i>
        <p><?php echo e(trans('admin.salaries')); ?> </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo e(aurl('salaries/create')); ?>" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p><?php echo e(trans('admin.create')); ?> </p>
      </a>
    </li>
  </ul>
</li>
<?php endif; ?>
<!--salaries_end_route-->


<!--funds_start_route-->
<?php if(admin()->user()->role("funds_show")): ?>
<li class="nav-item <?php echo e(active_link('funds','menu-open')); ?> ">
  <a href="#" class="nav-link <?php echo e(active_link('funds','active')); ?>">
    <i class="nav-icon fa fa-icons"></i>
    <p>
      <?php echo e(trans('admin.funds')); ?> 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo e(aurl('funds')); ?>" class="nav-link  <?php echo e(active_link('funds','active')); ?>">
        <i class="fa fa-icons nav-icon"></i>
        <p><?php echo e(trans('admin.funds')); ?> </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo e(aurl('funds/create')); ?>" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p><?php echo e(trans('admin.create')); ?> </p>
      </a>
    </li>
  </ul>
</li>
<?php endif; ?>
<!--funds_end_route-->

<!--purchases_start_route-->
<?php if(admin()->user()->role("purchases_show")): ?>
<li class="nav-item <?php echo e(active_link('purchases','menu-open')); ?> ">
  <a href="#" class="nav-link <?php echo e(active_link('purchases','active')); ?>">
    <i class="nav-icon fa fa-icons"></i>
    <p>
      <?php echo e(trans('admin.purchases')); ?> 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo e(aurl('purchases')); ?>" class="nav-link  <?php echo e(active_link('purchases','active')); ?>">
        <i class="fa fa-icons nav-icon"></i>
        <p><?php echo e(trans('admin.purchases')); ?> </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo e(aurl('purchases/create')); ?>" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p><?php echo e(trans('admin.create')); ?> </p>
      </a>
    </li>
  </ul>
</li>
<?php endif; ?>
<!--purchases_end_route-->
<?php /**PATH /home/helplgvr/public_html/dream/resources/views/admin/layouts/menu.blade.php ENDPATH**/ ?>