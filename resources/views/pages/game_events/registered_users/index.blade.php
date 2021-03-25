@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-8">
<h3 class="text-center text-white my-5">Game Events Users for <span class="font-weight-bold">{{ $game_event->name }}</span></h3>
</div>
</div>
    <div class="row justify-content-center">
        <div class="col-md-10">
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
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($game_event->users as $user)
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
                                <td>
                                    <button class="btn btn-danger text-white" type="button" onclick="event.preventDefault(); document.getElementById('delete_user{{ $user->id }}').submit();"><i class="fa fa-trash"></i></button>
                                    <form method="post" action="{{ route('event_users.destroy', $user) }}" id="delete_user{{ $user->id }}">
                                        @csrf
                                        @method('delete')
                                    </form>
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
    $('.table').DataTable({
        'ordering': false,
    });


</script>
@endsection
