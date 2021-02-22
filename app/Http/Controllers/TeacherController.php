<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.teachers.index', ['teachers' => User::whereNotIn('id', [1])->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.teachers.add', ['roles' => Role::whereNotIn('id', [1])->get()]);
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
        DB::beginTransaction();

        $validated = $request->validate([
            'name' => 'required|max:20|alpha_dash',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            'password' => 'required|confirmed',
            'course_id' => 'required',
        ]);

        $teacher = User::create([
            'name' => $request->name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => Hash::make($request->password),
        ]);

        DB::commit();

        return redirect()->route('teachers.index')->with('success', 'Teaacher is successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(User $teacher)
    {
        //
        return view('pages.teachers.view', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(User $teacher)
    {
        //
        $roles = Role::whereNotIn('id', [1])->get();
        $teacher = User::findOrFail($teacher->id);
        return view('pages.teachers.edit', compact('teacher', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $teacher)
    {
        //
        DB::beginTransaction();

        $validated = $request->validate([
            'name' => 'required|max:20|alpha_dash',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            'password' => 'required|confirmed',
            'role_id' => 'required',
        ]);

        $teacher->update([
            'name' => $request->name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => Hash::make($request->password),
        ]);

        $teacher->assignTo($request->role_id);

        DB::commit();

        return redirect()->route('teachers.index')->with('success', 'Teacher is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $teacher)
    {
        //
    }

    public function changeRole(User $teacher)
    {
        $roles = Role::whereNotIn('id', [1])->get();
        return view('pages.teachers.update_role', compact('teacher', 'roles'));
    }

    public function updateRole(Request $request, User $teacher)
    {
        $request->validate([
            'role_id' => 'required',
        ]);

        $teacher->assignTo($request->role_id);

        return redirect()->route('teachers.show', compact('teacher'));
    }

    public function changeCourses(User $teacher)
    {
        $courses = Course::all();
        return view('pages.teachers.update_courses', compact('teacher', 'courses'));
    }

    public function updateCourses(Request $request, User $teacher)
    {
        $teacher->coursesAllowed($request->courses);

        return redirect()->route('teachers.show', compact('teacher'));
    }
}
