<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Smartphone extends Model
{
    protected $fillable = [
        
        'model',
        'name',
        'imei',
        'sn'
    ];
}
