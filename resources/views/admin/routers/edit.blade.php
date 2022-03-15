@extends('admin.index')
@section('content')
@include('admin.ajax',[
	'typeForm'=>'edit',
	'selectID'=>'region_id',
	'parentValue'=>$routers->region_id,
	'outputClass'=>'street_id',
	'selectedvalue'=>$routers->street_id,
	'url'=>aurl('routers/get/street/id'),
])


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
				<a href="{{aurl('routers')}}" class="dropdown-item" style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
				<a href="{{aurl('routers/'.$routers->id)}}" class="dropdown-item" style="color:#343a40">
				<i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
				<a class="dropdown-item" style="color:#343a40" href="{{aurl('routers/create')}}">
					<i class="fa fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$routers->id}}" class="dropdown-item" style="color:#343a40" href="#">
					<i class="fa fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$routers->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}}  ({{$routers->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['routers.destroy', $routers->id]
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
										
{!! Form::open(['url'=>aurl('/routers/'.$routers->id),'method'=>'put','id'=>'routers','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
    <div class="form-group">
        {!! Form::label('router_number',trans('admin.router_number'),['class'=>'control-label']) !!}
        {!! Form::text('router_number', $routers->router_number ,['class'=>'form-control','placeholder'=>trans('admin.router_number')]) !!}
    </div>
</div>
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-4">
		<div class="form-group">
				{!! Form::label('region_id',trans('admin.region_id'),['class'=>'control-label']) !!}
{!! Form::select('region_id',App\Models\Region::pluck('regionsName','id'), $routers->region_id ,['class'=>'form-control select2','placeholder'=>trans('admin.region_id')]) !!}
		</div>
</div>
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-4">
		<div class="form-group">
				{!! Form::label('street_id',trans('admin.street_id'),['class'=>'control-label']) !!}
		<span class="street_id"></span>
		</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('address',trans('admin.address'),['class'=>'control-label']) !!}
        {!! Form::text('address', $routers->address ,['class'=>'form-control','placeholder'=>trans('admin.address')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('note',trans('admin.note'),['class'=>'control-label']) !!}
        {!! Form::text('note', $routers->note ,['class'=>'form-control','placeholder'=>trans('admin.note')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('ip_router',trans('admin.ip_router'),['class'=>'control-label']) !!}
        {!! Form::text('ip_router', $routers->ip_router ,['class'=>'form-control','placeholder'=>trans('admin.ip_router')]) !!}
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