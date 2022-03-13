@extends('admin.index')
@section('content')


<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<span>{{!empty($title)?$title:''}}</span>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
			<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="{{aurl('tickets')}}" class="dropdown-item" style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
				<a href="{{aurl('tickets/'.$tickets->id)}}" class="dropdown-item" style="color:#343a40">
				<i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
				<a class="dropdown-item" style="color:#343a40" href="{{aurl('tickets/create')}}">
					<i class="fa fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$tickets->id}}" class="dropdown-item" style="color:#343a40" href="#">
					<i class="fa fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$tickets->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}}  ({{$tickets->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['tickets.destroy', $tickets->id]
						]) !!}
						{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger btn-flat']) !!}
						<a class="btn btn-default btn-flat" data-dismiss="modal">{{trans('admin.cancel')}}</a>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
		@endpush
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">

{!! Form::open(['url'=>aurl('/tickets/'.$tickets->id),'method'=>'put','id'=>'tickets','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-4 col-lg-4 col-sm-4 col-xs-6">
		<div class="form-group">
				{!! Form::label('subscriber_id',trans('admin.subscriber_id'),['class'=>'control-label']) !!}
{!! Form::select('subscriber_id',App\Models\Subscriber::pluck('subscriberName','id'), $tickets->subscriber_id ,['class'=>'form-control select2','placeholder'=>trans('admin.subscriber_id')]) !!}
		</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-6">
		<div class="form-group">
				{!! Form::label('status',trans('admin.status'),['class'=>'control-label']) !!}
{!! Form::select('status',['1'=>'مستعجل','2'=>'مهمة','3'=>'عادية'], $tickets->status ,['class'=>'form-control select2','placeholder'=>trans('admin.status')]) !!}
		</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-6">
		<div class="form-group">
				{!! Form::label('damage_id',trans('admin.damage_id'),['class'=>'control-label']) !!}
{!! Form::select('damage_id',App\Models\Damage::pluck('damageName','id'), $tickets->damage_id ,['class'=>'form-control select2','placeholder'=>trans('admin.damage_id')]) !!}
		</div>
</div>
<div class="col-md-10 col-lg-10 col-sm-10 col-xs-12">
    <div class="form-group">
        {!! Form::label('note',trans('admin.note'),['class'=>'control-label']) !!}
        {!! Form::text('note', $tickets->note ,['class'=>'form-control','placeholder'=>trans('admin.note')]) !!}
    </div>
</div>

</div>
		<!-- /.row -->
		</div>
	<!-- /.card-body -->
	<div class="card-footer"><button type="submit" name="save" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save') }}</button>
<button type="submit" name="save_back" class="btn btn-success btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save_back') }}</button>
{!! Form::close() !!}
</div>
</div>
@endsection
