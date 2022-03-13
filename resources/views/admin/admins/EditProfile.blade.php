@extends('admin.index')
@section('content')
<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<a>{{!empty($title)?$title:''}}</a>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
			<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="{{aurl('admins')}}" class="dropdown-item" style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}}</a>
				<a class="dropdown-item" href="{{aurl('admins/'.$admins->id)}}" style="color:#343a40">
					<i class="fa fa-eye"></i> {{trans('admin.show')}}
				</a>
				<a class="dropdown-item" href="{{aurl('admins/create')}}" style="color:#343a40">
					<i class="fa fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$admins->id}}" class="dropdown-item" href="#" style="color:#343a40">
					<i class="fa fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$admins->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$admins->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['admins.destroy', $admins->id]
						]) !!}
						{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
						<a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
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
			{!! Form::open(['url'=>aurl('/admins/'.$admins->id),'method'=>'put','id'=>'admins','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('first_name',trans('admin.first_name'),['class'=>'control-label']) !!}
					{!! Form::text('first_name', $admins->first_name ,['class'=>'form-control','placeholder'=>trans('admin.first_name')]) !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('last_name',trans('admin.last_name'),['class'=>'control-label']) !!}
					{!! Form::text('last_name', $admins->last_name ,['class'=>'form-control','placeholder'=>trans('admin.last_name')]) !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('mobile',trans('admin.mobile'),['class'=>'control-label']) !!}
					{!! Form::text('mobile', $admins->mobile ,['class'=>'form-control','placeholder'=>trans('admin.mobile')]) !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('username',trans('admin.username'),['class'=>'control-label']) !!}
					{!! Form::text('username', $admins->username ,['class'=>'form-control','placeholder'=>trans('admin.username'),'readonly']) !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('password',trans('admin.password'),['class'=>'control-label']) !!}
					{!! Form::password('password',['class'=>'form-control','placeholder'=>trans('admin.password')]) !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label for="photo_profile">{{ trans('admin.photo_profile') }}</label>
							<div class="input-group">
								<div class="custom-file">
									{!! Form::file('photo_profile',['class'=>'custom-file-input','placeholder'=>trans('admin.photo_profile')]) !!}
									{!! Form::label('photo_profile',trans('admin.photo_profile'),['class'=>'custom-file-label']) !!}
								</div>
								<div class="input-group-append">
									<span class="input-group-text" id="">{{ trans('admin.upload') }}</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<br />
						@include("admin.show_image",["image"=>$admins->photo_profile])
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('email',trans('admin.email'),['class'=>'control-label']) !!}
					{!! Form::email('email', $admins->email ,['class'=>'form-control','placeholder'=>trans('admin.email')]) !!}
				</div>
			</div>

		</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
		{!! Form::submit(trans('admin.save'),['class'=>'btn btn-success btn-flat']) !!}
		{!! Form::close() !!}
	</div>
</div>
@endsection
