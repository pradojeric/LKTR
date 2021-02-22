<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.courses.index', ['courses' => Course::withTrashed()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('admin-only');

        return view('pages.courses.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('admin-only');
        //
        $request->validate([
            'name' => 'required',
            'abbreviation' => 'required',
            'description' => 'required',
            'slug' => 'required',
        ]);

        $free = $request->free ? true : false;

        Course::create([
            'name' => $request->name,
            'abbreviation' => $request->abbreviation,
            'slug' => $request->slug,
            'description' => $request->description,
            'free' => $free,
        ]);

        return redirect()->route('courses.index')->with('success', 'Course is successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
        return view('pages.courses.view', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
        $this->authorize('admin-only');

        return view('pages.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
        $this->authorize('admin-only');

        $request->validate([
            'name' => 'required',
            'abbreviation' => 'required',
            'description' => 'required',
            'slug' => 'required',
        ]);

        $free = $request->free ? true : false;


        $course->update([
            'name' => $request->name,
            'abbreviation' => $request->abbreviation,
            'slug' => $request->slug,
            'description' => $request->description,
            'free' => $free,
        ]);

        return redirect()->route('courses.show', $course)->with('success', 'Course is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
        $this->authorize('admin-only');

        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course is successfully deleted');
    }

    public function restoreCourse($slug)
    {
        $this->authorize('admin-only');

        $course = Course::withTrashed()->whereSlug($slug);
        $course->restore();
        return redirect()->route('courses.index')->with('success', 'Course is successfully restored');
    }
}
