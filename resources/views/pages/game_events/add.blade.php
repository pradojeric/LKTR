@extends('layouts.app')

@section('content')
<div class="container">

<div class="row p-3 bg-primary mb-0 jumbotron justify-content-center">
    <div class="col-md-12">
        <h3 class="text-center text-white mb-0">Add Event</h3>
    </div>
</div>
<form method="POST" action="{{route('game_events.store')}}">
@csrf
    <div class="row mt-0 jumbotron bg-light justify-content-center">

            <div class="col-sm form-group">
                <label>Event Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Event Name" name="name" value="{{ old('name') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-sm-auto form-group">
                <label>Start Date</label>
                <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date') }}">
                @error('start_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-sm-auto form-group">
                <label>Start Time</label>
                <input type="time" class="form-control @error('start_time') is-invalid @enderror" name="start_time" value="{{ old('start_time') }}">
                @error('start_time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-sm-auto form-group">
                <label>End Date</label>
                <input type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date') }}">
                @error('end_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-sm-auto form-group">
                <label>End Time</label>
                <input type="time" class="form-control @error('end_time') is-invalid @enderror" name="end_time" value="{{ old('end_time') }}">
                @error('end_time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-sm-12 form-group">
                <label>Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" rows="7" name="description"></textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-sm-12 text-right mt-5">
            <a href="{{ route('game_events.index') }}" type="submit" class="btn btn-sm btn-danger">Cancel</a>
            <button type="submit" class="btn btn-sm btn-primary">Save</button>
            </div>



    </div>
    </form>
</div>
@endsection
