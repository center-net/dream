<div class="col-md-3 col-sm-6 col-12">
    <div class="info-box">
      <span class="info-box-icon bg-primary"><i class="fa fa-icons"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">أعطال في اتظار الصيانة</span>
        <span class="info-box-number">{{ mK(App\Models\Ticket::count()) - (mK(App\Models\Ticket::where('status','6')->count()) + mK(App\Models\Ticket::where('status','5')->count())) }}</span>
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
      <span class="info-box-text">أعطال {{ trans("admin.5") }} اليوم</span>
      <span class="info-box-number">{{ $updated_at}}</span>
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
        <span class="info-box-number">{{ $created_at }}</span>
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
        <span class="info-box-number">{{ mK(App\Models\Ticket::count())}}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
