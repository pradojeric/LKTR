<?php

namespace App\Http\Controllers;

use App\EventQuestion;
use App\EventCategory;
use App\EventAnswer;
use Illuminate\Http\Request;

class EventQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EventCategory $event_category)
    {
        //
        return view('pages.game_events.categories.view', compact('event_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(EventCategory $event_category)
    {
        //
        return view('pages.game_events.questions.add', compact('event_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, EventCategory $event_category)
    {
        //
        $validated = $request->validate([
            'question_text' => 'required',
            'answer_text' => 'required|array',
            'answer_text.*' => 'required',
            'time' => 'required',
        ]);

        $data = array();

        foreach($request->answer_text as $i => $value)
        {
            if($i == 0)
                $correct = true;
            else
                $correct = false;
            $data[] = ['answer_text' => $value, 'correct' => $correct];
        }

        $question = $event_category->eventQuestions()->create($validated);
        $question->eventAnswers()->createMany($data);

        return redirect()->route('event_categories.event_questions.create', $event_category)->with('success', 'Question added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventQuestion  $eventQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(EventQuestion $eventQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventQuestion  $eventQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(EventQuestion $eventQuestion)
    {
        //
        return view('pages.game_events.questions.edit', compact('eventQuestion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventQuestion  $eventQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventQuestion $eventQuestion)
    {
        //
        $validated = $request->validate([
            'question_text' => 'required',
            'answer_text' => 'required|array',
            'answer_text.*' => 'required',
            'time' => 'required',
        ]);

        $j = 0;
        foreach($request->answer_text as $i => $value)
        {
            if($j == 0)
                $correct = true;
            else
                $correct = false;
            $answer = EventAnswer::findOrFail($i);
            $answer->update([
                'answer_text' => $value,
                'correct' => $correct,
            ]);
            $j++;
        }

        $eventQuestion->update($validated);

        return redirect()->route('event_categories.event_questions.index', $eventQuestion->eventCategory)->with('success', 'Question successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventQuestion  $eventQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventQuestion $eventQuestion)
    {
        //
        $eventQuestion->eventAnswers()->delete();
        $eventQuestion->delete();
        return redirect()->route('event_categories.event_questions.index', $eventQuestion->eventCategory)->with('success', 'Question successfully deleted');
    }

    public function enable(Request $request, EventQuestion $question)
    {
        $question->enabled = $request->enabled;
        $question->save();

        return response()->json($question);
    }

    public function getCategories()
    {

        $categories = EventCategory::all();
        $output = "";
        foreach($categories as $category){
            $output .= "<option value='$category->id' class='l'> $category->category </option>";
        }
        return $output;
    }

    public function copy($category_id, $question_id)
    {
        $old_question = EventQuestion::findOrFail($question_id);
        $old_question->load('eventAnswers');
        $question = $old_question->replicate();
        $question->event_category_id = $category_id;
        $question->save();

        foreach($old_question->getRelations() as $relation => $items){
            foreach($items as $item){
                unset($item->id);
                $question->{$relation}()->create($item->toArray());
            }
        }

        return redirect()->route('event_categories.event_questions.index', $question->eventCategory);
    }

    public function move($category_id, $question_id)
    {
        $question = EventQuestion::findOrFail($question_id);
        $question->event_category_id = $category_id;
        $question->save();

        return redirect()->route('event_categories.event_questions.index', $question->eventCategory);
    }
}
