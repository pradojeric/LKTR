<?php

namespace App\Http\Controllers;

use App\Ability;
use Illuminate\Http\Request;

class AbilityController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abilities = Ability::all();
        return view('admin.config.abilities.index', compact('abilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.config.abilities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'ability' => 'required'
        ]);

        Ability::create([
            'ability' => $request->ability,
        ]);

        return redirect()->route('abilities.index')->with('success', "Ability is successfully added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function show(Ability $ability)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function edit(Ability $ability)
    {
        //
        return view('admin.config.abilities.edit', compact('ability'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ability $ability)
    {
        //
        $request->validate([
            'ability' => 'required'
        ]);
        $ability->ability = $request->ability;
        $ability->save();

        return redirect()->route('abilities.index')->with('success', "Ability is successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ability $ability)
    {
        //
        $ability->delete();

        return redirect()->route('config.configuration');
    }
}
