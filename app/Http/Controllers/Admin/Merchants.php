<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\MerchantsDataTable;
use Carbon\Carbon;
use App\Models\Merchant;

use App\Http\Controllers\Validations\MerchantsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Merchants extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:merchants_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:merchants_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:merchants_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:merchants_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(MerchantsDataTable $merchants)
            {
               return $merchants->render('admin.merchants.index',['title'=>trans('admin.merchants')]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.merchants.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(MerchantsRequest $request)
            {
                $data = $request->except("_token", "_method");
            			  		$merchants = Merchant::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('merchants'.$redirect), trans('admin.added')); }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.37]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$merchants =  Merchant::find($id);
        		return is_null($merchants) || empty($merchants)?
        		backWithError(trans("admin.undefinedRecord"),aurl("merchants")) :
        		view('admin.merchants.show',[
				    'title'=>trans('admin.show'),
					'merchants'=>$merchants
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$merchants =  Merchant::find($id);
        		return is_null($merchants) || empty($merchants)?
        		backWithError(trans("admin.undefinedRecord"),aurl("merchants")) :
        		view('admin.merchants.edit',[
				  'title'=>trans('admin.edit'),
				  'merchants'=>$merchants
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
				foreach (array_keys((new MerchantsRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(MerchantsRequest $request,$id)
            {
              // Check Record Exists
              $merchants =  Merchant::find($id);
              if(is_null($merchants) || empty($merchants)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("merchants"));
              }
              $data = $this->updateFillableColumns(); 
              Merchant::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('merchants'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$merchants = Merchant::find($id);
		if(is_null($merchants) || empty($merchants)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("merchants"));
		}
               
		it()->delete('merchant',$id);
		$merchants->delete();
		return redirectWithSuccess(aurl("merchants"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$merchants = Merchant::find($id);
				if(is_null($merchants) || empty($merchants)){
					return backWithError(trans('admin.undefinedRecord'),aurl("merchants"));
				}
                    	
				it()->delete('merchant',$id);
				$merchants->delete();
			}
			return redirectWithSuccess(aurl("merchants"),trans('admin.deleted'));
		}else {
			$merchants = Merchant::find($data);
			if(is_null($merchants) || empty($merchants)){
				return backWithError(trans('admin.undefinedRecord'),aurl("merchants"));
			}
                    
			it()->delete('merchant',$data);
			$merchants->delete();
			return redirectWithSuccess(aurl("merchants"),trans('admin.deleted'));
		}
	}
            

}