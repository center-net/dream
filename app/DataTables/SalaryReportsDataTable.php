<?php
namespace App\DataTables;
use App\Models\SalaryReport;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Services\DataTable;
// Auto DataTable By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.37]
// Copyright Reserved [it v 1.6.37]
class SalaryReportsDataTable extends DataTable
{


     /**
     * dataTable to render Columns.
     * Auto Ajax Method By Baboon Script [it v 1.6.37]
     * @return \Illuminate\Http\JsonResponse
     */
    public function dataTable(DataTables $dataTables, $query)
    {
        return datatables($query)
            ->addColumn('actions', 'admin.salaries.buttons.actions')

   		->editColumn('created_at', '{{ date("Y-m-d H:i:s",strtotime($created_at)) }}')   		->addColumn('updated_at', '{{ date("Y-m-d H:i:s",strtotime($updated_at)) }}')            ->addColumn('checkbox', '<div  class="icheck-danger">
                  <input type="checkbox" class="selected_data" name="selected_data[]" id="selectdata{{ $id }}" value="{{ $id }}" >
                  <label for="selectdata{{ $id }}"></label>
                </div>')
            ->rawColumns(['checkbox','actions',]);
    }


     /**
     * Get the query object to be processed by dataTables.
     * Auto Ajax Method By Baboon Script [it v 1.6.37]
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
	public function query()
    {
        return SalaryReport::query()->with(['admin_id',])->select("Salary_Reports.*");

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
					],
					[
					'extend' => 'reload',
					'className' => 'btn btn-outline',
					'text' => '<i class="fa fa-sync-alt"></i> '.trans('admin.reload')
					],
                ],
                'initComplete' => "function () {



            ". filterElement('0,1', 'input') . "



	            }",
                'order' => [[8, 'DESC']],

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
                 'name'=>'admin_id.first_name',
                 'data'=>'admin_id.first_name',
                 'title'=>trans('admin.first_name'),
		    ],
		    [
                 'name'=>'admin_id.last_name',
                 'data'=>'admin_id.last_name',
                 'title'=>trans('admin.last_name'),
		    ],
				[
                 'name'=>'salarie',
                 'data'=>'salarie',
                 'title'=>trans('admin.salarie'),
		    ],
            [
                'name'=>'reward',
                'data'=>'reward',
                'title'=>'المكافئات ',
           ],
           [
            'name'=>'discount',
            'data'=>'discount',
            'title'=>'الخصومات',
             ],
            [
                'name'=>'previous_balance',
                'data'=>'previous_balance',
                'title'=>'رصيد سابق',
                ],

            [
                'name'=>'total_advance',
                'data'=>'total_advance',
                'title'=>'إجمالي السلف',
                ],
                 [
                'name'=>'exchange',
                'data'=>'exchange',
                'title'=>'الراتب المستلم',
                ],
                                 [
                'name'=>'created_at',
                'data'=>'created_at',
                'title'=>trans('admin.created_at'),
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
	        return 'salaries_' . time();
	    }

}
