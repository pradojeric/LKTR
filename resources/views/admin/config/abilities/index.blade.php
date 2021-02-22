@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="text-white">Abilites</h1>
    <a href="{{ route('abilities.create') }}" class="btn btn-primary">Add Abilty</a>
    <div>
        <table class="table table-striped bg-white">
            <thead>
                <tr>
                    <th>Abilites</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($abilities as $ability)
                    <tr>
                        <td>{{ $ability->ability }}</td>
                        <td><a href="{{ route('abilities.edit', $ability) }}" class="btn btn-info">Edit</a></td>
                        <td><td><button class="btn btn-danger">Delete</button></td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')

@endsection
