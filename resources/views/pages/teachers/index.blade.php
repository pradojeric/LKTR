@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-8">
<h3 class="text-center text-white my-5">Users</h3>
</div>
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
        <a href="{{ route('teachers.create') }}" type="button" class="btn btn-primary my-3">Add User</a>
            <div class="card shadow-sm p-4 rounded">

                <table class="table table-striped bg-light border-0">
                    <thead class="bg-primary text-white">

                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->full_name }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ optional($teacher->role)->role }}</td>
                            <td>
                                <a href="{{ route('teachers.show', $teacher) }}" type="button" class="btn btn-sm btn-primary">View</a>
                                <a type="button" class="btn btn-sm btn-danger">Delete</a>
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
        $('table').DataTable({
            'order': [['2', 'desc'], ['1', 'desc']]
        });
    </script>
@endsection
