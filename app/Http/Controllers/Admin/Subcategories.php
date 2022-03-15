<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\SubcategoriesDataTable;
use Carbon\Carbon;
use App\Models\Subcategory;

use App\Http\Controllers\Validations\SubcategoriesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Subcategories extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:subcategories_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:subcategories_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:subcategories_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:subcategories_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(SubcategoriesDataTable $subcategories)
            {
               return $subcategories->render('admin.subcategories.index',['title'=>trans('admin.subcategories')]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.subcategories.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(SubcategoriesRequest $request)
            {
                $data = $request->except("_token", "_method");
            			  		$subcategories = Subcategory::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('subcategories'.$redirect), trans('admin.added')); }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.37]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$subcategories =  Subcategory::find($id);
        		return is_null($subcategories) || empty($subcategories)?
        		backWithError(trans("admin.undefinedRecord"),aurl("subcategories")) :
        		view('admin.subcategories.show',[
				    'title'=>trans('admin.show'),
					'subcategories'=>$subcategories
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$subcategories =  Subcategory::find($id);
        		return is_null($subcategories) || empty($subcategories)?
        		backWithError(trans("admin.undefinedRecord"),aurl("subcategories")) :
        		view('admin.subcategories.edit',[
				  'title'=>trans('admin.edit'),
				  'subcategories'=>$subcategories
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
				foreach (array_keys((new SubcategoriesRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(SubcategoriesRequest $request,$id)
            {
              // Check Record Exists
              $subcategories =  Subcategory::find($id);
              if(is_null($subcategories) || empty($subcategories)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("subcategories"));
              }
              $data = $this->updateFillableColumns(); 
              Subcategory::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('subcategories'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$subcategories = Subcategory::find($id);
		if(is_null($subcategories) || empty($subcategories)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("subcategories"));
		}
               
		it()->delete('subcategory',$id);
		$subcategories->delete();
		return redirectWithSuccess(aurl("subcategories"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$subcategories = Subcategory::find($id);
				if(is_null($subcategories) || empty($subcategories)){
					return backWithError(trans('admin.undefinedRecord'),aurl("subcategories"));
				}
                    	
				it()->delete('subcategory',$id);
				$subcategories->delete();
			}
			return redirectWithSuccess(aurl("subcategories"),trans('admin.deleted'));
		}else {
			$subcategories = Subcategory::find($data);
			if(is_null($subcategories) || empty($subcategories)){
				return backWithError(trans('admin.undefinedRecord'),aurl("subcategories"));
			}
                    
			it()->delete('subcategory',$data);
			$subcategories->delete();
			return redirectWithSuccess(aurl("subcategories"),trans('admin.deleted'));
		}
	}
            

}