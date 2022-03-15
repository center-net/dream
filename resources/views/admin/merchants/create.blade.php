@extends('admin.index')
@section('content')


<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<span>
			{{ !empty($title)?$title:'' }}
			</span>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
			<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="{{ aurl('merchants') }}"  style="color:#343a40"  class="dropdown-item">
				<i class="fas fa-list"></i> {{ trans('admin.show_all') }}</a>
			</div>
		</div>
		</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
								
{!! Form::open(['url'=>aurl('/merchants'),'id'=>'merchants','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
    <div class="form-group">
        {!! Form::label('mrchant_name',trans('admin.mrchant_name'),['class'=>' control-label']) !!}
            {!! Form::text('mrchant_name',old('mrchant_name'),['class'=>'form-control','placeholder'=>trans('admin.mrchant_name')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
    <div class="form-group">
        {!! Form::label('mobile',trans('admin.mobile'),['class'=>' control-label']) !!}
            {!! Form::text('mobile',old('mobile'),['class'=>'form-control','placeholder'=>trans('admin.mobile')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
	<div class="form-group">
		{!! Form::label('category_id',trans('admin.category_id')) !!}
		{!! Form::select('category_id',App\Models\Category::pluck('category_name','id'),old('category_id'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
	<div class="form-group">
		{!! Form::label('status',trans('admin.status')) !!}
		{!! Form::select('status',['yes'=>trans('admin.yes'),'no'=>trans('admin.no'),],old('status'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>

</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer"><button type="submit" name="add" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> {{ trans('admin.add') }}</button>
<button type="submit" name="add_back" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> {{ trans('admin.add_back') }}</button>
{!! Form::close() !!}	</div>
</div>
@endsection