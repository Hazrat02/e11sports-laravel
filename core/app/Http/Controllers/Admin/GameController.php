<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\bet;
use App\Models\Game;
use App\Models\bet_log;
use App\Models\GameLog;
use App\Models\GuessBonus;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class GameController extends Controller {
    public function index() {
        $pageTitle = "Games";
        $games     = Game::latest()->get();
        return view('admin.game.index', compact('pageTitle', 'games'));
    }

    public function edit($id) {
        $game      = Game::findOrFail($id);
        $pageTitle = "Update " . $game->name;
        $view      = 'game_edit';
        $bonuses   = null;
        if ($game->alias == 'number_guess' || $game->alias == 'number_slot') {
            if ($game->alias == 'number_guess') {
                $bonuses = GuessBonus::get();
            }
            $view = $game->alias;
        }
        return view('admin.game.' . $view, compact('pageTitle', 'game', 'bonuses'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name'        => 'required',
            'min'         => 'required|numeric',
            'max'         => 'required|numeric',
            'instruction' => 'required',
            'win'         => 'sometimes|required|numeric',
            'invest_back' => 'sometimes|required',
            'probable'    => 'nullable|integer|max:100',
            'level.*'     => 'sometimes|required',
            'chance.*'    => 'sometimes|required|numeric',
            'image'       => ['nullable', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ], [
            'level.0.required'  => 'Level 1 field is required',
            'level.1.required'  => 'Level 2 field is required',
            'level.2.required'  => 'Level 3 field is required',
            'chance.0.required' => 'No win chance field required',
            'chance.1.required' => 'Double win chance field is required',
            'chance.2.required' => 'Single win chance field is required',
            'chance.3.required' => 'Triple win field is required',
            'chance.*.numeric'  => 'Chance field must be a number',
        ]);
        $winChance = $request->probable;

        if (isset($request->chance)) {

            if (array_sum($request->chance) != 100) {
                $notify[] = ['error', 'The sum of winning chance must be equal of 100'];
                return back()->withNotify($notify);
            }

            $winChance = $request->chance;
        }

        $game = Game::findOrFail($id);

        $game->name         = $request->name;
        $game->min_limit    = $request->min;
        $game->max_limit    = $request->max;
        $game->probable_win = $winChance;
        $game->invest_back  = $request->invest_back ? Status::YES : Status::NO;
        $game->instruction  = $request->instruction;
        $game->level        = $request->level;
        $game->win          = $request->win;

        $oldImage = $game->image;

        if ($request->hasFile('image')) {
            try {
                $game->image = fileUploader($request->image, getFilePath('game'), getFileSize('game'), $oldImage);
            } catch (\Exception$e) {
                $notify[] = ['error', 'Could not upload the Image.'];
                return back()->withNotify($notify);
            }
        }

        $game->save();

        $notify[] = ['success', 'Game updated successfully'];
        return back()->withNotify($notify);
    }

    public function gameLog(Request $request) {

        $pageTitle = "Game Logs";
        $logs      = GameLog::where('status', Status::ENABLE)->searchable(['user:username'])->filter(['win_status'])->with('user', 'game')->latest('id')->paginate(getPaginate());
        return view('admin.game.log', compact('pageTitle', 'logs'));
    }

    public function chanceCreate(Request $request) {

        $request->validate([
            'chance'    => 'required|array|min:1',
            'chance.*'  => 'required|integer|min:1',
            'percent'   => 'required|array',
            'percent.*' => 'required|numeric',
        ]);

        GuessBonus::truncate();

        $data = [];
        for ($a = 0; $a < count($request->chance); $a++) {
            $data[] = [
                'chance'  => $request->chance[$a],
                'percent' => $request->percent[$a],
                'status'  => Status::ENABLE,
            ];
        }

        GuessBonus::insert($data);

        $notify[] = ['success', 'Chance bonus Create Successfully'];
        return back()->withNotify($notify);
    }

    public function status($id) {
        $game = Game::findOrFail($id);

        if ($game->status == Status::ENABLE) {
            $game->status = Status::DISABLE;
            $notify[]     = ['success', $game->name . ' disabled successfully'];
        } else {
            $game->status = Status::ENABLE;
            $notify[]     = ['success', $game->name . ' enabled successfully'];
        }

        $game->save();
        return back()->withNotify($notify);
    }
    public function cricket() {
    
        $game=bet::all();
        $upcoming=$game->where('status','1')->where('game','cricket');
        $betting=$game->where('status','2')->where('game','cricket');
        $pageTitle='Cricket Manage';

        return view('admin.game.cricket', compact('pageTitle','upcoming','betting'));
    }
    public function cricketinf( Request $request) {

        $game=bet::where('id',$request->id)->get()->first();
        $log=bet_log::where('game_id',$request->id);

     
        // $gamelog=$log->get();
        // $teamAsuccess=$log->where('status','2')->where('choose',$game->t1)->get();
        $teamBsuccess=$log->where('status','2')->where('choose','india')->get();
        dd($teamBsuccess);
        // $pageTitle=$game->game.' '.'details';
        // return view('admin.game.cricket_details', compact('pageTitle','game','gamelog','teamAsuccess','teamBsuccess'));

    }
    public function betstore( Request $request) {

     
        if ($request->hasFile('t1_img')) {
            $file = $request->File('t1_img');
           
            
            $name =rand(0000000,999999) .$file->getClientOriginalName();
            $file->move(public_path('img/game'), $name);
          
            $path=asset('core/public/img/game/');
           $t1_url= $path.'/'.$name;
          
        }else{
            $t1_url='';
       
            
        }
        if ($request->hasFile('t2_img')) {
            $file = $request->File('t2_img');
           
            
            $name =rand(0000000,999999) .$file->getClientOriginalName();
            $file->move(public_path('img/game'), $name);
          
            $path=asset('core/public/img/game/');
           $t2_url= $path.'/'.$name;
          
        }else{
            $t2_url='';
       
            
        }
        if ($request->ratios == '1') {
            $t1_ratios = $request->ratio_x;
            $t2_ratios = 1 / $request->ratio_x;
        } else {
            $t2_ratios = $request->ratio_x;
            $t1_ratios = 1 / $request->ratio_x;
        }
        
        // $startDateTime = \DateTime::createFromFormat('Y-m-d\TH:i', $request->start)->format('Y-m-d H:i:s');


        bet::create([
            'game'=>$request->game,
            't1'=>$request->t1,
            't2'=>$request->t2,
            't1_img'=>$t1_url,
            't2_img'=>$t2_url,
            't1_ratio'=>$t1_ratios,
            't2_ratio'=>$t2_ratios,
            'min'=>$request->min,
            'max'=>$request->max,
            'status'=>$request->status,
            'fee'=>$request->fee,
            'type'=>$request->type,
            'start'=>$request->start,
            'ratios'=>$request->ratios,


    
        ]);



        $notify[] = ['success', 'Game Create successfully'];
        return back()->withNotify($notify);
     
   

      


    
    }
    public function betstatus( Request $request) {

     
       $bet=bet::find($request->id);
        

       $bet->update([

            'status'=>$request->status,

    
        ]);



        $notify[] = ['success', 'Game Change successfully'];
        return back()->withNotify($notify);
   

      


    
    }
    public function gamestatus( Request $request) {

     
       $bet=bet_log::find($request->id);
        

       $bet->update([

            'status'=>$request->status,

    
        ]);



        $notify[] = ['success', 'Betting data Change successfully'];
        return back()->withNotify($notify);
   

      


    
    }
    public function isbet( Request $request) {

     
       $bet=bet::find($request->id);
        

       $bet->update([

            'isbet'=>$request->status,

    
        ]);



        $notify[] = ['success', 'Betting stop/start successfully'];
        return back()->withNotify($notify);
   

      


    
    }
}
