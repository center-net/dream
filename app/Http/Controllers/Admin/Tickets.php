<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\TicketsDataTable;
use App\DataTables\ArchivesTicketsDataTable;
use Carbon\Carbon;
use App\Models\Ticket;
use App\Models\Troubleshooting;

use App\Http\Controllers\Validations\TicketsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Tickets extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:tickets_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:tickets_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:tickets_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:tickets_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}



            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(TicketsDataTable $tickets)
            {
               return $tickets->render('admin.tickets.index',['title'=>trans('admin.tickets')]);
            }
            
            public function archives(ArchivesTicketsDataTable $tickets)
            {
               return $tickets->render('admin.tickets.index',['title'=>trans('admin.tickets')]);
            }



            /**
             * Baboon Script By [it v 1.6.37]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {

               return view('admin.tickets.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(TicketsRequest $request)
            {
                $data = $request->except("_token", "_method");
            	$data['admin_id'] = admin()->id();
		  		$tickets = Ticket::create($data);
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('tickets'.$redirect), trans('admin.added')); }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.37]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$tickets =  Ticket::find($id);
                // $troubleshootings =  Troubleshooting::find($tickets->ticket_id);
        		return is_null($tickets) || empty($tickets)?
        		backWithError(trans("admin.undefinedRecord"),aurl("tickets")) :
        		view('admin.tickets.show',[
				    'title'=>trans('admin.show'),
					'tickets'=>$tickets
        		]);
            }
            public function closed($id)
            {
        		$tickets =  Ticket::find($id);
                $tickets->status = '6';
                $tickets->update();
                $redirect = isset($request["save_back"])?"/".$id."/edit":"";
                return redirectWithSuccess(aurl('tickets'.$redirect), trans('admin.updated'));
            }

            public function reconsidering($id)
            {
        		$tickets =  Ticket::find($id);
                $tickets->status = '4';
                $tickets->update();
                $redirect = isset($request["save_back"])?"/".$id."/edit":"";
                return redirectWithSuccess(aurl('tickets'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {

        		$tickets =  Ticket::find($id);
        		return is_null($tickets) || empty($tickets)?
        		backWithError(trans("admin.undefinedRecord"),aurl("tickets")) :
        		view('admin.tickets.edit',[
				  'title'=>trans('admin.edit'),
				  'tickets'=>$tickets
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
				foreach (array_keys((new TicketsRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(TicketsRequest $request,$id)
            {

              // Check Record Exists
              $tickets =  Ticket::find($id);
              if(is_null($tickets) || empty($tickets)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("tickets"));
              }
              $data = $this->updateFillableColumns();
              $data['admin_id'] = admin()->id();
              Ticket::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('tickets'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$tickets = Ticket::find($id);
		if(is_null($tickets) || empty($tickets)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("tickets"));
		}

		it()->delete('ticket',$id);
		$tickets->delete();
		return redirectWithSuccess(aurl("tickets"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$tickets = Ticket::find($id);
				if(is_null($tickets) || empty($tickets)){
					return backWithError(trans('admin.undefinedRecord'),aurl("tickets"));
				}

				it()->delete('ticket',$id);
				$tickets->delete();
			}
			return redirectWithSuccess(aurl("tickets"),trans('admin.deleted'));
		}else {
			$tickets = Ticket::find($data);
			if(is_null($tickets) || empty($tickets)){
				return backWithError(trans('admin.undefinedRecord'),aurl("tickets"));
			}

			it()->delete('ticket',$data);
			$tickets->delete();
			return redirectWithSuccess(aurl("tickets"),trans('admin.deleted'));
		}
	}


}
