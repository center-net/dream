<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Troubleshooting;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\TroubleshootingsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class TroubleshootingsApi extends Controller{
	protected $selectColumns = [
		"id",
		"ticket_id",
		"diagnosis",
		"action_id",
	];

            /**
             * Display the specified releationshop.
             * Baboon Api Script By [it v 1.6.37]
             * @return array to assign with index & show methods
             */
            public function arrWith(){
               return ['ticket_id','action_id',];
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$Troubleshooting = Troubleshooting::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$Troubleshooting]);
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(TroubleshootingsRequest $request)
    {
    	$data = $request->except("_token");
    	
              $data["user_id"] = auth()->id(); 
        $Troubleshooting = Troubleshooting::create($data); 

		  $Troubleshooting = Troubleshooting::with($this->arrWith())->find($Troubleshooting->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$Troubleshooting
        ]);
    }


            /**
             * Display the specified resource.
             * Baboon Api Script By [it v 1.6.37]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $Troubleshooting = Troubleshooting::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($Troubleshooting) || empty($Troubleshooting)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $Troubleshooting
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new TroubleshootingsRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(TroubleshootingsRequest $request,$id)
            {
            	$Troubleshooting = Troubleshooting::find($id);
            	if(is_null($Troubleshooting) || empty($Troubleshooting)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              $data["user_id"] = auth()->id(); 
              Troubleshooting::where("id",$id)->update($data);

              $Troubleshooting = Troubleshooting::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $Troubleshooting
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $troubleshootings = Troubleshooting::find($id);
            	if(is_null($troubleshootings) || empty($troubleshootings)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


               it()->delete("troubleshooting",$id);

               $troubleshootings->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $troubleshootings = Troubleshooting::find($id);
	            	if(is_null($troubleshootings) || empty($troubleshootings)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	it()->delete("troubleshooting",$id);
                    	$troubleshootings->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $troubleshootings = Troubleshooting::find($data);
	            	if(is_null($troubleshootings) || empty($troubleshootings)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	it()->delete("troubleshooting",$data);

                    $troubleshootings->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}