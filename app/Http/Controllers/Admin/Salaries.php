<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\SalariesDataTable;
use Carbon\Carbon;
use App\Models\Salarie;

use App\Http\Controllers\Validations\SalariesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Salaries extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:salaries_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:salaries_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:salaries_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:salaries_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}



            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(SalariesDataTable $salaries)
            {
               return $salaries->render('admin.salaries.index',['title'=>trans('admin.salaries')]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {

               return view('admin.salaries.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(SalariesRequest $request)
            {
                $data = $request->except("_token", "_method","add");
            	$data['admin_id'] = $request->admin_id;
		  		$salaries = Salarie::create($data);
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('salaries'.$redirect), trans('admin.added')); }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.37]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$salaries =  Salarie::find($id);
        		return is_null($salaries) || empty($salaries)?
        		backWithError(trans("admin.undefinedRecord"),aurl("salaries")) :
        		view('admin.salaries.show',[
				    'title'=>trans('admin.show'),
					'salaries'=>$salaries
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$salaries =  Salarie::find($id);
        		return is_null($salaries) || empty($salaries)?
        		backWithError(trans("admin.undefinedRecord"),aurl("salaries")) :
        		view('admin.salaries.edit',[
				  'title'=>trans('admin.edit'),
				  'salaries'=>$salaries
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
				foreach (array_keys((new SalariesRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(SalariesRequest $request,$id)
            {
              // Check Record Exists
              $salaries =  Salarie::find($id);
              if(is_null($salaries) || empty($salaries)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("salaries"));
              }
              $data = $this->updateFillableColumns();
              Salarie::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('salaries'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$salaries = Salarie::find($id);
		if(is_null($salaries) || empty($salaries)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("salaries"));
		}

		it()->delete('salarie',$id);
		$salaries->delete();
		return redirectWithSuccess(aurl("salaries"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$salaries = Salarie::find($id);
				if(is_null($salaries) || empty($salaries)){
					return backWithError(trans('admin.undefinedRecord'),aurl("salaries"));
				}

				it()->delete('salarie',$id);
				$salaries->delete();
			}
			return redirectWithSuccess(aurl("salaries"),trans('admin.deleted'));
		}else {
			$salaries = Salarie::find($data);
			if(is_null($salaries) || empty($salaries)){
				return backWithError(trans('admin.undefinedRecord'),aurl("salaries"));
			}

			it()->delete('salarie',$data);
			$salaries->delete();
			return redirectWithSuccess(aurl("salaries"),trans('admin.deleted'));
		}
	}


}
