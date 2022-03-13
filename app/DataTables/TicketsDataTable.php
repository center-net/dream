<?php
namespace App\DataTables;
use App\Models\Ticket;
use App\Models\Subscriber;
use App\Models\Region;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Services\DataTable;
// Auto DataTable By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.37]
// Copyright Reserved [it v 1.6.37]
class TicketsDataTable extends DataTable
{


     /**
     * dataTable to render Columns.
     * Auto Ajax Method By Baboon Script [it v 1.6.37]
     * @return \Illuminate\Http\JsonResponse
     */
    public function dataTable(DataTables $dataTables, $query)
    {
        return datatables($query)
            ->addColumn('actions', 'admin.tickets.buttons.actions')
            ->editColumn('status',
            function($query) {

                if ($query->status == 5) {
                   return '<a href="'. aurl('/tickets/'.$query->id) .'" class="btn btn-flat btn-sm btn-primary" ><i class="fa fa-eye"></i>'.trans("admin.".$query->status) .'</a>';
                }else if($query->status == 6){
                    return '<a href="'. aurl('/tickets/'.$query->id) .'" class="btn btn-flat btn-sm btn-danger" ><i class="fa fa-eye"></i>'.trans("admin.".$query->status) .'</a>';
                }else{
                    return '
            <a  href="#" class="btn btn-flat btn-sm btn-warning" data-toggle="modal" data-target="#addaction" data-whatever="'.$query->id.'">
            <i class="fas fa-plus"></i>'. trans("admin.".$query->status).'</a>
            ';
                }
            })
            ->rawColumns(['actions','types','status']);
    }

     /**
     * Get the query object to be processed by dataTables.
     * Auto Ajax Method By Baboon Script [it v 1.6.37]
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
	public function query()
    {
            return Ticket::query()->with(['subscriber_id','damage_id',])->where('status','!=','6')->select("tickets.*");
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
                "lengthMenu" => [[30, 50,100, -1], [30, 50,100, trans('admin.all_records')]],
                'buttons' => [
                	[
					  'extend' => 'print',
					  'className' => 'btn btn-outline',
					  'text' => '<i class="fa fa-print"></i> '.trans('admin.print')
					 ],	[
					'extend' => 'excel',
					'className' => 'btn btn-outline',
					'text' => '<i class="fa fa-file-excel"> </i> '.trans('admin.export_excel')
					],	[
					'extend' => 'reload',
					'className' => 'btn btn-outline',
					'text' => '<i class="fa fa-sync-alt"></i> '.trans('admin.reload')
					],

                ],
                'initComplete' => "function () {



            ". filterElement('0,1', 'input') . "
            ". filterElement('2', 'select', \App\Models\Region::pluck("regionsName","id")) . "
            ". filterElement('3', 'select', \App\Models\Street::pluck("streetName","id")) . "
            //statussubscriber_id,status,damage_id,note3
            ". filterElement('5', 'select', [
            '1'=>trans('admin.1'),
            '2'=>trans('admin.2'),
            '3'=>trans('admin.3'),
            '4'=>trans('admin.4'),
            '5'=>trans('admin.5'),
            '6'=>trans('admin.6'),
            ]) . "
            //damage_idsubscriber_id,status,damage_id,note4
            ". filterElement('6', 'select', \App\Models\Damage::pluck("damageName","damageName")) . "
            ". filterElement('7', 'select', [
                '0'=>'منزلي',
                '1'=>'هوت سبوت',
                ]) . "

	            }",
                'order' => [[5, 'ASC']],

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
                 'name'=>'subscriber_id.subscriberName',
                 'data'=>'subscriber_id.subscriberName',
                 'title'=>trans('admin.subscriber_id'),
		    ],
            [
                'name'=>'subscriber_id.mobile',
                'data'=>'subscriber_id.mobile',
                'title'=>'جوال',
           ],
           [
            'name'=>'subscriber_id.region_id',
            'data'=>'subscriber_id.region_id',
            'title'=>'المنطقة',
       ],
       [
                'name'=>'subscriber_id.street_id',
                'data'=>'subscriber_id.street_id',
                'title'=>'الشارع',
        ],
           [
            'name'=>'subscriber_id.address',
            'data'=>'subscriber_id.address',
            'title'=>'address',
       ],

				[
                 'name'=>'tickets.status',
                 'data'=>'status',
                 'title'=>trans('admin.status'),
		    ],
				[
                 'name'=>'damage_id.damageName',
                 'data'=>'damage_id.damageName',
                 'title'=>trans('admin.damage_id'),
		    ],
            [
                'name'=>'subscriber_id.type',
                'data'=>'subscriber_id.type',
                'title'=>trans('admin.type'),
           ],
            [
				'name' => 'created_at',
				'data' => 'created_at',
				'title' => trans('admin.created_at'),
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
	        return 'tickets_' . time();
	    }

}
