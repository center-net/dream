@extends('admin.index')
@section('content')
@include('admin.ajax',[
	'typeForm'=>'edit',
	'selectID'=>'region_id',
	'parentValue'=>$subscribers->region_id,
	'outputClass'=>'street_id',
	'selectedvalue'=>$subscribers->street_id,
	'url'=>aurl('subscribers/get/street/id'),
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
				<a href="{{aurl('subscribers')}}" class="dropdown-item" style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
				<a href="{{aurl('subscribers/'.$subscribers->id)}}" class="dropdown-item" style="color:#343a40">
				<i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
				<a class="dropdown-item" style="color:#343a40" href="{{aurl('subscribers/create')}}">
					<i class="fa fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$subscribers->id}}" class="dropdown-item" style="color:#343a40" href="#">
					<i class="fa fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$subscribers->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}}  ({{$subscribers->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['subscribers.destroy', $subscribers->id]
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

{!! Form::open(['url'=>aurl('/subscribers/'.$subscribers->id),'method'=>'put','id'=>'subscribers','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-4 col-lg-4 col-sm-4 col-xs-6">
    <div class="form-group">
        {!! Form::label('subscriberName',trans('admin.subscriberName'),['class'=>'control-label']) !!}
        {!! Form::text('subscriberName', $subscribers->subscriberName ,['class'=>'form-control','placeholder'=>trans('admin.subscriberName')]) !!}
    </div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-6">
    <div class="form-group">
        {!! Form::label('mobile',trans('admin.mobile'),['class'=>'control-label']) !!}
        {!! Form::text('mobile', $subscribers->mobile ,['class'=>'form-control','placeholder'=>trans('admin.mobile')]) !!}
    </div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-6">
    <div class="form-group">
            {!! Form::label('type',trans('admin.type'),['class'=>'control-label']) !!}
            {!! Form::select('type',['0'=>'منزلي','1'=>'هوت سبوت',], $subscribers->type ,['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
    </div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-6">
		<div class="form-group">
				{!! Form::label('region_id',trans('admin.region_id'),['class'=>'control-label']) !!}
{!! Form::select('region_id',App\Models\Region::pluck('regionsName','id'), $subscribers->region_id ,['class'=>'form-control select2','placeholder'=>trans('admin.region_id')]) !!}
		</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-6">
		<div class="form-group">
				{!! Form::label('street_id',trans('admin.street_id'),['class'=>'control-label']) !!}
		<span class="street_id"></span>
		</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-6">
    <div class="form-group">
        {!! Form::label('address',trans('admin.address'),['class'=>'control-label']) !!}
        {!! Form::text('address', $subscribers->address ,['class'=>'form-control','placeholder'=>trans('admin.address')]) !!}
    </div>
</div>
<div class="col-md-8 col-lg-8 col-sm-8 col-xs-12">
    <div class="form-group">
        {!! Form::label('note',trans('admin.note'),['class'=>'control-label']) !!}
        {!! Form::textarea('note', $subscribers->note ,['class'=>'form-control','placeholder'=>trans('admin.note')]) !!}
    </div>
</div>

</div>
		<!-- /.row -->
		</div>
	<!-- /.card-body -->
	<div class="card-footer">
        <button type="submit" name="save" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save') }}</button>
        <button type="submit" name="save_back" class="btn btn-success btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save_back') }}</button>
    {!! Form::close() !!}
</div>
</div>
@endsection
