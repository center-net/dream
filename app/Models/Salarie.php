<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Salarie extends Model {

protected $table    = 'salaries';
protected $guarded = [];

	/**
	 * admin id relation method to get how add this data
	 * @type hasOne
	 * @param void
	 * @return object data
	 */
   public function admin_id() {
	   return $this->hasOne(\App\Models\Admin::class, 'id', 'admin_id');
   }
   public function admin() {
    return $this->belongsTo(\App\Models\Admin::class, 'id', 'admin_id');
}

 	/**
    * Static Boot method to delete or update or sort Data
    * @param void
    * @return void
    */
   protected static function boot() {
      parent::boot();
      // if you disable constraints should by run this static method to Delete children data
         static::deleting(function($salarie) {
        //$ticket->admin_id()->delete();
         //$ticket->admin_id()->delete();
         });
   }

}
