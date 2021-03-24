@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-8">
<h3 class="text-center text-white my-5">Event Leadeboard for <span class="font-weight-bold">{{ $game_event->name }}</span></h3>
</div>
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('game_events.show', $game_event) }}" type="button" class="btn btn-danger my-3"><i class="fa fa-arrow-left mr-2"></i>Back</a>
            <div class="card p-4 shadow-sm rounded">

                <table class="table table-striped bg-light border-0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Event Code</th>
                            <th>Date of Registration</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($game_event->eventUsers as $user)
                            <tr>
                                <td>{{ $user->full_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->code }}</td>
                                <td>{{ date('m/d/y h:i a',strtotime($user->created_at)) }}</td>
                                <td>
                                    @if($user->code)
                                        <a class="btn btn-sm btn-secondary text-dark" href="#">Revoke Code</a>
                                    @else
                                        <a class="btn btn-sm btn-primary text-white" href="{{ route('send_event_code', $user) }}">Accept and Send Code</a>
                                    @endif
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
