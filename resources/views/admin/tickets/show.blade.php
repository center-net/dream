@extends('admin.index')
@section('content')
<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">


            @if ($tickets->status == 6)
            <button type="submit" class="btn btn-flat btn-sm btn-primary">العطل مغلق</button>
            @else
                 @if(admin()->user()->role("tickets_edit"))
            <form action="{{ route('closed', $tickets->id) }}" method="post" style="display: inline-block">
                @csrf
                @method('PUT')
            <input type="hidden" name="ticket_id" value="{{$tickets->id}}">
            <button type="submit" class="btn btn-flat btn-sm btn-primary">إغلاق التذكرة</button>
        </form>

                <form action="{{ route('reconsidering', $tickets->id) }}" method="post" style="display: inline-block">
                    @csrf
                    @method('PUT')
                <input type="hidden" name="ticket_id" value="{{$tickets->id}}">
                <button type="submit" class="btn btn-flat btn-sm btn-primary">إعدتها للصيانة</button>
            </form>
            @endif
            @endif


			<a>{{!empty($title)?$title:''}}</a>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
				<span class="sr-only"></span>
			</a>

			<div class="dropdown-menu" role="menu">
				<a href="{{aurl('tickets')}}" class="dropdown-item"  style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}}</a>
                @if(admin()->user()->role("tickets_edit"))
				<a class="dropdown-item"  style="color:#343a40" href="{{aurl('tickets/'.$tickets->id.'/edit')}}">
					<i class="fas fa-edit"></i> {{trans('admin.edit')}}
				</a>
                @endif
				<div class="dropdown-divider"></div>
                @if(admin()->user()->role("tickets_delete"))
				<a data-toggle="modal" data-target="#deleteRecord{{$tickets->id}}" class="dropdown-item"  style="color:#343a40" href="#">
					<i class="fas fa-trash"></i> {{trans('admin.delete')}}
				</a>
                @endif
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
						<i class="fa fa-exclamation-triangle"></i>  {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$tickets->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
               'method' => 'DELETE',
               'route' => ['tickets.destroy', $tickets->id]
               ]) !!}
                {!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger btn-flat']) !!}
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

	<!-- /.card-header -->
	<div class="card-body">

        <div class="row">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>إسم المشترك</th>
                    <th>العطل</th>
                    <th>الحالة</th>
                    <th>تاريخ التذكرة</th>
                  </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{$tickets->subscriber_id()->first()->subscriberName}}</td>
                            <td>{{$tickets->damage_id()->first()->damageName}}</td>
                            <td>{{ trans("admin.".$tickets->status) }}</td>
                            <td>{{$tickets->created_at}}</td>
                        </tr>

                </tbody>
              </table>
        </div>

        <div class="row">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>إسم الفني</th>
                    <th>التشخيص</th>
                    <th>الإجراء المتخذ</th>
                    <th>تاريخ الصيانة </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($tickets->Troubleshootings as $Troubleshooting )
                        <tr>
                            <td>{{$Troubleshooting->admin_id()->first()->first_name}}
                                {{$Troubleshooting->admin_id()->first()->last_name}}</td>
                            <td>{{$Troubleshooting->diagnosis}}</td>
                            <td>{{$Troubleshooting->action_id()->first()->name_actions}}</td>
                            <td>{{$Troubleshooting->created_at}}</td>
                        </tr>
                    @endforeach

                </tbody>
              </table>
        </div>
	</div>
</div>
</div>
@endsection
