@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-8">
<h3 class="text-center text-white my-5">Course Mangement</h3>
</div>
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @can('admin-only')
                <a href="{{ route('courses.create') }}" type="button" class="btn btn-primary my-3">Add Course</a>
            @endcan
            <div class="card p-4 shadow-sm rounded">

                <table class="table table-striped bg-light border-0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Courses</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            @can('view', $course)
                                <tr>
                                    <td>{{ $course->name }}</td>
                                    <td>
                                        @if($course->trashed())
                                            <a href="{{ route('courses.restore', $course)}}" type="button" class="btn btn-sm btn-secondary btn-block">Restore</a>
                                        @else
                                            <a href="{{ route('courses.show', $course)}}" type="button" class="btn btn-sm btn-primary btn-block">View</a>
                                        @endif
                                    </td>
                                </tr>
                            @endcan
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
