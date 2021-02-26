@extends('layouts.app')

@section('content')
<div class="container">

<div class="row p-3 bg-primary mb-0 jumbotron justify-content-center">
    <div class="col-md-12">
        <h3 class="text-center text-white mb-0">Edit Question</h3>
    </div>
</div>
<form method="post" action="{{ route('event_questions.update', $eventQuestion) }}">
    @csrf
    @method('put')
    <div class="row mt-0 jumbotron bg-light justify-content-center">

            <div class="col-sm-12 form-group">
                <label>Question</label>
                <textarea class="form-control @error('question_text') is-invalid @enderror" rows="4" placeholder="Question" name="question_text">{{ $eventQuestion->question_text }}</textarea>
                @error('question_text')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            @foreach($eventQuestion->eventAnswers as $answer)
                <div class="col-sm-6 form-group">
                    <label>@if($loop->first) Correct Answer @else Choice {{ $loop->index }} @endif </label>
                    <input type="text" class="form-control border @if($loop->first) border-success @else border-danger @endif @error('answer_text'.$answer->id) is-invalid @enderror" placeholder="Correct Answer" value="{{ $answer->answer_text }}" name="answer_text[{{$answer->id}}]">
                    @error('answer_text'.$answer->id)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            @endforeach

            <div class="col-sm-3 form-group">
                <label>Difficulty</label>
                <select class="form-control @error('difficulty') is-invalid @enderror" name="difficulty">
                    <option value="easy">Easy</option>
                    <option value="medium">Medium</option>
                    <option value="hard">Hard</option>
                </select>
                @error('difficulty')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-sm-3 form-group">
                <label>Time</label>
                <input type="number" class="form-control @error('time') is-invalid @enderror" placeholder="Time" name="time" value="{{ $eventQuestion->time }}">
                @error('time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-sm-12 text-right mt-2">
            <a href="{{ route('event_categories.event_questions.index', $eventQuestion->eventCategory) }}" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-arrow-left mr-1"></i>Cancel</a>
            <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-save mr-1"></i>Save</button>
            </div>
        </div>
    </form>
</div>
@endsection
