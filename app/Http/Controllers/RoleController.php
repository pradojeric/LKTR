<?php

namespace App\Http\Controllers;

use App\Ability;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::all();
        return view('admin.config.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $abilities = Ability::all();
        return view('admin.config.roles.create', compact('abilities'));
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
            'role' => 'required'
        ]);

        Role::create($request->input());

        return redirect()->route('roles.index')->with('success', "Role is successfully added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
        $abilities = Ability::all();
        return view('admin.config.roles.view', compact('role', 'abilities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        $abilities = Ability::all();
        return view('admin.config.roles.edit', compact('role', 'abilities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
        $request->validate([
            'role' => 'required'
        ]);

        $role->update([
            'role' => $request->role
        ]);
        $role->allowTo($request->abilities);

        return redirect()->route('roles.show', compact('role'))->with('success', "Role is successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        $role->delete();

        return redirect()->route('config.configuration');
    }
}
