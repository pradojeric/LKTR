@extends('layouts.app')

@section('content')
<div class="container">

<div class="row p-3 bg-primary mb-0 jumbotron justify-content-center">
    <div class="col-md-12">
        <h3 class="text-center text-white mb-0">Add Event Category</h3>
    </div>
</div>
<form method="POST" action="{{ route('game_events.event_categories.store', $game_event) }}">
    @csrf
    <div class="row mt-0 jumbotron bg-light justify-content-center">


            <div class="col-sm-12 form-group">
                <label>Category Name</label>
                <input type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}">
                @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="col-sm-12 text-right mt-5">
                <a href="{{ route('game_events.event_categories.index', $game_event) }}" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-arrow-left mr-1"></i>Cancel</a>
                <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-save mr-1"></i>Save</button>
            </div>



    </div>
    </form>
</div>
@endsection
