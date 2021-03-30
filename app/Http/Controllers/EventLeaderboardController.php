<?php

namespace App\Http\Controllers;

use App\EventLeaderboard;
use App\GameEvent;
use Illuminate\Http\Request;

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
            EventLeaderboard::updateOrCreate([
                'event_users_id' => $request->uId,
                'game_event_id' => $request->course_id,
            ],[
                'event_users_id' => $request->uId,
                'game_event_id' => $request->course_id,
                'score' => $request->score,
            ]);

            return "Score uploaded";
        }else{
            return "Unauthorized";
        }
    }


}
