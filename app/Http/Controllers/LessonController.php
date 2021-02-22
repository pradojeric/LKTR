<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Subject $subject)
    {
        //
        return view('pages.lessons.index', compact('subject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Subject $subject)
    {
        //
        return view('pages.lessons.add', compact('subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Subject $subject, Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);

        $subject->lessons()->create($request->input());

        return redirect()->route('subjects.lessons.index', $subject);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
        //$lesson->setRelation('questions', $lesson->questions()->paginate(1000));
        return view('pages.lessons.view', compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        //
        return view('pages.lessons.edit', compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);

        $lesson->update($request->input());

        return redirect()->route('subjects.lessons.index', $lesson->subject);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        //
        $this->authorize('admin-only');
    }
}
