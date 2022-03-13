<?php
namespace App\DataTables;
use App\Models\Subscriber;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Services\DataTable;
// Auto DataTable By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.37]
// Copyright Reserved [it v 1.6.37]
class SubscribersDataTable extends DataTable
{


     /**
     * dataTable to render Columns.
     * Auto Ajax Method By Baboon Script [it v 1.6.37]
     * @return \Illuminate\Http\JsonResponse
     */
    public function dataTable(DataTables $dataTables, $query)
    {
        return datatables($query)
            ->addColumn('actions', 'admin.subscribers.buttons.actions')
            ->addColumn('tickets', function($query) {return'
            <a href="'. aurl('/subscribers/'.$query->id) .'" class="btn btn-flat btn-sm" ><i class="fa fa-eye"></i>عرض التذاكر</a>
            ';})
            ->addColumn('addticket', '
            <a  href="#" class="btn btn-flat btn-sm btn-info" data-toggle="modal" data-target="#addticket" data-whatever="{{$id}}">
            <i class="fas fa-plus"></i> إضافة تذكرة</a>
            ')
            ->rawColumns(['actions','tickets','addticket']);
    }


     /**
     * Get the query object to be processed by dataTables.
     * Auto Ajax Method By Baboon Script [it v 1.6.37]
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
	public function query()
    {
        return Subscriber::query()->with(['region_id','street_id','ticket_id'])->select("subscribers.*");

    }


    	 /**
	     * Optional method if you want to use html builder.
	     *[it v 1.6.37]
	     * @return \Yajra\Datatables\Html\Builder
	     */
    	public function html()
	    {
	      $html =  $this->builder()
            ->columns($this->getColumns())
            //->ajax('')
            ->parameters([
               'searching'   => true,
               'paging'   => true,
               'bLengthChange'   => true,
               'bInfo'   => true,
               'responsive'   => true,
                'dom' => 'Blfrtip',
                "lengthMenu" => [[10, 25, 50,100, -1], [10, 25, 50,100, trans('admin.all_records')]],
                'buttons' => [
                	[
					  'extend' => 'print',
					  'className' => 'btn btn-outline',
					  'text' => '<i class="fa fa-print"></i> '.trans('admin.print')
					 ],	[
					'extend' => 'excel',
					'className' => 'btn btn-outline',
					'text' => '<i class="fa fa-file-excel"> </i> '.trans('admin.export_excel')
					],		[
					'extend' => 'reload',
					'className' => 'btn btn-outline',
					'text' => '<i class="fa fa-sync-alt"></i> '.trans('admin.reload')
					],	 	[
                        'text' => '<i class="fa fa-plus"></i> '.trans('admin.add'),
                        'className'    => 'btn btn-primary',
                        'action'    => 'function(){
                        	window.location.href =  "'.\URL::current().'/create";
                        }',
                    ],
                ],
                'initComplete' => "function () {



            ". filterElement('0,1,', 'input') . "

                        //typesubscriberName,mobile,type,region_id,street_id,address,note4
            ". filterElement('2', 'select', [
            '1'=>'منزلي',
            '0'=>'هوت سبوت',
            ]) . "

	            }",
                'order' => [[2, 'desc']],

                    'language' => [
                       'sProcessing' => trans('admin.sProcessing'),
							'sLengthMenu'        => trans('admin.sLengthMenu'),
							'sZeroRecords'       => trans('admin.sZeroRecords'),
							'sEmptyTable'        => trans('admin.sEmptyTable'),
							'sInfo'              => trans('admin.sInfo'),
							'sInfoEmpty'         => trans('admin.sInfoEmpty'),
							'sInfoFiltered'      => trans('admin.sInfoFiltered'),
							'sInfoPostFix'       => trans('admin.sInfoPostFix'),
							'sSearch'            => trans('admin.sSearch'),
							'sUrl'               => trans('admin.sUrl'),
							'sInfoThousands'     => trans('admin.sInfoThousands'),
							'sLoadingRecords'    => trans('admin.sLoadingRecords'),
							'oPaginate'          => [
								'sFirst'            => trans('admin.sFirst'),
								'sLast'             => trans('admin.sLast'),
								'sNext'             => trans('admin.sNext'),
								'sPrevious'         => trans('admin.sPrevious'),
							],
							'oAria'            => [
								'sSortAscending'  => trans('admin.sSortAscending'),
								'sSortDescending' => trans('admin.sSortDescending'),
							],
                    ]
                ]);

        return $html;

	    }



    	/**
	     * Get columns.
	     * Auto getColumns Method By Baboon Script [it v 1.6.37]
	     * @return array
	     */

	    protected function getColumns()
	    {
	        return [

				[
                 'name'=>'subscriberName',
                 'data'=>'subscriberName',
                 'title'=>trans('admin.subscriberName'),
		    ],
				[
                 'name'=>'mobile',
                 'data'=>'mobile',
                 'title'=>trans('admin.mobile'),
		    ],
				[
                 'name'=>'subscribers.type',
                 'data'=>'type',
                 'title'=>trans('admin.type'),
		    ],
			// 	[
            //      'name'=>'region_id.regionsName',
            //      'data'=>'region_id.regionsName',
            //      'title'=>trans('admin.region_id'),
		    // ],
			// 	[
            //      'name'=>'street_id.street_id',
            //      'data'=>'street_id.street_id',
            //      'title'=>trans('admin.street_id'),
		    // ],
				[
                 'name'=>'address',
                 'data'=>'address',
                 'title'=>trans('admin.address'),
		    ],
   [
    'name'=>'addticket',
    'data'=>'addticket',
    'title'=>'إضافة تذكرة',
],
           [
            'name'=>'tickets',
            'data'=>'tickets',
            'title'=>'التذاكر',
       ],
                [
            'name' => 'actions',
            'data' => 'actions',
            'title' => trans('admin.actions'),
            'exportable' => false,
            'printable'  => false,
            'searchable' => false,
            'orderable'  => false,
        ],
    	 ];
			}

	    /**
	     * Get filename for export.
	     * Auto filename Method By Baboon Script
	     * @return string
	     */
	    protected function filename()
	    {
	        return 'subscribers_' . time();
	    }

}
