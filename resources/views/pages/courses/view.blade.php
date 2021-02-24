@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row p-3 bg-primary mb-0 jumbotron justify-content-center">
        <div class="col-md-12">
            <h3 class="text-center text-white mb-0">{{ $course->coursename }}</h3>
        </div>
    </div>

    <div class="row mt-0 jumbotron justify-content-center">

        <div class="col-md-3">
            <h5 class="font-weight-bold">Course Name</h5>
        </div>
        <div class="col-md-9">
            <p>{{ $course->name }}</p>
        </div>

        <div class="col-md-3">
            <h5 class="font-weight-bold">Course Abbrev</h5>
        </div>
        <div class="col-md-9">
            <p>{{ $course->abbreviation }}</p>
        </div>



        <div class="col-md-3">
            <h5 class="font-weight-bold">Course Description</h5>
        </div>
        <div class="col-md-9">
            <p>{{ $course->description }}</p>
        </div>

        <div class="col-md-6">
            <h6>Subjects</h6>

            <ul>
                @foreach($course->subjects as $subject)
                    <li>{{ $subject->name }}</li>
                @endforeach
            </ul>
            </div>

        <div class="col-md-6">
            @can('admin-only')
                <h6>View Users</h6>
                <ul>
                    @foreach($course->teacherUser as $users)
                        <li>{{ $users->teacher->full_name }}</li>
                    @endforeach
                </ul>
            @endcan
        </div>



        <div class="col-md-12 mt-5">
            <div class="d-flex justify-content-between">

                <a href="{{ route('courses.index') }}" class="btn btn-sm btn-danger"><i class="fa fa-arrow-left mr-1"></i>Back</a>
                <div class="d-flex flex-row">
                    @can('admin-only')
                        <button type="button" class="btn btn-sm btn-danger mr-2" id="delete" data-id={{ $course->slug }}>
                            <i class="fa fa-trash mr-1"></i>Delete
                        </button>
                    <a href="{{ route('courses.edit', $course)}}" class="btn btn-sm btn-info mr-2"><i class="fa fa-edit mr-1"></i>Edit</a>
                    @endcan
                    <a href="{{ route('courses.subjects.index', $course)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye mr-1"></i>View Subjects</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#delete').on('click', function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var name = "{{ $course->name }}  ";
                var url = "{{ url('/courses/') }}/"+id;
                $('#title').text(name);
                $('#delete-form').attr('action', url);
                $('#deleteModal').modal('show');
            });
        });
    </script>
@endsection

