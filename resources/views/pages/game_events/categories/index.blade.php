@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-8">
<h3 class="text-center text-white my-5">Game Events Users</h3>
</div>
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="#" type="button" class="btn btn-danger my-3"><i class="fa fa-arrow-left mr-2"></i>Back</a>
            <div class="card p-4 shadow-sm rounded">

                <table class="table table-striped bg-light border-0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Event Code</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

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
