<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\StreetsDataTable;
use Carbon\Carbon;
use App\Models\Street;

use App\Http\Controllers\Validations\StreetsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Streets extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:streets_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:streets_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:streets_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:streets_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(StreetsDataTable $streets)
            {
               return $streets->render('admin.streets.index',['title'=>trans('admin.streets')]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.streets.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(StreetsRequest $request)
            {
                $data = $request->except("_token", "_method");
            			  		$streets = Street::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('streets'.$redirect), trans('admin.added')); }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.37]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$streets =  Street::find($id);
        		return is_null($streets) || empty($streets)?
        		backWithError(trans("admin.undefinedRecord"),aurl("streets")) :
        		view('admin.streets.show',[
				    'title'=>trans('admin.show'),
					'streets'=>$streets
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$streets =  Street::find($id);
        		return is_null($streets) || empty($streets)?
        		backWithError(trans("admin.undefinedRecord"),aurl("streets")) :
        		view('admin.streets.edit',[
				  'title'=>trans('admin.edit'),
				  'streets'=>$streets
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
				foreach (array_keys((new StreetsRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(StreetsRequest $request,$id)
            {
              // Check Record Exists
              $streets =  Street::find($id);
              if(is_null($streets) || empty($streets)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("streets"));
              }
              $data = $this->updateFillableColumns(); 
              Street::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('streets'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$streets = Street::find($id);
		if(is_null($streets) || empty($streets)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("streets"));
		}
               
		it()->delete('street',$id);
		$streets->delete();
		return redirectWithSuccess(aurl("streets"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$streets = Street::find($id);
				if(is_null($streets) || empty($streets)){
					return backWithError(trans('admin.undefinedRecord'),aurl("streets"));
				}
                    	
				it()->delete('street',$id);
				$streets->delete();
			}
			return redirectWithSuccess(aurl("streets"),trans('admin.deleted'));
		}else {
			$streets = Street::find($data);
			if(is_null($streets) || empty($streets)){
				return backWithError(trans('admin.undefinedRecord'),aurl("streets"));
			}
                    
			it()->delete('street',$data);
			$streets->delete();
			return redirectWithSuccess(aurl("streets"),trans('admin.deleted'));
		}
	}
            

}