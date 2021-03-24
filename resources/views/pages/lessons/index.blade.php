@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-8">
<h3 class="text-center text-white my-5">{{ $subject->name }} lessons</h3>
<h6 class="text-center text-white">{{ $subject->course->name }}</h6>
</div>
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
        <a href="{{ route('courses.subjects.index', $subject->course) }}" type="button" class="btn btn-danger my-3"><i class="fa fa-arrow-left mr-1"></i>Back</a>
        <a href="{{ route('subjects.lessons.create', $subject) }}" type="button" class="btn btn-primary my-3"><i class="fa fa-plus mr-1"></i>Add Lesson</a>
            <div class="card p-4 shadow-sm rounded">
                <table class="table table-striped bg-light border-0">
                    <thead class="bg-primary text-white">
                    <tr>
                        <th>Name</th>
                        <th width="30%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($subject->lessons as $lesson)
                    <tr id="row">
                        <td id="name">{{ $lesson->name }}</td>
                        <td>
                            <a href="{{ route('lessons.questions.index', $lesson) }}" type="button" class="dropdown-item text-primary"><i class="fa fa-eye mr-1"></i>View</a>
                            <a href="{{ route('lessons.edit', $lesson) }}" type="button" class="dropdown-item text-info"><i class="fa fa-edit mr-1"></i>Edit</a>
                            @can('admin-only')
                                <button type="button" class="dropdown-item text-danger" id="delete" data-id="{{ $lesson->id }}"><i class="fa fa-trash mr-1"></i>Delete</button>
                            @endcan
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
        $(document).ready(function(){
            $(document).on('click', '#delete',function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var name = $(this).closest('tr#row').find('#name').text();
                var url = "{{ url('/lessons/') }}/"+id;
                $('#title').text(name);
                $('#delete-form').attr('action', url);
                $('#deleteModal').modal('show');
            });
        });

        $('.table').DataTable();
    </script>

@endsection
