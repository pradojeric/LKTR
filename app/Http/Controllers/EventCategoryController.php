<?php

namespace App\Http\Controllers;

use App\EventCategory;
use App\GameEvent;
use Illuminate\Http\Request;

class EventCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GameEvent $game_event)
    {
        //
        return view('pages.game_events.categories.index', compact('game_event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(GameEvent $game_event)
    {
        //
        return view('pages.game_events.categories.add', compact('game_event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, GameEvent $game_event)
    {
        //
        $validated = $request->validate([
            'category' => 'required'
        ]);

        $game_event->eventCategories()->create($validated);

        return redirect()->route('game_events.event_categories.index', $game_event)->with('success', 'Category successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventCategory  $eventCategory
     * @return \Illuminate\Http\Response
     */
    public function show(EventCategory $eventCategory)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventCategory  $eventCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(EventCategory $eventCategory)
    {
        //
        return view('pages.game_events.categories.edit', compact('eventCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventCategory  $eventCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventCategory $eventCategory)
    {
        //
        $validated = $request->validate([
            'category' => 'required',
        ]);

        $eventCategory->update($validated);

        return redirect()->route('game_events.event_categories.index', $eventCategory->gameEvent)->with('success', 'Category successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventCategory  $eventCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventCategory $eventCategory)
    {
        //
    }
}
