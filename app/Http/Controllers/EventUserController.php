<?php

namespace App\Http\Controllers;

use App\EventUser;
use App\GameEvent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EventUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GameEvent $game_event)
    {
        //
        return view('pages.game_events.registered_users.index', compact('game_event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(GameEvent $game_event)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameEvent $game_event, Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventUser  $eventUser
     * @return \Illuminate\Http\Response
     */
    public function show(EventUser $eventUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventUser  $eventUser
     * @return \Illuminate\Http\Response
     */
    public function edit(EventUser $eventUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventUser  $eventUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventUser $eventUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventUser  $eventUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventUser $eventUser)
    {
        //
    }

    public function registerUser(Request $request, $code)
    {
        if($code == "arzA-Game+20"){

            $validator = Validator::make($request->all(),[
                'email' => 'required|email|unique:event_users,email',
                'full_name' => 'required',
            ]);

            if($validator->fails()){
                return response()->json(['error' => $validator->errors()->all()]);
            }

            $user = EventUser::create([
                'game_event_id' => $request->game_event_id,
                'full_name' => $request->full_name,
                'email' => $request->email,
            ]);

            return response()->json(['id' => $user->id]);
        }
        else
        {
            return "Unauthorized";
        }
    }

    public function sendEventCode(EventUser $event_user)
    {
        $random_code = Str::random(8);

        $event_user->code = $random_code;
        $event_user->save();
        Mail::to('arzatech.mail@gmail.com')->send(new \App\Mail\SendEventCode($event_user));

        return redirect()->route('game_events.event_users.index', $event_user->gameEvent);
    }

    public function revokeCode(EventUser $event_user)
    {
        $event_user->code = null;
        $event_user->save();

        return redirect()->route('game_events.event_users.index', $event_user->gameEvent);

    }
}
