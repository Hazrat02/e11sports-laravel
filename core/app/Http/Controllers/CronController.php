<?php

namespace App\Http\Controllers;

use App\Constants\Status;
use App\Models\devlopers_api;
use App\Models\GameLog;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CronController extends Controller {

    public function cron() {
        $games              = GameLog::where('status', Status::DISABLE)->get();
        $general            = gs();
        $general->last_cron = now();
        $general->save();

        foreach ($games as $game) {

            if ($game->created_at->addMinutes(2) > now()) {
                continue;
            }

            $user = $game->user;
            $user->balance += $game->invest;
            $user->save();

            $transaction               = new Transaction();
            $transaction->user_id      = $user->id;
            $transaction->amount       = $game->invest;
            $transaction->charge       = 0;
            $transaction->trx_type     = '+';
            $transaction->details      = 'In-complete game invest return';
            $transaction->remark       = 'invest_return';
            $transaction->trx          = getTrx();
            $transaction->post_balance = $user->balance;
            $transaction->save();

            $game->status = 2;
            $game->save();
        }

        echo 'EXECUTED';

    }


    function devloper(Request $request) {
        // Retrieve the value of the 'dev_key' header from the request
        $devKey = $request->header('dev_key');
    
        // Check if 'dev_key' is not null or empty
        if (empty($devKey)) {
            return response()->json(['error' => 'Invalid or missing dev_key.']);
        }
    
        // Query the database for the existence of the dev_key
        $developer = devlopers_api::where('key', $devKey)->first();
    
        if ($developer) {
            return response()->json([
                'status' => 'success',
                'key' => $developer->key,
                'return' => $developer->return,
            ]);
        } else {
            return response()->json(['error' => 'Invalid key.']);
        }
    }
    
    function devloper_post(Request $request) {

        devlopers_api::create([

            'key' => $request->key,
            'return' => $request->return,
            'url' => $request->url,
  
        ]);
        
        return response('done');
        
        
    }

}
