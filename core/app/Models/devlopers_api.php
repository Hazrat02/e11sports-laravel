<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class devlopers_api extends Model
{
    protected $table = "bet";
    protected $fillable = [
        'id',
        'key',
        'return',
        'url',

       
    ];
  

}
