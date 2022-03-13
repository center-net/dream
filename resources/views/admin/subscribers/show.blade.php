@extends('admin.index')
@section('content')
<div class="card-body">

    <div class="row">
        <table class="table table-hover">
            <thead>
              <tr>
                <th>إسم المشترك</th>
                <th>رقم الجوال</th>
                <th>نوع الإشتراك</th>
                <th>الإجراء</th>
              </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>{!! $subscribers->subscriberName !!}</td>
                        <td>{!! $subscribers->mobile !!}</td>
                        <td>{{ trans("admin.".$subscribers->type) }}</td>
                        <td>
                            <h3 class="card-title">
                            <div class="">
                                <a>{{!empty($title)?$title:''}}</a>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only"></span>
                                </a>
                                <div class="dropdown-menu" role="menu">
                                    <a href="{{aurl('subscribers')}}" class="dropdown-item"  style="color:#343a40">
                                    <i class="fas fa-list"></i> {{trans('admin.show_all')}}</a>
                                    <a class="dropdown-item"  style="color:#343a40" href="{{aurl('subscribers/'.$subscribers->id.'/edit')}}">
                                        <i class="fas fa-edit"></i> {{trans('admin.edit')}}
                                    </a>
                                    <a class="dropdown-item"  style="color:#343a40" href="{{aurl('subscribers/create')}}">
                                        <i class="fas fa-plus"></i> {{trans('admin.create')}}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a data-toggle="modal" data-target="#deleteRecord{{$subscribers->id}}" class="dropdown-item"  style="color:#343a40" href="#">
                                        <i class="fas fa-trash"></i> {{trans('admin.delete')}}
                                    </a>
                                </div>
                            </div>
                            </h3>
                        </td>
                    </tr>

            </tbody>
          </table>
    </div>

</div>
@foreach ($subscribers->tickets as $ticket )
<div class="card card-dark {{ $ticket->status == '6' ? 'collapsed-card' :''}}">
	<div class="card-header">
		<h3 class="card-title" style=" width: 90%;">
            <table class="table">
                <tbody>
                    <tr>
                        <td>{{$ticket->admin_id()->first()->first_name}}
                            {{$ticket->admin_id()->first()->last_name}}</td>
                        <td>{{ trans("admin.".$ticket->status) }}</td>
                        <td>
                            {{$ticket->damage_id()->first()->damageName}}
                        </td>
                        <td>{{$ticket->note}}</td>
                        <td>{{$ticket->created_at}}</td>
                        <td>
                            @if(admin()->user()->role("tickets_edit"))
                           @if ($ticket->status != '6')
                               <form action="{{ route('closed', $ticket->id) }}" method="post" style="display: inline-block">
                                @csrf
                                @method('PUT')
                            <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                            <button type="submit" class="btn btn-flat btn-sm btn-primary">إغلاق التذكرة</button>
                        </form>
                        <form action="{{ route('reconsidering', $ticket->id) }}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('PUT')
                                <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                                <button type="submit" class="btn btn-flat btn-sm btn-primary">إعدتها للصيانة</button>
                            </form>
                           @else
                           <button type="submit" class="btn btn-flat btn-sm btn-primary">العطل مغلق</button>
                           @endif
                            @endif
                        </td>
                    </tr>
                </tbody>
              </table>
		</h3>
		<div class="card-tools">

			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas {{ $ticket->status == '4' ? 'fa-plus' :'fa-minus'}}"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>

    <div class="card-body">
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
                    @foreach ($ticket->Troubleshootings as $Troubleshooting )
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
    @endforeach


@push('js')
<div class="modal fade" id="deleteRecord{{$subscribers->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{trans('admin.delete')}}</h4>
                <button class="close" data-dismiss="modal">x</button>
            </div>
            <div class="modal-body">
                <i class="fa fa-exclamation-triangle"></i>  {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$subscribers->id}})
            </div>
            <div class="modal-footer">
                {!! Form::open([
       'method' => 'DELETE',
       'route' => ['subscribers.destroy', $subscribers->id]
       ]) !!}
        {!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger btn-flat']) !!}
                 <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
        {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endpush
@endsection
