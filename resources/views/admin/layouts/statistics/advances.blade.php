<!--{{App\Models\Advance::whereBetween('created_at',[$from, $to])->get();}}-->

@if(admin()->user()->role('advances_show'))
@foreach ($adminalls as $adminall)
@if (!$adminall->salarie_id->isEmpty())
<div class="col-md-4 col-sm-6 col-12">
    <div class="info-box" id="totale_salarie">
      <button class="info-box-icon bg-primary" id="rest{{$adminall->id}}" data-toggle="modal"  data-target="#exchange_rank{{$adminall->id}}">
             @foreach ($adminall->salarie_id as $sal)
           {{($sal->salarie + $sal->previous_balance + $sal->reward) - $sal->discount}}
           @endforeach
          </button>
      <div class="modal" id="exchange_rank{{$adminall->id}}">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">صرف راتب {{$adminall->first_name." ". $adminall->last_name}}</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                {!! Form::open(['url'=>aurl('/advances'),'id'=>'advances','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
                <div class="row">
                    <input type="hidden" name="status" value="yes">
                    <input type="hidden" name="admin_id" value="{{$adminall->id}}">
                    <input type="hidden" name="totale" id="totale" value="">
                    <input type="hidden" name="salarie" id="salarie" value="">
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('advance','باقي الراتب',['class'=>' control-label']) !!}
                            {!! Form::text('advance',old('advance'),['class'=>'form-control','id'=>'advance','placeholder'=>trans('admin.advance')]) !!}
                    </div>
                </div>

                </div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
            <div class="card-footer"><button type="submit" name="add" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> {{ trans('admin.add') }}</button>
        {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
      <div class="info-box-content">
        <span class="info-box-text">{{$adminall->first_name." ". $adminall->last_name}}</span>

        @foreach ($adminall->salarie_id as $sal)
        <span class="info-box-text">الراتب الإسبوعي
        <span class="badge badge-info" id="salarie{{$adminall->id}}">
                {{$sal->salarie}}
            </span>
        </span>
        <span class="info-box-text">رصيد سابق
            <span class="badge badge-info" id="previous_balance{{$adminall->id}}">
                {{$sal->previous_balance}}
            </span>
        </span>
        <span class="info-box-text">الخصومات
            <span class="badge badge-danger" id="discount{{$adminall->id}}">
                {{$sal->discount}}
            </span>
        </span>
        <span class="info-box-text">المكافئات
            <span class="badge badge-info" id="reward{{$adminall->id}}">
                {{$sal->reward}}
            </span>
        </span>
        @endforeach

        <span class="info-box-text">إجمالي السلف <span class="badge badge-danger" id="totale{{$adminall->id}}">0</span></span>
      </div>
      <span class="info-box-icon bg-primary">
        <span class="info-box-icon bg-primary" style="font-size: large;" id="totale_rest{{$adminall->id}}">           @foreach ($adminall->salarie_id as $sal)
           {{($sal->salarie + $sal->previous_balance + $sal->reward) - $sal->discount}}
           @endforeach</span>
      </span>
      <!-- /.info-box-content -->
    </div>
      <div class="card card-dark collapsed-card">
        <div class="card-header">
            <div class="card-tools" >
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                    <h3 class="card-title">
                        <span class="info-box-text">تفاصيل السلف</span>
                    </h3>
                </button>

            </div>
        </div>

        <div class="card-body">
            <div class="row">

                <table class="table table-hover" >
                    <thead>
                        <tr>
                          <th>قيمة السلفة</th>
                          <th>تاريخ </th>
                          <th>الوصف </th>
                          <th>الإجراء </th>
                        </tr>
                      </thead>
                      <tbody id="totale_advan{{$adminall->id}}">
                        @foreach (App\Models\Advance::whereBetween('created_at',[$from, $to])->where('admin_id',$adminall->id)->get() as $advan)
                        <tr>
                            <td>{{$advan->advance}}</td>
                            @if ($advan->status == 'yes')
                            <td  id="advance{{$advan->admin_id}}"style="display: none;">{{$advan->advance}}</td>
                            @endif
                            <td>{{$advan->created_at}}</td>
                            <td>{{$advan->description}}</td>
                            <td>
                                @if ($advan->status == 'yes')
                                <button type="submit" class="btn btn-flat btn-sm btn-danger">تمت الموافقة</button>
                                @else
                                <form action="{{ route('advances.destroy', $advan->id) }}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')

                                <button type="submit" class="btn btn-flat btn-sm btn-danger">رفض</button>
                                </form>
                                <button type="button" class="btn btn-flat btn-sm btn-primary" data-toggle="modal" data-target="#yes{{$advan->id}}">
                                      موافقة
                                </button>
                                @endif
                            </td>
                        </tr>
                        <div class="modal fade" id="yes{{$advan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                {!! Form::open(['url'=>aurl('/advances/'.$advan->id),'method'=>'put','id'=>'advances','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
                                <div class="row">

                                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        {!! Form::label('advance',trans('admin.advance'),['class'=>'control-label']) !!}
                                        {!! Form::text('advance', $advan->advance ,['class'=>'form-control','placeholder'=>trans('admin.advance')]) !!}
                                    </div>
                                </div>

                                </div>
                                		<!-- /.row -->
                                		</div>
                                	<!-- /.card-body -->
                                	<div class="card-footer"><button type="submit" name="save" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save') }}</button>

                                {!! Form::close() !!}
                              </div>
                            </div>
                          </div>
                        </div>
                        @push('js')
                        <script type='text/javascript'>
                       $("#totale_salarie").ready(function() {
                                    var salarie = 0;
                                    var previous_balance = 0;
                                    var totale = 0;
                                    var rest = 0;
                                    var advance = 0;
                                    var total_advance = 0;
                                    $('#salarie{{$adminall->id}}').each(function(index) {
                                        salarie = parseFloat($(this).html());
                                    });
                                    $('#previous_balance{{$adminall->id}}').each(function(index) {
                                        previous_balance = parseFloat($(this).html());
                                    });
                                    $('#reward{{$adminall->id}}').each(function(index) {
                                        reward = parseFloat($(this).html());
                                    });
                                   $('#discount{{$adminall->id}}').each(function(index) {
                                        discount = parseFloat($(this).html());
                                    });
                                    $('#totale_rest{{$adminall->id}}').each(function(index) {
                                        totale_rest = parseFloat($(this).html());
                                    });
                                    
                                    $('#totale_advan{{$adminall->id}} #advance{{$advan->admin_id}}').each(function(index) {
                                        advance += parseFloat($(this).html());
                                    });


                                    $("#totale{{$adminall->id}}").html(advance);
                                    total_advance = ((totale_rest) - (advance));
                                    
                                    if(total_advance >= 0){

                                        $('#rest{{$adminall->id}}').html('<span class="info-box-icon bg-primary"style="font-size: large;">صرف<br>الباقي<br>' + total_advance + '</span>');
                                    }else if(total_advance < 0){
                                        $('#rest{{$adminall->id}}').html('<span class="info-box-icon bg-danger"style="font-size: large;">المديونية<br>' + total_advance + '</span>');
                                    }

                                    $('#exchange_rank{{$adminall->id}}').on('show.bs.modal', function (event) {
                                    var modal = $(this)
                                    modal.find('.modal-body #advance').val(total_advance)
                                    modal.find('.modal-body #totale').val(advance)
                                    modal.find('.modal-body #salarie').val(salarie)
                                })

                                });

                                // $.ajax({
                                // type:'POST',
                                // url:"aurl('/salaries/'.$salaries->id)",
                                // data:{salarie:salarie},
                                // success:function(data){
                                //     alert(data.success);
                                // }
                                // });
                          </script>
                        @endpush
                    @endforeach
                      </tbody>
                    </table>
            </div>
        </div>
    </div>


    <!-- /.info-box -->
  </div>
  @endif
@endforeach
@else
<div class="card card-dark ">
	<div class="card-header">
		<div class="card-tools" id="totale_salarie">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                <h3 class="card-title">
                    {{admin()->user()->first_name." ". admin()->user()->last_name}}

                    <span class="badge card-header">الراتب الإسبوعي</span>
                        @foreach (admin()->user()->salarie_id as $sal)
                        <span class="badge badge-info" id="salarie{{admin()->user()->id}}">
                            {{$sal->salarie}}
                            </span>
                            <span class="info-box-text">الخصومات
                                <span class="badge badge-danger" id="discount{{admin()->user()->id}}">
                                    {{$sal->discount}}
                                </span>
                            </span>
                            <span class="info-box-text">المكافئات
                                <span class="badge badge-info" id="reward{{admin()->user()->id}}">
                                    {{$sal->reward}}
                                </span>
                            </span>
                        @endforeach

                    <span class="badge card-header" >إجمالي السلف لهذا الأسبوع</span>
                    <span class="badge badge-danger" id="totale{{admin()->user()->id}}">0</span>

                    <span class="badge card-header">باقي الراتب</span>
                    <span  id="rest{{admin()->user()->id}}">0</span>

                </h3>
            </button>

		</div>
	</div>

    <div class="card-body">
        <div class="">

            <table class="table table-hover" >
                <thead>
                    <tr>
                      <th>الحالة</th>
                      <th>قيمة السلفة</th>
                      <th>تاريخ </th>
                    </tr>
                  </thead>
                  <tbody id="totale_advan{{admin()->user()->id}}">
                      @foreach (App\Models\Advance::whereBetween('created_at',[$from, $to])->where('admin_id',admin()->user()->id)->get() as $advan)
                    
                    <tr>
                        <td>
                            @if ($advan->status == 'yes')
                            <button type="submit" class="btn btn-flat btn-sm btn-success">تمت الموافقة</button>
                            @else
                            <button type="submit" class="btn btn-flat btn-sm btn-danger">إنتظار الموافقة</button>
                            @endif

                        </td>
                        <td>{{$advan->advance}}</td>
                        @if ($advan->status == 'yes')
                        <td  id="advance{{$advan->admin_id}}"style="display: none;">{{$advan->advance}}</td>
                        @endif
                        <td>{{$advan->created_at}}</td>
                    </tr>
                    @push('js')
                    <script type='text/javascript'>
                              $("#totale_salarie").ready(function() {
                                    var salarie = 0;
                                    var previous_balance = 0;
                                    var totale = 0;
                                    var rest = 0;
                                    var advance = 0;
                                    var total_advance = 0;
                                    $('#salarie{{admin()->user()->id}}').each(function(index) {
                                        salarie = parseFloat($(this).html());
                                    });
                                    $('#previous_balance{{admin()->user()->id}}').each(function(index) {
                                        previous_balance = parseFloat($(this).html());
                                    });
                                    $('#totale_advan{{admin()->user()->id}} #advance{{$advan->admin_id}}').each(function(index) {
                                        advance += parseFloat($(this).html());
                                    });


                                    $("#totale{{admin()->user()->id}}").html(advance);
                                    total_advance = (salarie - advance + previous_balance);
                                    if(total_advance >= 0){

                                        $('#rest{{admin()->user()->id}}').html('<span class="info-box-icon bg-primary"style="font-size: large;">صرف الباقي ' + total_advance + '</span>');
                                    }else{
                                        $('#rest{{admin()->user()->id}}').html('<span class="info-box-icon bg-danger"style="font-size: large;">المديونية ' + total_advance + '</span>');
                                    }


                                });
                      </script>
                    @endpush
                @endforeach
                  </tbody>
                </table>
        </div>

	</div>
</div>
@endif
