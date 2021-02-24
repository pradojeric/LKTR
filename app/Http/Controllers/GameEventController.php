<?php

namespace App\Http\Controllers;

use App\GameEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class GameEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.game_events.index', ['game_events' => GameEvent::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.game_events.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_date' => 'required|date',
            'end_time' => 'required|date_format:H:i',
            'description' => 'required'
        ]);

        $starting_event = date('Y-m-d H:i:s', strtotime("$request->start_date $request->start_time"));
        $ending_event = date('Y-m-d H:i:s', strtotime("$request->end_date $request->end_time"));

        GameEvent::create([
            'name' => $request->name,
            'description' => $request->description,
            'starting_event' => $starting_event,
            'ending_event' => $ending_event,
            'event_code' => Str::random(8),
        ]);

        return redirect()->route('game_events.index')->with('success', 'Event successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GameEvent  $gameEvent
     * @return \Illuminate\Http\Response
     */
    public function show(GameEvent $gameEvent)
    {
        //
        return view('pages.game_events.view', compact('gameEvent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GameEvent  $gameEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(GameEvent $gameEvent)
    {
        //
        return view('pages.game_events.edit', compact('gameEvent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GameEvent  $gameEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GameEvent $gameEvent)
    {
        //
        $request->validate([
            'name' => 'required',
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_date' => 'required|date',
            'end_time' => 'required|date_format:H:i',
            'description' => 'required'
        ]);

        $starting_event = date('Y-m-d H:i:s', strtotime("$request->start_date $request->start_time"));
        $ending_event = date('Y-m-d H:i:s', strtotime("$request->end_date $request->end_time"));

        $gameEvent->update([
            'name' => $request->name,
            'description' => $request->description,
            'starting_event' => $starting_event,
            'ending_event' => $ending_event,
        ]);

        return redirect()->route('game_events.show', $gameEvent)->with('success', 'Event successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GameEvent  $gameEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(GameEvent $gameEvent)
    {
        //
    }
}
