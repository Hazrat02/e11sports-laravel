<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class devlopers_api extends Model
{
    protected $table = "devlopers_api";
    protected $fillable = [
        'id',
        'key',
        'return',
        'url',

       
    ];
  

}
