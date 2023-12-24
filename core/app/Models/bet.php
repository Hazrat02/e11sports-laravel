<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bet extends Model
{
    protected $table = "bet";
    protected $fillable = [
        
        'game',
        't1',
        't2',
        't1_img',
        't2_img',
        'min',
        'max',
        'status',
        'win',
        'ratios',

      
       
    ];

}
