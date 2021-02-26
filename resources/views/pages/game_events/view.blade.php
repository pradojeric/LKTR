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
            <h5 class="font-weight-bold">Event Code</h5>
        </div>
        <div class="col-md-9">
            <p>{{ $gameEvent->event_code }}</p>
        </div>

        <div class="col-md-3">
            <h5 class="font-weight-bold">Event Description</h5>
        </div>
        <div class="col-md-9">
            <p class="font-italic">{{ $gameEvent->description }}</p>
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

        <div class="col-md-3">
            <h5 class="font-weight-bold">Status</h5>
        </div>
        <div class="col-md-9">
            <p>
                @if(strtotime($gameEvent->starting_event) == strtotime(date('Y-m-d')))
                    In Progress
                @elseif(strtotime($gameEvent->starting_event) > strtotime(date('Y-m-d')) || strtotime($gameEvent->ending_event) > strtotime(date('Y-m-d')))
                    Not Yet
                @else
                    Finished
                @endif
            </p>
        </div>

        <div class="col-md-12 mt-5">
            <div class="d-flex justify-content-between">
                <a href="{{ route('game_events.index') }}" class="btn btn-sm btn-danger"><i class="fa fa-arrow-left mr-1"></i>Back</a>
                <div class="d-flex flex-row">
                    <a href="{{ route('game_events.edit', $gameEvent)}}" class="btn btn-sm btn-primary mr-2"><i class="fa fa-edit mr-1"></i>Edit</a>
                    <a href="{{ route('game_events.event_users.index', $gameEvent) }}" class="btn btn-sm btn-secondary mr-2"><i class="fa fa-users mr-1"></i>View Registered User</a>
                    <a href="{{ route('game_events.event_categories.index', $gameEvent) }}" class="btn btn-sm btn-info"><i class="fa fa-eye mr-1"></i>View Categories</a>
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

