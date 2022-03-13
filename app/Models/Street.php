<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Street extends Model {

protected $table    = 'streets';
protected $fillable = [
		'id',
		'admin_id',
        'streetName',
        'region_id',

		'created_at',
		'updated_at',
	];

	/**
    * region_id relation method
    * @param void
    * @return object data
    */
   public function region_id(){
      return $this->hasOne(\App\Models\Region::class,'id','region_id');
   }

 	/**
    * Static Boot method to delete or update or sort Data
    * @param void
    * @return void
    */
   protected static function boot() {
      parent::boot();
      // if you disable constraints should by run this static method to Delete children data
         static::deleting(function($street) {
			//$street->region_id()->delete();
         });
   }
		
}
