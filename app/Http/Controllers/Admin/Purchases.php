<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\PurchasesDataTable;
use Carbon\Carbon;
use App\Models\Purchase;

use App\Http\Controllers\Validations\PurchasesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Purchases extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:purchases_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:purchases_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:purchases_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:purchases_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(PurchasesDataTable $purchases)
            {
               return $purchases->render('admin.purchases.index',['title'=>trans('admin.purchases')]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.purchases.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(PurchasesRequest $request)
            {
                $data = $request->except("_token", "_method","add");
            	$data['admin_id'] = admin()->id(); 
		  		$purchases = Purchase::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('purchases'.$redirect), trans('admin.added')); }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.37]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$purchases =  Purchase::find($id);
        		return is_null($purchases) || empty($purchases)?
        		backWithError(trans("admin.undefinedRecord"),aurl("purchases")) :
        		view('admin.purchases.show',[
				    'title'=>trans('admin.show'),
					'purchases'=>$purchases
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$purchases =  Purchase::find($id);
        		return is_null($purchases) || empty($purchases)?
        		backWithError(trans("admin.undefinedRecord"),aurl("purchases")) :
        		view('admin.purchases.edit',[
				  'title'=>trans('admin.edit'),
				  'purchases'=>$purchases
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
				foreach (array_keys((new PurchasesRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(PurchasesRequest $request,$id)
            {
              // Check Record Exists
              $purchases =  Purchase::find($id);
              if(is_null($purchases) || empty($purchases)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("purchases"));
              }
              $data = $this->updateFillableColumns(); 
              Purchase::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('purchases'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$purchases = Purchase::find($id);
		if(is_null($purchases) || empty($purchases)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("purchases"));
		}
               
		it()->delete('purchase',$id);
		$purchases->delete();
		return redirectWithSuccess(aurl("purchases"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$purchases = Purchase::find($id);
				if(is_null($purchases) || empty($purchases)){
					return backWithError(trans('admin.undefinedRecord'),aurl("purchases"));
				}
                    	
				it()->delete('purchase',$id);
				$purchases->delete();
			}
			return redirectWithSuccess(aurl("purchases"),trans('admin.deleted'));
		}else {
			$purchases = Purchase::find($data);
			if(is_null($purchases) || empty($purchases)){
				return backWithError(trans('admin.undefinedRecord'),aurl("purchases"));
			}
                    
			it()->delete('purchase',$data);
			$purchases->delete();
			return redirectWithSuccess(aurl("purchases"),trans('admin.deleted'));
		}
	}
            

}