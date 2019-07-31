<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fares extends Model
{
    protected $fillable = [
    	'vehicle_type', 'fare_pr_km', 'minimum_fare', 'minimum_distance', 'waiting_fare',
	];
}
