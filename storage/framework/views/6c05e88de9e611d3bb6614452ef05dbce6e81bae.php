<!DOCTYPE html>
<html lang="<?php echo e(app('l')); ?>" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo e(trans('admin.lock_screen')); ?></title>
        <!-- Google Font: Source Sans Pro -->
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo e(url('assets')); ?>/plugins/fontawesome-free/css/all.min.css">
        <!-- Custom style for RTL -->
        <!-- Theme style -->
        <?php if(app('l') == 'ar'): ?>
        <link rel="stylesheet" href="<?php echo e(url('assets')); ?>/css/adminlte-rtl.css">
        <link rel="stylesheet" href="<?php echo e(url('assets')); ?>/css/custom.css">
        <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(url('assets')); ?>/css/adminlte.css">
        <?php endif; ?>
        <?php if(!empty(setting()->icon)): ?>
        <link rel="shortcut icon" href="<?php echo e(it()->url(setting()->icon)); ?>" />
        <?php endif; ?>
        <link rel="stylesheet" href="<?php echo e(url('assets')); ?>/css/cairo.css">
    </head>
    <body class="hold-transition lockscreen">
        <!-- Automatic element centering -->
        <div class="lockscreen-wrapper">
            <div class="lockscreen-logo">
                <a href="<?php echo e(aurl('screen')); ?>" class="h1">
                    <?php if(!empty(setting()->logo)): ?>
                    <img src="<?php echo e(it()->url(setting()->logo)); ?>" alt="<?php echo e(setting()->{l('sitename')}); ?>" style="width:48px;height: 48px" />
                    <?php else: ?>
                    <?php echo e(setting()->{l('sitename')}); ?>

                    <?php endif; ?>
                </a>
            </div>
            <!-- User name -->
            <div class="lockscreen-name"><?php echo e($admin->name); ?></div>
            <?php if(session()->has('error')): ?>
            <div class="alert alert-warning alert-dismissible" dir="<?php echo e(app('dir')); ?>">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <center>
                    <h6><?php echo e(session('error')); ?></h6>
                </center>
            </div>
            <?php endif; ?>
            <!-- START LOCK SCREEN ITEM -->
            <div class="lockscreen-item">
                <!-- lockscreen image -->
                <div class="lockscreen-image">
                    <?php if(!empty($admin->photo_profile)): ?>
                    <img src="<?php echo e(it()->url($admin->photo_profile)); ?>" alt="<?php echo e($admin->name); ?>">
                    <?php else: ?>
                    <img src="<?php echo e(url('assets')); ?>/img/avatar5.png" alt="<?php echo e($admin->name); ?>">
                    <?php endif; ?>
                </div>
                <!-- /.lockscreen-image -->
                <!-- lockscreen credentials (contains the form) -->
                <form method="post" class="lockscreen-credentials" action="<?php echo e(aurl('login')); ?>">
                    <?php echo view('honeypot::honeypotFormFields'); ?>
                    <input type="hidden" name="_method" value="POST">
                    <?php echo csrf_field(); ?>

                    <div class="input-group">
                        <input type="hidden" name="email" value="<?php echo e($admin->email); ?>">
                        <input type="password" name="password" class="form-control" placeholder="<?php echo e(trans('admin.password')); ?>">
                        <div class="input-group-append">
                            <button type="submit" class="btn"><i class="fas fa-arrow-right text-muted"></i></button>
                        </div>
                    </div>
                </form>
                <!-- /.lockscreen credentials -->
            </div>
            <!-- /.lockscreen-item -->
            <div class="help-block text-center">
                <?php echo e(trans('admin.password_retrieve_session')); ?>

            </div>
            <div class="text-center">
                <a href="<?php echo e(aurl('login')); ?>"><?php echo e(trans('admin.or_sign_different_user')); ?></a>
            </div>
            <div class="text-center">
                <?php if(count(L::all()) > 0): ?>
                <hr />
                <center>
                <?php
                $i = 0;
                ?>
                <?php $__currentLoopData = L::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a style="color:<?php echo e(app('l') == $lang?'#c33':'#343a40'); ?>" href="<?php echo e(aurl('lang/'.$lang)); ?>"><?php echo e(trans('admin.'.$lang)); ?></a>
                <?php
                $i++;
                ?>
                <?php echo e($i < count(L::all()) ?'.':''); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </center>
                <?php endif; ?>
            </div>
        </div>
        <!-- /.center -->
        <!-- jQuery -->
        <script src="<?php echo e(url('assets')); ?>/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo e(url('assets')); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html><?php /**PATH /home/helplgvr/public_html/dream/resources/views/admin/lock_screen.blade.php ENDPATH**/ ?>