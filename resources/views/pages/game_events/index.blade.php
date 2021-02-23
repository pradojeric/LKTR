@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-8">
<h3 class="text-center text-white my-5">Game Events Mangement</h3>
</div>
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @can('admin-only')
                <a href="{{ route('game_events.create') }}" type="button" class="btn btn-primary my-3">Add Event</a>
            @endcan
            <div class="card p-4 shadow-sm rounded">

                <table class="table table-striped bg-light border-0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Events</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($game_events as $event)
                            <tr>
                                <td>{{ $event->name }}</td>
                                <td>{{ date('M d, Y h:i A', strtotime($event->starting_event)) }}</td>
                                <td>{{ date('M d, Y h:i A', strtotime($event->ending_event)) }}</td>
                                <td>
                                    <a href="{{ route('game_events.show', $event) }}" type="button" class="btn btn-sm btn-primary btn-block">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
    $('.table').DataTable();
</script>
@endsection
