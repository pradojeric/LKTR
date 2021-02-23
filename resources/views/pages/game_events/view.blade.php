@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row p-3 bg-primary mb-0 jumbotron justify-content-center">
        <div class="col-md-12">
            <h3 class="text-center text-white mb-0">{{ $gameEvent->name }}</h3>
        </div>
    </div>

    <div class="row mt-0 jumbotron justify-content-center">

        <div class="col-md-3">
            <h5 class="font-weight-bold">Event Description</h5>
        </div>
        <div class="col-md-9">
            <p>{{ $gameEvent->description }}</p>
        </div>

        <div class="col-md-3">
            <h5 class="font-weight-bold">Start Date</h5>
        </div>
        <div class="col-md-9">
            <p>{{ date('M d, Y h:i A', strtotime($gameEvent->starting_event)) }}</p>
        </div>

        <div class="col-md-3">
            <h5 class="font-weight-bold">End Date</h5>
        </div>
        <div class="col-md-9">
            <p>{{ date('M d, Y h:i A', strtotime($gameEvent->ending_event)) }}</p>
        </div>

        <div class="col-md-12 mt-5">
            <div class="d-flex justify-content-between">
                <a href="{{ route('game_events.index') }}" class="btn btn-sm btn-danger">Back</a>
                <div class="d-flex flex-row">
                    <a href="{{ route('game_events.edit', $gameEvent)}}" class="btn btn-sm btn-primary mr-2">Edit</a>
                    <a href="{{ route('game_events.event_users.index', $gameEvent) }}" class="btn btn-sm btn-secondary mr-2">View Registered User</a>
                    <a href="#" class="btn btn-sm btn-info">View Questions</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>

    </script>
@endsection

