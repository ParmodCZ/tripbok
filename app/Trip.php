<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = [
    	'status', 'type', 'driver_id', 'passenger_id', 'from_', 'to', 'start_time', 'end_time','is_confirmed','fare','from_lat_long','from_lat','from_long','to_lat_long','to_lat','to_long'
	];

	/**
    * relation betwwen users and trips
    * type: one to many (inverse)
    **/
    public function drivers(){
    	return $this->belongsTo(User::class,'driver_id','id');
	}

	public function passengers(){
    	return $this->belongsTo(User::class,'passenger_id','id');
	}

    public function ratings(){
        return $this->hasOne('App\DriverRating','id');
    }

}
