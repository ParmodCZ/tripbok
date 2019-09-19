<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'title', 'display_order','url', 'status','validity','activation_date','expire_date'
    ];
}
