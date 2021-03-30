<?php

namespace App\Http\Controllers;

use App\GameEvent;
use App\EventLeaderboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventLeaderboardController extends Controller
{
    public function index(GameEvent $game_event)
    {
        return view('pages.game_events.registered_users.leaderboard', compact('game_event'));
    }

    public function destroyAll(GameEvent $game_event)
    {

        $game_event->eventLeaderboards()->delete();

        return redirect()->route('event_leaderboard', $game_event);
    }

    //
    public function uploadScore(Request $request, $code)
    {
        if($code == "arzA-Game+20"){

            $validator = Validator::make($request->all(),[
                'uId' => 'required',
                'game_event_id' => 'required',
            ]);

            if($validator->fails()){
                return response()->json(['error' => $validator->errors()->all()]);
            }

            EventLeaderboard::updateOrCreate([
                'event_users_id' => $request->uId,
                'game_event_id' => $request->game_event_id,
            ],[
                'event_users_id' => $request->uId,
                'game_event_id' => $request->game_event_id,
                'score' => $request->score,
            ]);

            return "Score uploaded";
        }else{
            return "Unauthorized";
        }
    }


}
