@extends('layouts.app')

@section('content')
<div class="container">

<div class="row p-3 bg-primary mb-0 jumbotron justify-content-center">
    <div class="col-md-12">
        <h3 class="text-center text-white mb-0">Add Question for {{ $event_category->category }}</h3>
    </div>
</div>
<form method="post" action="{{ route('event_categories.event_questions.store', $event_category) }}">
    @csrf
    <div class="row mt-0 jumbotron bg-light justify-content-center">

            <div class="col-sm-12 form-group">
                <label>Question</label>
                <textarea class="form-control @error('question_text') is-invalid @enderror" rows="4" placeholder="Question" name="question_text">{{ old('question_text') }}</textarea>
                @error('question_text')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-sm-6 form-group">
                <label>Correct Answer</label>
                <input type="text" class="form-control border border-success @error('answer_text.0') is-invalid @enderror" placeholder="Correct Answer" name="answer_text[0]" value="{{ old('answer_text.0') }}">
                @error('answer_text.0')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-sm-6 form-group">
                <label>Choice 1</label>
                <input type="text" class="form-control @error('answer_text.1') is-invalid @enderror" placeholder="Choice 1" name="answer_text[1]" value="{{ old('answer_text.1') }}">
                @error('answer_text.1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-sm-6 form-group">
                <label>Choice 2</label>
                <input type="text" class="form-control @error('answer_text.2') is-invalid @enderror" placeholder="Choice 2" name="answer_text[2]" value="{{ old('answer_text.2') }}">
                @error('answer_text.2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-sm-6 form-group">
                <label>Choice 3</label>
                <input type="text" class="form-control @error('answer_text.3') is-invalid @enderror" placeholder="Choice 3" name="answer_text[3]" value="{{ old('answer_text.3') }}">
                @error('answer_text.3')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

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
                <input type="number" class="form-control @error('time') is-invalid @enderror" placeholder="Time" name="time" value="30">
                @error('time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-sm-12 text-right mt-2">
            <a href="{{ route('event_categories.event_questions.index', $event_category) }}" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-arrow-left mr-1"></i>Cancel</a>
            <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-save mr-1"></i>Save</button>
            </div>
        </div>
    </form>
</div>
@endsection
