<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\RoutersDataTable;
use Carbon\Carbon;
use App\Models\Router;

use App\Http\Controllers\Validations\RoutersRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.38]
// Copyright Reserved  [it v 1.6.38]
class Routers extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:routers_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:routers_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:routers_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:routers_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.38]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(RoutersDataTable $routers)
            {
               return $routers->render('admin.routers.index',['title'=>trans('admin.routers')]);
            }


            /**
             * Baboon Script By [it v 1.6.38]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.routers.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.38]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(RoutersRequest $request)
            {
                $data = $request->except("_token", "_method");
            			  		$routers = Router::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('routers'.$redirect), trans('admin.added')); }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.38]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$routers =  Router::find($id);
        		return is_null($routers) || empty($routers)?
        		backWithError(trans("admin.undefinedRecord"),aurl("routers")) :
        		view('admin.routers.show',[
				    'title'=>trans('admin.show'),
					'routers'=>$routers
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.38]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$routers =  Router::find($id);
        		return is_null($routers) || empty($routers)?
        		backWithError(trans("admin.undefinedRecord"),aurl("routers")) :
        		view('admin.routers.edit',[
				  'title'=>trans('admin.edit'),
				  'routers'=>$routers
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.38]
             * update a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				$fillableCols = [];
				foreach (array_keys((new RoutersRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(RoutersRequest $request,$id)
            {
              // Check Record Exists
              $routers =  Router::find($id);
              if(is_null($routers) || empty($routers)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("routers"));
              }
              $data = $this->updateFillableColumns(); 
              Router::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('routers'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [it v 1.6.38]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$routers = Router::find($id);
		if(is_null($routers) || empty($routers)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("routers"));
		}
               
		it()->delete('router',$id);
		$routers->delete();
		return redirectWithSuccess(aurl("routers"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$routers = Router::find($id);
				if(is_null($routers) || empty($routers)){
					return backWithError(trans('admin.undefinedRecord'),aurl("routers"));
				}
                    	
				it()->delete('router',$id);
				$routers->delete();
			}
			return redirectWithSuccess(aurl("routers"),trans('admin.deleted'));
		}else {
			$routers = Router::find($data);
			if(is_null($routers) || empty($routers)){
				return backWithError(trans('admin.undefinedRecord'),aurl("routers"));
			}
                    
			it()->delete('router',$data);
			$routers->delete();
			return redirectWithSuccess(aurl("routers"),trans('admin.deleted'));
		}
	}
            
	public function get_street_id() {
		if (request()->ajax()) {
			if (request("region_id") > 0) {
				$select = request("select") > 0 ? request("select") : "";
				return \Form::select("street_id",\App\Models\Street::where("region_id",request("region_id"))->pluck('streetName','id'), $select, ["class" => "form-control select2", "placeholder" => trans("admin.choose"), "id" => "street_id"]);
			}
		} else {
			return "<select class='form-control'></select>";
		}
	}



}