@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-8">
<h3 class="text-center text-white my-5">Videos</h3>
</div>
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">


            <table class="table table-striped bg-light border-0">
                <thead class="bg-primary text-white">
                <tr>
                    <th>Courses</th>
                    <th>Videos</th>

                </tr>
                </thead>
                <tbody>
                <tr>

                    <td>Bachelor of Science in Accountancy</td>
                    <td>
                    <a href="{{ url('/viewvideos') }}" type="button" class="btn btn-sm btn-primary btn-block">View</a>
                    </td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection