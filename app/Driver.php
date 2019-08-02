<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'user_id', 'company_id','language', 'currency','payment_email','account_holder_name','account_number','bank_name','bank_location','BIC_SWIFT_code'
    ];
}
