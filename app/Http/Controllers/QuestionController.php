<?php

namespace App\Http\Controllers;

use App\Course;
use App\Subject;
use App\Lesson;
use App\Question;
use App\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Lesson $lesson)
    {
        //
        return view('pages.questions.add', compact('lesson'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Lesson $lesson, Request $request)
    {
        //
        $request->validate([
            'question_text' => 'required',
            'choice_text' => 'required|array',
            'choice_text.*' => 'required',
            'time' => 'required',
            'difficulty' => 'required',
            'justification' => 'required',
        ]);

        $data = array();

        foreach($request->choice_text as $i => $value)
        {
            if($i == 0)
                $correct = true;
            else
                $correct = false;
            $data[] = ['choice_text' => $value, 'correct' => $correct];
        }

        $question = $lesson->questions()->create($request->only(['question_text', 'time', 'difficulty', 'justification']));
        $question->answers()->createMany($data);

        return redirect()->route('lessons.questions.create', $lesson)->with('success', 'Question is successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
        return view('pages.questions.edit', compact('question'));
    }

    public function editQuestion(Question $question, $number)
    {
        //
        return $question;
        return view('pages.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
        $request->validate([
            'question_text' => 'required',
            'choice_text' => 'required|array',
            'choice_text.*' => 'required',
            'time' => 'required',
            'difficulty' => 'required',
            'justification' => 'required',
        ]);

        $j = 0;
        foreach($request->choice_text as $i => $value)
        {
            if($j == 0)
                $correct = true;
            else
                $correct = false;
            $answer = Answer::find($i);
            $answer->update([
                'choice_text' => $value,
                'correct' => $correct,
            ]);
            $j++;
        }

        $question->update($request->only(['question_text', 'time', 'difficulty', 'justification']));

        return redirect()->route('lessons.show', $question->lesson)->with('success', 'Question is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $this->authorize('admin-only');

        $question->answers()->delete();
        $question->delete();
        return redirect()->route('lessons.show', $question->lesson);
    }

    public function enable(Request $request, Question $question)
    {
        $question->enabled = $request->enabled;
        $question->save();

        return response()->json($question);
    }

    public function getCourses(Request $request)
    {
        $courses = Course::all();
        $output = "";
        foreach($courses as $course){
            if($request->user()->can('view', $course))
                $output .= "<option value='$course->id' class='c'> $course->name </option>";
        }
        return $output;
    }

    public function getSubjects($id)
    {
        $subjects = Subject::where('course_id', $id)->get();
        $output = "";
        foreach($subjects as $subject){
            $output .= "<option value='$subject->id' class='s'> $subject->name </option>";
        }
        return $output;
    }

    public function getLessons($id)
    {
        $lessons = Lesson::where('subject_id', $id)->get();
        $output = "";
        foreach($lessons as $lesson){
            $output .= "<option value='$lesson->id' class='l'> $lesson->name </option>";
        }
        return $output;
    }

    public function copy($lesson_id, $question_id)
    {
        $old_question = Question::findOrFail($question_id);
        $old_question->load('answers');
        $question = $old_question->replicate();
        $question->lesson_id = $lesson_id;
        $question->save();

        foreach($old_question->getRelations() as $relation => $items){
            foreach($items as $item){
                unset($item->id);
                $question->{$relation}()->create($item->toArray());
            }
        }

        return redirect()->route('lessons.show', $question->lesson);
    }

    public function move($lesson_id, $question_id)
    {
        $question = Question::findOrFail($question_id);
        $question->lesson_id = $lesson_id;
        $question->save();

        return redirect()->route('lessons.show', $question->lesson);
    }
}
