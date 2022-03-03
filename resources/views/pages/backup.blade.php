@extends('layouts.app')

@section('content')

<div class="container">

<div class="row p-3 bg-primary mb-0 jumbotron justify-content-center">
    <div class="col-md-12">
        <h3 class="text-center text-white mb-0">Backup Database</h3>
    </div>
</div>

<div class="row mt-0 jumbotron bg-light justify-content-center">
        <a href="{{ route('backup.create') }}" class="btn btn-success">Create Backup</a>
        <table class="table mt-2">
            <thead>
                <tr>
                <th scope="col">FileName</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($backups as $backup)
                    <tr>
                        <th scope="row">{{ $backup['file_name'] }}</th>
                        <td>
                            <a href="{{ route('backup.download', $backup['file_name']) }}" class="btn btn-primary">
                                <i class="fa fa-download"></i>
                                Download
                            </a>
                            <a href="{{ route('backup.delete', $backup['file_name']) }}" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</div>
@endsection
