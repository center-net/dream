<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Region extends Model {

protected $table    = 'regions';
protected $fillable = [
		'id',
		'admin_id',
        'regionsName',
		'created_at',
		'updated_at',
	];

    public function subscriber(){
        return $this->hasOne(\App\Models\Subscriber::class);
     }

 	/**
    * Static Boot method to delete or update or sort Data
    * @param void
    * @return void
    */
   protected static function boot() {
      parent::boot();
      // if you disable constraints should by run this static method to Delete children data
         static::deleting(function($region) {
         });
   }

}
