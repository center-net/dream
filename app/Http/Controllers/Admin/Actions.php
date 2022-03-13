<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\ActionsDataTable;
use Carbon\Carbon;
use App\Models\Action;

use App\Http\Controllers\Validations\ActionsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Actions extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:actions_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:actions_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:actions_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:actions_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(ActionsDataTable $actions)
            {
               return $actions->render('admin.actions.index',['title'=>trans('admin.actions')]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.actions.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(ActionsRequest $request)
            {
                $data = $request->except("_token", "_method");
            			  		$actions = Action::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('actions'.$redirect), trans('admin.added')); }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.37]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$actions =  Action::find($id);
        		return is_null($actions) || empty($actions)?
        		backWithError(trans("admin.undefinedRecord"),aurl("actions")) :
        		view('admin.actions.show',[
				    'title'=>trans('admin.show'),
					'actions'=>$actions
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$actions =  Action::find($id);
        		return is_null($actions) || empty($actions)?
        		backWithError(trans("admin.undefinedRecord"),aurl("actions")) :
        		view('admin.actions.edit',[
				  'title'=>trans('admin.edit'),
				  'actions'=>$actions
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
				foreach (array_keys((new ActionsRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(ActionsRequest $request,$id)
            {
              // Check Record Exists
              $actions =  Action::find($id);
              if(is_null($actions) || empty($actions)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("actions"));
              }
              $data = $this->updateFillableColumns(); 
              Action::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('actions'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$actions = Action::find($id);
		if(is_null($actions) || empty($actions)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("actions"));
		}
               
		it()->delete('action',$id);
		$actions->delete();
		return redirectWithSuccess(aurl("actions"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$actions = Action::find($id);
				if(is_null($actions) || empty($actions)){
					return backWithError(trans('admin.undefinedRecord'),aurl("actions"));
				}
                    	
				it()->delete('action',$id);
				$actions->delete();
			}
			return redirectWithSuccess(aurl("actions"),trans('admin.deleted'));
		}else {
			$actions = Action::find($data);
			if(is_null($actions) || empty($actions)){
				return backWithError(trans('admin.undefinedRecord'),aurl("actions"));
			}
                    
			it()->delete('action',$data);
			$actions->delete();
			return redirectWithSuccess(aurl("actions"),trans('admin.deleted'));
		}
	}
            

}