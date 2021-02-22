<?php

namespace App\Http\Controllers;

use App\User;
use App\Token;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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
        $this->authorize('admin-only', Auth::user());

        $token = Auth::user()->createToken('elektro-mobile');
        $plainTextToken = $token->plainTextToken;

        Token::Create([
            'user_id' => Auth::id(),
            'personal_access_token_id' => $token->accessToken->id,
            'token' => $plainTextToken
        ]);
        return redirect()->route('users.show', ['user' => Auth::id()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return view('pages.profile.view', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('pages.profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //

        $validated = $request->validate([
            'name' => 'required|max:20|alpha_dash',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user->update([
            'name' => $request->name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.show', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function destroyToken()
    {
        Auth::user()->tokens()->delete();
        return redirect()->route('users.show', compact('user'));
    }
}
