<?php

namespace App\Http\Controllers;

use App\Course;
use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course)
    {
        //
        return view('pages.subjects.index', compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        //
        return view('pages.subjects.add', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Course $course, Request $request)
    {
        //
        $request->validate([
            'name' => 'required'
        ]);

        Subject::create([
            'course_id' => $course->id,
            'name' => $request->name,
        ]);

        return redirect()->route('courses.subjects.index', compact('course'))->with('success', 'Subject is successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
        return view('pages.subjects.index', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
        return view('pages.subjects.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
        $request->validate([
            'name' => 'required'
        ]);

        $subject->update([
            'name' => $request->name,
        ]);

        $course = $subject->course;

        return redirect()->route('courses.subjects.index', compact('course'))->with('success', 'Subject is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
        $this->authorize('admin-only');
        $subject->delete();
        $course = $subject->course;
        return redirect()->route('courses.subjects.index', compact('course'));
    }

    public function viewAll()
    {
        $subjects = Subject::orderBy('course_id')->paginate(5);
        return view('pages.subjectsTeacher.view', compact('subjects'));
    }
}
