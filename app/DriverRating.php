<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverRating extends Model
{
    protected $fillable = [
    	'trip_id', 'passenger_id', 'driver_id', 'rating'
	];

	public function trips(){
    	return $this->belongsTo(Trip::class,'trip_id');
	}

	public function drivers(){
    	return $this->belongsTo(User::class,'id');
	}
}
