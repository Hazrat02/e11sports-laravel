<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bet extends Model
{
    protected $table = "bet";
    protected $fillable = [
        'id',
        'game',
        't1',
        't2',
        't1_img',
        't2_img',
        't1_ratio',
        't2_ratio',
        'min',
        'max',
        'status',
        'win',
        'ratios',
        'fee',
        'start',
        'type',
        'isbet'


      
       
    ];
  

}
