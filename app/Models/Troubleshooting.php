<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Troubleshooting extends Model {

protected $table    = 'troubleshootings';
protected $fillable = [
		'id',
		'admin_id',
        'ticket_id',

        'diagnosis',
        'action_id',

		'created_at',
		'updated_at',
	];

	/**
	 * admin id relation method to get how add this data
	 * @type hasOne
	 * @param void
	 * @return object data
	 */
   public function admin_id() {
	   return $this->hasOne(\App\Models\Admin::class, 'id', 'admin_id');
   }
	

	/**
    * ticket_id relation method
    * @param void
    * @return object data
    */
   public function ticket_id(){
      return $this->hasOne(\App\Models\Ticket::class,'id','ticket_id');
   }

	/**
    * action_id relation method
    * @param void
    * @return object data
    */
   public function action_id(){
      return $this->hasOne(\App\Models\Action::class,'id','action_id');
   }

 	/**
    * Static Boot method to delete or update or sort Data
    * @param void
    * @return void
    */
   protected static function boot() {
      parent::boot();
      // if you disable constraints should by run this static method to Delete children data
         static::deleting(function($troubleshooting) {
			//$troubleshooting->ticket_id()->delete();
			//$troubleshooting->ticket_id()->delete();
         });
   }
		
}
