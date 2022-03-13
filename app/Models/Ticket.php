<?php
namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Ticket extends Model {

protected $table    = 'tickets';
protected $fillable = [
		'id',
		'admin_id',
        'subscriber_id',

        'status',

        'damage_id',

        'note',
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

   public function Troubleshootings() {
    return $this->hasMany(\App\Models\Troubleshooting::class);
}

	/**
    * subscriber_id relation method
    * @param void
    * @return object data
    */
   public function subscriber_id(){
      return $this->hasOne(\App\Models\Subscriber::class,'id','subscriber_id');
   }

	/**
    * damage_id relation method
    * @param void
    * @return object data
    */
   public function damage_id(){
      return $this->hasOne(\App\Models\Damage::class,'id','damage_id');
   }
   public function getCreatedAtAttribute($value)
   {
       return Carbon::parse($value)->diffForHumans();
   }
 	/**
    * Static Boot method to delete or update or sort Data
    * @param void
    * @return void
    */
   protected static function boot() {
      parent::boot();
      // if you disable constraints should by run this static method to Delete children data
         static::deleting(function($ticket) {
			//$ticket->subscriber_id()->delete();
			//$ticket->subscriber_id()->delete();
         });
   }

}
