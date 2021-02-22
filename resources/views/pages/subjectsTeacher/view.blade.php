@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-8">
<h3 class="text-center text-white my-5">All Subjects</h3>
</div>
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">

            <table class="table table-striped bg-light border-0">
                <thead class="bg-primary text-white">
                <tr>
                    <th>Course</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($subjects as $subject)
                <tr id="row">
                    <td>{{ $subject->course->name }}</td>
                    <td id="name">{{ $subject->name }}</td>
                    <td>
                        <a href="{{ route('subjects.lessons.index', $subject) }}" type="button" class="btn btn-sm btn-info btn-block">View</a>
                        <a href="{{ route('subjects.edit', $subject) }}" type="button" class="btn btn-sm btn-primary btn-block">Edit</a>
                        <button type="button" class="btn btn-sm btn-danger btn-block" id="delete" data-id="{{ $subject->id }}">Delete</button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{ $subjects->links() }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $(document).on('click', '#delete' , function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var name = $(this).closest('tr#row').find('#name').text();
                var url = "{{ url('admin/xyz/subjects/') }}/"+id;
                $('#title').text(name);
                $('#delete-form').attr('action', url);
                $('#deleteModal').modal('show');
            });
        });
    </script>
@endsection
