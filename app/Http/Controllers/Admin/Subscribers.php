<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\SubscribersDataTable;
use Carbon\Carbon;
use App\Models\Ticket;
use App\Models\Subscriber;

use App\Http\Controllers\Validations\SubscribersRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Subscribers extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:subscribers_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:subscribers_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:subscribers_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:subscribers_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}



            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(SubscribersDataTable $subscribers)
            {
               return $subscribers->render('admin.subscribers.index',['title'=>trans('admin.subscribers')]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {

               return view('admin.subscribers.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(SubscribersRequest $request)
            {
                $data = $request->except("_token", "_method",'status1','damage_id','note','add');
            	$subscribers = Subscriber::create($data);

                $data1['admin_id'] = admin()->id();
                $data1['subscriber_id'] = $subscribers->id;
                $data1['status'] = $request->status1;
                $data1['damage_id'] = $request->damage_id;
                $data1['note'] = $request->note;
                $tickets = Ticket::create($data1);

                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('subscribers'.$redirect), trans('admin.added'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.37]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$subscribers =  Subscriber::find($id);
        		return is_null($subscribers) || empty($subscribers)?
        		backWithError(trans("admin.undefinedRecord"),aurl("subscribers")) :
        		view('admin.subscribers.show',[
				    'title'=>trans('admin.show'),
					'subscribers'=>$subscribers
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$subscribers =  Subscriber::find($id);
        		return is_null($subscribers) || empty($subscribers)?
        		backWithError(trans("admin.undefinedRecord"),aurl("subscribers")) :
        		view('admin.subscribers.edit',[
				  'title'=>trans('admin.edit'),
				  'subscribers'=>$subscribers
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
				foreach (array_keys((new SubscribersRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(SubscribersRequest $request,$id)
            {
              // Check Record Exists
              $subscribers =  Subscriber::find($id);
              if(is_null($subscribers) || empty($subscribers)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("subscribers"));
              }
              $data = $this->updateFillableColumns();
              Subscriber::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('subscribers'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$subscribers = Subscriber::find($id);
		if(is_null($subscribers) || empty($subscribers)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("subscribers"));
		}

		it()->delete('subscriber',$id);
		$subscribers->delete();
		return redirectWithSuccess(aurl("subscribers"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$subscribers = Subscriber::find($id);
				if(is_null($subscribers) || empty($subscribers)){
					return backWithError(trans('admin.undefinedRecord'),aurl("subscribers"));
				}

				it()->delete('subscriber',$id);
				$subscribers->delete();
			}
			return redirectWithSuccess(aurl("subscribers"),trans('admin.deleted'));
		}else {
			$subscribers = Subscriber::find($data);
			if(is_null($subscribers) || empty($subscribers)){
				return backWithError(trans('admin.undefinedRecord'),aurl("subscribers"));
			}

			it()->delete('subscriber',$data);
			$subscribers->delete();
			return redirectWithSuccess(aurl("subscribers"),trans('admin.deleted'));
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
