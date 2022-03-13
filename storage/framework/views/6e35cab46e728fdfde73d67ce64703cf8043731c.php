  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand
 <?php echo e(!empty(setting()->theme_setting) &&
    !empty(setting()->theme_setting->navbar)?
    setting()->theme_setting->navbar:'navbar-dark'); ?>

<?php echo e(!empty(setting()->theme_setting) &&
   !empty(setting()->theme_setting->main_header)?
    setting()->theme_setting->main_header:''); ?>

    ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo e(aurl('logout')); ?>" class="nav-link"><i class="nav-icon fas fa-sign-out-alt"></i> <?php echo e(trans('admin.logout')); ?></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo e(aurl('lock/screen')); ?>?email=<?php echo e(admin()->user()->email); ?>" class="nav-link"><i class="nav-icon fa fa-user-lock"></i> <?php echo e(trans('admin.lock_screen')); ?></a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    


    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto-navbav">
        <li class="nav-item d-none d-sm-inline-block">
         <span class="nav-link">   اليوم : <?php echo e(Carbon::today()->isoFormat('dddd')); ?> <?php echo e(Carbon::today()->format('Y-m-d')); ?></span>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <?php echo e(admin()->user()->first_name); ?> <?php echo e(admin()->user()->last_name); ?>

            </a>
            <div class="dropdown-menu dropdown-menu-lg messages  <?php echo e(app('l') == 'ar'?'dropdown-menu-right':'dropdown-menu-left'); ?>" style=" width: 155px;">
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#addAdvance" data-whatever="<?php echo e(admin()->user()->id); ?>">
                    <!-- Message Start -->
                    <div class="media">
                      <div class="media-body">
                        <h3 class="dropdown-item-title text-center">
                            <p class="text-sm"><i class="nav-icon fas fa-user"></i>إضافة سلفة</p>
                        </h3>
                      </div>
                    </div>
                    <!-- Message End -->
                  </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <div class="media-body">
                    <h3 class="dropdown-item-title text-center">
                        <p class="text-sm"><i class="nav-icon fas fa-user"></i>الرواتب</p>
                    </h3>
                  </div>
                </div>
                <!-- Message End -->
              </a>
          <div class="dropdown-divider"></div>
                <a href="<?php echo e(aurl('/profile')); ?>" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                      <div class="media-body">
                        <h3 class="dropdown-item-title text-center">
                            <p class="text-sm"><i class="nav-icon fas fa-user"></i>الملف الشخصي</p>
                        </h3>
                      </div>
                    </div>
                    <!-- Message End -->
                  </a>
              <div class="dropdown-divider"></div>
              <a href="<?php echo e(aurl('/editprofile')); ?>" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <div class="media-body">
                    <h3 class="dropdown-item-title text-center">
                        <p class="text-sm"><i class="nav-icon fas fa-user"></i>تعديل الملف الشخصي</p>
                    </h3>
                  </div>
                </div>
                <!-- Message End -->
              </a>
          <div class="dropdown-divider"></div>

            </div>
          </li>
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg messages  <?php echo e(app('l') == 'ar'?'dropdown-menu-right':'dropdown-menu-left'); ?>">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo e(url('assets')); ?>/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo e(url('assets')); ?>/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo e(url('assets')); ?>/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg notifications <?php echo e(app('l') == 'ar'?'dropdown-menu-right':'dropdown-menu-left'); ?>">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
<!-- /.navbar -->
<!-- Main Sidebar Menu Container -->
<aside class="main-sidebar <?php echo e(!empty(setting()->theme_setting) && !empty(setting()->theme_setting->sidebar_class)?setting()->theme_setting->sidebar_class:'sidebar-dark-primary'); ?> elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo e(aurl('/')); ?>" class="brand-link <?php echo e(!empty(setting()->theme_setting) && !empty(setting()->theme_setting->brand_color)?setting()->theme_setting->brand_color:''); ?>">
    <?php if(!empty(setting()->logo)): ?>
    <img src="<?php echo e(it()->url(setting()->logo)); ?>" alt="<?php echo e(setting()->{l('sitename')}); ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
    <?php endif; ?>
    <span class="brand-text font-weight-light"><?php echo e(setting()->{l('sitename')}); ?></span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <?php if(!empty(admin()->user()->photo_profile)): ?>
        <img src="<?php echo e(it()->url(admin()->user()->photo_profile)); ?>" class="img-circle elevation-2" alt="<?php echo e(admin()->user()->name); ?>">
        <?php else: ?>
        <img src="<?php echo e(url('assets')); ?>/img/avatar5.png" class="img-circle elevation-2" alt="<?php echo e(admin()->user()->name); ?>">
        <?php endif; ?>
      </div>
      <div class="info">
        <a href="<?php echo e(aurl('account')); ?>" class="d-block"><?php echo e(admin()->user()->name); ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<?php /**PATH E:\xampp\htdocs\dream\resources\views/admin/layouts/navbar.blade.php ENDPATH**/ ?>