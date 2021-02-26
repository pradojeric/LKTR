@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-8">
<h3 class="text-center text-white my-5">Categories</h3>
</div>
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('game_events.show', $game_event) }}" type="button" class="btn btn-danger my-3"><i class="fa fa-arrow-left mr-2"></i>Back</a>
            <a href="{{ route('game_events.event_categories.create', $game_event) }}" type="button" class="btn btn-info my-3"><i class="fa fa-plus mr-2"></i>Add Category</a>
            <div class="card p-4 shadow-sm rounded">
                <table class="table table-striped bg-light border-0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Name</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($game_event->eventCategories as $category)
                            <tr>
                                <td>{{ $category->category }}</td>
                                <td>
                                    <a href="{{ route('event_categories.event_questions.index', $category) }}" type="button" class="dropdown-item text-primary"><i class="fa fa-eye mr-1"></i>View</a>
                                    <a href="{{ route('event_categories.edit', $category) }}" type="button" class="dropdown-item text-info"><i class="fa fa-edit mr-1"></i>Edit</a>
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
