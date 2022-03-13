<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Subscriber extends Model {

protected $table    = 'subscribers';
protected $fillable = [
		'id',
		'admin_id',
        'subscriberName',
        'mobile',
        'type',

        'region_id',

        'street_id',

        'address',
        'note',
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
    * street_id relation method
    * @param void
    * @return object data
    */
   public function street_id(){
      return $this->hasOne(\App\Models\Street::class,'id','street_id');
   }
   public function ticket_id(){
    return $this->hasOne(\App\Models\Ticket::class);
 }

 public function tickets(){
    return $this->hasMany(\App\Models\Ticket::class);
 }

 public function getTypeAttribute($value)
 {
    return $value == '0'? 'منزلي':'هوت سبوت';
 }

 public function getRegionIdAttribute($value)
 {
    return \App\Models\Region::find($value)->regionsName ;
 }
 public function getStreetIdAttribute($value)
 {
    return \App\Models\Street::find($value)->streetName ;
 }

 	/**
    * Static Boot method to delete or update or sort Data
    * @param void
    * @return void
    */
   protected static function boot() {
      parent::boot();
      // if you disable constraints should by run this static method to Delete children data
         static::deleting(function($subscriber) {
			//$subscriber->region_id()->delete();
			//$subscriber->region_id()->delete();
         });
   }

}
