<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
    'vehicle_number', 'type', 'model','company_id','driver_id', 'seats', 'price_pr_km', 'price_pr_min', 'mini_fare','commission', 'passenger_cancellation_time', 'passenger_cancellation_charges',  'insurance_renewal_date','waiting_time_limt','waiting_charge','trip_hold_fees'
	];
}
