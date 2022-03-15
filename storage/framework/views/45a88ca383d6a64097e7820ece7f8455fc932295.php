<div class="col-md-3 col-sm-6 col-12">
    <div class="info-box">
      <span class="info-box-icon bg-primary"><i class="fa fa-icons"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">أعطال في اتظار الصيانة</span>
        <span class="info-box-number"><?php echo e(mK(App\Models\Ticket::count()) - (mK(App\Models\Ticket::where('status','6')->count()) + mK(App\Models\Ticket::where('status','5')->count()))); ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
<!--actions_start-->
<div class="col-md-3 col-sm-6 col-12">
  <div class="info-box">
    <span class="info-box-icon bg-primary"><i class="fa fa-icons"></i></span>
    <div class="info-box-content">
      <span class="info-box-text">أعطال <?php echo e(trans("admin.5")); ?> اليوم</span>
      <span class="info-box-number"><?php echo e($updated_at); ?></span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
</div>
<div class="col-md-3 col-sm-6 col-12">
    <div class="info-box">
      <span class="info-box-icon bg-primary"><i class="fa fa-icons"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">أعطال اليوم</span>
        <span class="info-box-number"><?php echo e($created_at); ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

  <div class="col-md-3 col-sm-6 col-12">
    <div class="info-box">
      <span class="info-box-icon bg-primary"><i class="fa fa-icons"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">مجمل الأعطال</span>
        <span class="info-box-number"><?php echo e(mK(App\Models\Ticket::count())); ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

<!--categories_start-->
<div class="col-md-3 col-sm-6 col-12">
  <div class="info-box">
    <span class="info-box-icon bg-primary"><i class="fa fa-icons"></i></span>
    <div class="info-box-content">
      <span class="info-box-text"><?php echo e(trans("admin.categories")); ?></span>
      <span class="info-box-number"><?php echo e(mK(App\Models\Category::count())); ?></span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
</div>
<!--categories_end--><?php /**PATH /home/helplgvr/public_html/dream/resources/views/admin/layouts/statistics/module_counters.blade.php ENDPATH**/ ?>