<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = [
    	'status', 'type', 'driver_id', 'passenger_id', 'form', 'to', 'start_time', 'end_time','is_confirmed'
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

}
