<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bet_log extends Model
{
    protected $table = "bet_logs";
    protected $fillable = [
        
        'user_id',
        'game_id',
        't2',
        't1',
        'winorloss',
        'choose',
        'amount',

        'status',

    ];

}