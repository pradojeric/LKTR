<?php

namespace App\Http\Controllers;

use App\Leaderboard;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function uploadScore(Request $request, $code)
    {
        if($code == "arzA-Game+20"){
            Leaderboard::updateOrCreate([
                'elektro_user_id' => $request->uId,
                'course_id' => $request->course_id,
            ],[
                'elektro_user_id' => $request->uId,
                'course_id' => $request->course_id,
                'score' => $request->score,
            ]);

            return "Score uploaded";
        }else{
            return "Unauthorized";
        }

    }
}
