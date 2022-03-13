<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\FundsDataTable;
use Carbon\Carbon;
use App\Models\Fund;

use App\Http\Controllers\Validations\FundsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Funds extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:funds_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:funds_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:funds_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:funds_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(FundsDataTable $funds)
            {
               return $funds->render('admin.funds.index',['title'=>trans('admin.funds')]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.funds.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(FundsRequest $request)
            {
                $data = $request->except("_token", "_method");
            			  		$funds = Fund::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('funds'.$redirect), trans('admin.added')); }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.37]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$funds =  Fund::find($id);
        		return is_null($funds) || empty($funds)?
        		backWithError(trans("admin.undefinedRecord"),aurl("funds")) :
        		view('admin.funds.show',[
				    'title'=>trans('admin.show'),
					'funds'=>$funds
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$funds =  Fund::find($id);
        		return is_null($funds) || empty($funds)?
        		backWithError(trans("admin.undefinedRecord"),aurl("funds")) :
        		view('admin.funds.edit',[
				  'title'=>trans('admin.edit'),
				  'funds'=>$funds
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
				foreach (array_keys((new FundsRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(FundsRequest $request,$id)
            {
              // Check Record Exists
              $funds =  Fund::find($id);
              if(is_null($funds) || empty($funds)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("funds"));
              }
              $data = $this->updateFillableColumns(); 
              Fund::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('funds'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$funds = Fund::find($id);
		if(is_null($funds) || empty($funds)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("funds"));
		}
               
		it()->delete('fund',$id);
		$funds->delete();
		return redirectWithSuccess(aurl("funds"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$funds = Fund::find($id);
				if(is_null($funds) || empty($funds)){
					return backWithError(trans('admin.undefinedRecord'),aurl("funds"));
				}
                    	
				it()->delete('fund',$id);
				$funds->delete();
			}
			return redirectWithSuccess(aurl("funds"),trans('admin.deleted'));
		}else {
			$funds = Fund::find($data);
			if(is_null($funds) || empty($funds)){
				return backWithError(trans('admin.undefinedRecord'),aurl("funds"));
			}
                    
			it()->delete('fund',$data);
			$funds->delete();
			return redirectWithSuccess(aurl("funds"),trans('admin.deleted'));
		}
	}
            

}