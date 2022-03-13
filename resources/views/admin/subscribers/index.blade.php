@extends('admin.index')
@section('content')
{!! Form::open(["method" => "post","url" => [aurl('/subscribers/multi_delete')]]) !!}
<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">{{!empty($title)?$title:''}}</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="row">
			<div class="table-responsive">
			{!! $dataTable->table(["class"=> "table table-striped table-bordered table-hover table-checkable dataTable no-footer"],true) !!}
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
	</div>
</div>
<div class="modal fade" id="multi_delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
					<h4 class="modal-title">{{trans("admin.delete")}} </h4>
					<button class="close" data-dismiss="modal">x</button>
			</div>
			<div class="modal-body">
					<div class="delete_done"><i class="fa fa-exclamation-triangle"></i> {{trans("admin.ask-delete")}} <span id="count"></span> {{trans("admin.record")}} </div>
					<div class="check_delete">{{trans("admin.check-delete")}}</div>
			</div>
			<div class="modal-footer">
					{!! Form::submit(trans("admin.approval"), ["class" => "btn btn-danger btn-flat delete_done"]) !!}
					<a class="btn btn-default" data-dismiss="modal">{{trans("admin.cancel")}}</a>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}

<div class="modal fade" id="addticket">
	<div class="modal-dialog ">
		<div class="modal-content" style="width: 140%;">
			<div class="modal-header ">
					<h4 class="modal-title">addticket </h4>
					<button class="close" data-dismiss="modal">x</button>
			</div>
			<div class="modal-body">
                <div class="card-body">

                    {!! Form::open(['url'=>aurl('/tickets'),'id'=>'tickets','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
                    <div class="row">
                        <input type="hidden" class="subscriber_id" name="subscriber_id" value="">
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-6">
                        <div class="form-group">
                            {!! Form::label('status','حالة العطل') !!}
                            {!! Form::select('status',['1'=>'مستعجل','2'=>'مهمة','3'=>'عادية'],old('status'),['class'=>'form-control select2','style'=>'width: 100%','placeholder'=>trans('admin.choose')]) !!}
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-6">
                        <div class="form-group">
                            {!! Form::label('damage_id',trans('admin.damage_id')) !!}
                            {!! Form::select('damage_id',App\Models\Damage::pluck('damageName','id'),old('damage_id'),['class'=>'form-control select2','style'=>'width: 100%','placeholder'=>trans('admin.choose')]) !!}
                        </div>
                    </div>
                    <div class="col-md-10 col-lg-10 col-sm-10 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('note',trans('admin.note'),['class'=>' control-label']) !!}
                                {!! Form::text('note',old('note'),['class'=>'form-control','placeholder'=>trans('admin.note')]) !!}
                        </div>
                    </div>
                    </div>
                            <!-- /.row -->
                        </div>
			</div>
			<div class="modal-footer">
                <button type="submit" name="add" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> {{ trans('admin.add') }}</button>
                {!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@push('js')
{!! $dataTable->scripts() !!}
<script>
$('#addticket').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    var modal = $(this)
    modal.find('.modal-body .subscriber_id').val( recipient)
  })
</script>
@endpush
@endsection
