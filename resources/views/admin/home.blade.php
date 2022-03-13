@extends('admin.index')
@section('content')
<div class="row">
  <section class="col-lg-12 connectedSortable">
    <div class="card" item_name="statistics">
      <div class="card-header d-flex p-0">
        <h3 class="card-title p-3">
        <i class="fas fa-calculator mr-1"></i>
        Statistics
        </h3>
        </div><!-- /.card-header -->
          <div class="card-body">
            <div class="row">
          @include('admin.layouts.statistics.module_counters')
        </div>
          </div><!-- /.card-body -->
        </div>
  </section>
</div>
@if(admin()->user()->role('advances_show'))
@if($advances2->count() > 0)
<div class="row">
    <section class="col-lg-12 ">
      <div class="card" item_name="statistics">
        <div class="card-header d-flex p-0">
          <h3 class="card-title p-3">
          <i class="fas fa-calculator mr-1"></i>
          {{ trans("admin.advances") }}
          
          </h3>
          </div><!-- /.card-header -->
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
                  <tbody id="totale_advan{{admin()->user()->id}}">
                    @foreach ($advances2 as $advan)
                    <tr>
                            <td>{{
                            App\Models\Admin::find($advan->admin_id)->first_name." ". 
                            App\Models\Admin::find($advan->admin_id)->last_name}}</td>
                            <td>{{$advan->advance}}</td>
                            <td>{{$advan->created_at}}</td>
                            <td>{{$advan->description}}</td>
                            <td>
                                <form action="{{ route('advances.destroy', $advan->id) }}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')

                                <button type="submit" class="btn btn-flat btn-sm btn-danger">رفض</button>
                                </form>
                                <button type="button" class="btn btn-flat btn-sm btn-primary" data-toggle="modal" data-target="#yes{{$advan->id}}">
                                      موافقة
                                </button>
                                
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
                @endforeach
                  </tbody>
                </table>
        </div>
            </div><!-- /.card-body -->
          </div>
    </section>
  </div>
@endif
@endif
<div class="row">
    <section class="col-lg-12 ">
      <div class="card" item_name="statistics">
        <div class="card-header d-flex p-0">
          <h3 class="card-title p-3">
          <i class="fas fa-calculator mr-1"></i>
          {{ trans("admin.advances") }}
          </h3>
          </div><!-- /.card-header -->
            <div class="card-body">
                <div class="row">
            @include('admin.layouts.statistics.advances')
        </div>
            </div><!-- /.card-body -->
          </div>
    </section>
  </div>

    @endsection
