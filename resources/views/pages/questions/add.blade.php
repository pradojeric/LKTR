@extends('layouts.app')

@section('content')
<div class="container">

<div class="row p-3 bg-primary mb-0 jumbotron justify-content-center">
    <div class="col-md-12">
        <h3 class="text-center text-white mb-0">Add Question for {{ $lesson->name }}</h3>
    </div>
</div>
<form method="post" action="{{ route('lessons.questions.store', $lesson) }}">
    @csrf
    <div class="row mt-0 jumbotron bg-light justify-content-center">

            <div class="col-sm-12 form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Upload Image</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input">
                        <label class="custom-file-label">Choose file</label>
                    </div>
                </div>
            </div>

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
                <input type="text" class="form-control border border-success @error('choice_text.0') is-invalid @enderror" placeholder="Correct Answer" name="choice_text[0]" value="{{ old('choice_text.0') }}">
                @error('choice_text.0')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-sm-6 form-group">
                <label>Choice 1</label>
                <input type="text" class="form-control @error('choice_text.1') is-invalid @enderror" placeholder="Choice 1" name="choice_text[1]" value="{{ old('choice_text.1') }}">
                @error('choice_text.1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-sm-6 form-group">
                <label>Choice 2</label>
                <input type="text" class="form-control @error('choice_text.2') is-invalid @enderror" placeholder="Choice 2" name="choice_text[2]" value="{{ old('choice_text.2') }}">
                @error('choice_text.2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-sm-6 form-group">
                <label>Choice 3</label>
                <input type="text" class="form-control @error('choice_text.3') is-invalid @enderror" placeholder="Choice 3" name="choice_text[3]" value="{{ old('choice_text.3') }}">
                @error('choice_text.3')
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

            <div class="col-sm-12 form-group">
                <label>Justification</label>
                <textarea class="form-control @error('justification') is-invalid @enderror" rows="4" placeholder="Justification" name="justification"></textarea>
                @error('justification')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-sm-12 text-right mt-2">
            <a href="{{ route('lessons.show', $lesson) }}" type="submit" class="btn btn-sm btn-danger">Cancel</a>
            <button type="submit" class="btn btn-sm btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>
@endsection
