<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
    'filename', 'file_path', 'module','module_id','submodule'];
}
