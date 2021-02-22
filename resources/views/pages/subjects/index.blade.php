@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-8">
<h3 class="text-center text-white my-5">{{ $course->name }} subjects</h3>
</div>
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('courses.show', $course) }}" type="button" class="btn btn-danger my-3">Back</a>
            <a href="{{ route('courses.subjects.create', $course) }}" type="button" class="btn btn-primary my-3">Add Subject</a>
            <div class="card p-4 shadow-sm rounded">
                <table class="table table-striped bg-light border-0">
                    <thead class="bg-primary text-white">
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($course->subjects as $subject)
                            <tr id="row">
                                <td id="name">{{ $subject->name }}</td>
                                <td>
                                    <a href="{{ route('subjects.lessons.index', $subject) }}" class="btn btn-sm btn-info btn-block">Lessons</a>
                                    <a href="{{ route('subjects.edit', $subject) }}" class="btn btn-sm btn-primary btn-block">Edit</a>
                                    @can('admin-only')
                                        <button type="button" class="btn btn-sm btn-danger btn-block" id="delete" data-id="{{ $subject->id }}">Delete</button>
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
            $(document).on('click', '#delete', function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var name = $(this).closest('tr#row').find('#name').text();
                var url = "{{ url('admin/xyz/subjects/') }}/"+id;
                $('#title').text(name);
                $('#delete-form').attr('action', url);
                $('#deleteModal').modal('show');
            });
        });

        $('.table').DataTable();
    </script>
@endsection
