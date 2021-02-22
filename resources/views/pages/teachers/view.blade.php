@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between mx-2 my-3">
                <a href="{{ route('teachers.index') }}" class="btn btn-danger">Back</a>
                <a href="{{ route('teachers.edit', $teacher)}}" class="btn btn-primary">Edit Profile</a>
            </div>
            <div class="mx-2 my-4 py-4">
                <div class="col-sm-12 mx-auto">
                    <div class="card">
                        <h4 class="card-header">Profile Info</h4>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    Name:
                                </div>
                                <div class="col-sm-8">
                                    {{ $teacher->full_name }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    Userame:
                                </div>
                                <div class="col-sm-8">
                                    {{ $teacher->name }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    Role:
                                </div>
                                <div class="col-sm-2">
                                    <a href="{{ route('teachers.role', $teacher) }}" class="btn btn-sm btn-info">Change Role</a>
                                </div>
                                <div class="col-sm-4">
                                    {{ optional($teacher->role)->role }}
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    Courses:
                                </div>
                                <div class="col-sm-2">
                                    <a href="{{ route('teachers.courses', $teacher) }}" class="btn btn-sm btn-info">Manage</a>
                                </div>
                                <div class="col-sm-6">
                                    <ul>
                                        @forelse($teacher->courses as $course)
                                            <li>{{ $course->name }}</li>
                                        @empty
                                            No courses
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $(document).on('click', '#versionAdd, #versionEdit', function(event){
            event.preventDefault();
            var type, url;
            var id = $('#versionId').text();
            var clicked = $(this).data('target');

            if(clicked == "add")
            {
                type = "Add";
                url = "{{ url('admin/versions/') }}";
            }
            else if(clicked == "edit")
            {
                type = "Edit";
                url = "{{ url('admin/versions/') }}/" + id;
                $('#version-form').append('@method('put')');
                var version = $('#versionNum').text();
                $('#version').val(version);
            }


            $('#versionTitle').text(type);
            $('#version-form').attr('action', url);
            $('#versionModal').modal('show');
        });
    });

</script>

@endsection
