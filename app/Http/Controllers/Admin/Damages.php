<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\DamagesDataTable;
use Carbon\Carbon;
use App\Models\Damage;

use App\Http\Controllers\Validations\DamagesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Damages extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:damages_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:damages_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:damages_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:damages_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(DamagesDataTable $damages)
            {
               return $damages->render('admin.damages.index',['title'=>trans('admin.damages')]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.damages.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(DamagesRequest $request)
            {
                $data = $request->except("_token", "_method");
            			  		$damages = Damage::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('damages'.$redirect), trans('admin.added')); }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.37]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$damages =  Damage::find($id);
        		return is_null($damages) || empty($damages)?
        		backWithError(trans("admin.undefinedRecord"),aurl("damages")) :
        		view('admin.damages.show',[
				    'title'=>trans('admin.show'),
					'damages'=>$damages
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$damages =  Damage::find($id);
        		return is_null($damages) || empty($damages)?
        		backWithError(trans("admin.undefinedRecord"),aurl("damages")) :
        		view('admin.damages.edit',[
				  'title'=>trans('admin.edit'),
				  'damages'=>$damages
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
				foreach (array_keys((new DamagesRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(DamagesRequest $request,$id)
            {
              // Check Record Exists
              $damages =  Damage::find($id);
              if(is_null($damages) || empty($damages)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("damages"));
              }
              $data = $this->updateFillableColumns(); 
              Damage::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('damages'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$damages = Damage::find($id);
		if(is_null($damages) || empty($damages)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("damages"));
		}
               
		it()->delete('damage',$id);
		$damages->delete();
		return redirectWithSuccess(aurl("damages"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$damages = Damage::find($id);
				if(is_null($damages) || empty($damages)){
					return backWithError(trans('admin.undefinedRecord'),aurl("damages"));
				}
                    	
				it()->delete('damage',$id);
				$damages->delete();
			}
			return redirectWithSuccess(aurl("damages"),trans('admin.deleted'));
		}else {
			$damages = Damage::find($data);
			if(is_null($damages) || empty($damages)){
				return backWithError(trans('admin.undefinedRecord'),aurl("damages"));
			}
                    
			it()->delete('damage',$data);
			$damages->delete();
			return redirectWithSuccess(aurl("damages"),trans('admin.deleted'));
		}
	}
            

}