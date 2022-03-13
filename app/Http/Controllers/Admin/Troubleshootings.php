<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\TroubleshootingsDataTable;
use Carbon\Carbon;
use App\Models\Troubleshooting;
use App\Models\Ticket;

use App\Http\Controllers\Validations\TroubleshootingsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Troubleshootings extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:troubleshootings_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:troubleshootings_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:troubleshootings_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:troubleshootings_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}



            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(TroubleshootingsDataTable $troubleshootings)
            {
               return $troubleshootings->render('admin.troubleshootings.index',['title'=>trans('admin.troubleshootings')]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {

               return view('admin.troubleshootings.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(TroubleshootingsRequest $request)
            {
                $data = $request->except("_token", "_method");
            	$data['admin_id'] = admin()->id();
		  		$troubleshootings = Troubleshooting::create($data);
                $tickets =  Ticket::find($request->ticket_id);
                $request_data['status'] = '5';
                $tickets->update($request_data);

                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('tickets'.$redirect), trans('admin.added')); }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.37]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$troubleshootings =  Troubleshooting::find($id);
        		return is_null($troubleshootings) || empty($troubleshootings)?
        		backWithError(trans("admin.undefinedRecord"),aurl("troubleshootings")) :
        		view('admin.troubleshootings.show',[
				    'title'=>trans('admin.show'),
					'troubleshootings'=>$troubleshootings
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$troubleshootings =  Troubleshooting::find($id);
        		return is_null($troubleshootings) || empty($troubleshootings)?
        		backWithError(trans("admin.undefinedRecord"),aurl("troubleshootings")) :
        		view('admin.troubleshootings.edit',[
				  'title'=>trans('admin.edit'),
				  'troubleshootings'=>$troubleshootings
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * update a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				$fillableCols = [];
				foreach (array_keys((new TroubleshootingsRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(TroubleshootingsRequest $request,$id)
            {
              // Check Record Exists
              $troubleshootings =  Troubleshooting::find($id);
              if(is_null($troubleshootings) || empty($troubleshootings)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("troubleshootings"));
              }
              $data = $this->updateFillableColumns();
              $data['admin_id'] = admin()->id();
              Troubleshooting::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('troubleshootings'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$troubleshootings = Troubleshooting::find($id);
		if(is_null($troubleshootings) || empty($troubleshootings)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("troubleshootings"));
		}

		it()->delete('troubleshooting',$id);
		$troubleshootings->delete();
		return redirectWithSuccess(aurl("troubleshootings"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$troubleshootings = Troubleshooting::find($id);
				if(is_null($troubleshootings) || empty($troubleshootings)){
					return backWithError(trans('admin.undefinedRecord'),aurl("troubleshootings"));
				}

				it()->delete('troubleshooting',$id);
				$troubleshootings->delete();
			}
			return redirectWithSuccess(aurl("troubleshootings"),trans('admin.deleted'));
		}else {
			$troubleshootings = Troubleshooting::find($data);
			if(is_null($troubleshootings) || empty($troubleshootings)){
				return backWithError(trans('admin.undefinedRecord'),aurl("troubleshootings"));
			}

			it()->delete('troubleshooting',$data);
			$troubleshootings->delete();
			return redirectWithSuccess(aurl("troubleshootings"),trans('admin.deleted'));
		}
	}


}
