<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\AdvancesDataTable;
use Carbon\Carbon;
use App\Models\Advance;
use App\Models\Salarie;

use App\Http\Controllers\Validations\AdvancesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Advances extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:advances_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:advances_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:advances_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:advances_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}



            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(AdvancesDataTable $advances)
            {
               return $advances->render('admin.advances.index',['title'=>trans('admin.advances')]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {

               return view('admin.advances.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(AdvancesRequest $request)
            {
                $data = $request->except("_token", "_method","add","totale","salarie","description","addadvance");
                if(!empty($request->addadvance)){
                     $data['admin_id'] = admin()->id();
                     $data['description'] = 'سلفة';
                    $advances = Advance::create($data); 
                       $redirect = isset($request["add_back"])?"/create":"";
                    return redirectWithSuccess(aurl('/'.$redirect), trans('admin.added'));
                
                }else if($request->totale + $request->advance == $request->salarie || $request->totale = 'null'){
                    $data['description'] = 'باقي راتب';
                    $advances = Advance::create($data);
                    $redirect = isset($request["add_back"])?"/create":"";
                    return redirectWithSuccess(aurl('/'.$redirect), trans('admin.added'));
                }
                else{
                    $data['description'] = 'سلفة';
                    $advances = Advance::create($data);    
                    $salaries = Salarie::where('admin_id',$request->admin_id)->first();
                    $date1['previous_balance'] = $request->salarie - ($request->totale + $request->advance);
                    Salarie::where('admin_id',$request->admin_id)->update($date1);
                    $redirect = isset($request["add_back"])?"/create":"";
                    return redirectWithSuccess(aurl('/'.$redirect), trans('admin.added'));
                }


            }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.37]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$advances =  Advance::find($id);
        		return is_null($advances) || empty($advances)?
        		backWithError(trans("admin.undefinedRecord"),aurl("advances")) :
        		view('admin.advances.show',[
				    'title'=>trans('admin.show'),
					'advances'=>$advances
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$advances =  Advance::find($id);
        		return is_null($advances) || empty($advances)?
        		backWithError(trans("admin.undefinedRecord"),aurl("advances")) :
        		view('admin.advances.edit',[
				  'title'=>trans('admin.edit'),
				  'advances'=>$advances
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
				foreach (array_keys((new AdvancesRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(AdvancesRequest $request,$id)
            {
              // Check Record Exists
              $advances =  Advance::find($id);
              if(is_null($advances) || empty($advances)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("advances"));
              }
              $data = $this->updateFillableColumns();
              $data['status'] = 'yes';
              Advance::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('/'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$advances = Advance::find($id);
		if(is_null($advances) || empty($advances)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("advances"));
		}

		it()->delete('advance',$id);
		$advances->delete();
		return redirectWithSuccess(aurl("/"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$advances = Advance::find($id);
				if(is_null($advances) || empty($advances)){
					return backWithError(trans('admin.undefinedRecord'),aurl("advances"));
				}

				it()->delete('advance',$id);
				$advances->delete();
			}
			return redirectWithSuccess(aurl("advances"),trans('admin.deleted'));
		}else {
			$advances = Advance::find($data);
			if(is_null($advances) || empty($advances)){
				return backWithError(trans('admin.undefinedRecord'),aurl("advances"));
			}

			it()->delete('advance',$data);
			$advances->delete();
			return redirectWithSuccess(aurl("/"),trans('admin.deleted'));
		}
	}


}
