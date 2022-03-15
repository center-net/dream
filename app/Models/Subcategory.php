<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Subcategory extends Model {

protected $table    = 'subcategories';
protected $fillable = [
		'id',
		'admin_id',
        'category_name',
        'category_id',

        'status',

		'created_at',
		'updated_at',
	];

	/**
    * category_id relation method
    * @param void
    * @return object data
    */
   public function category_id(){
      return $this->hasOne(\App\Models\Category::class,'id','category_id');
   }

 	/**
    * Static Boot method to delete or update or sort Data
    * @param void
    * @return void
    */
   protected static function boot() {
      parent::boot();
      // if you disable constraints should by run this static method to Delete children data
         static::deleting(function($subcategory) {
			//$subcategory->category_id()->delete();
         });
   }
		
}
