@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="text-white">Roles</h1>
    <a href="{{ route('roles.create') }}" class="btn btn-info">Add Role</a>
    <div>
        <table class="table table-striped bg-white">
            <thead>
                <tr>
                    <th>Role</th>
                    <th>Abilites</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->role }}</td>
                        <td>
                            <ul>

                                @forelse($role->abilities as $ability)
                                    <li>{{ $ability->ability }}</li>
                                @empty
                                    {{ _('No abilities')}}
                                @endforelse
                            </ul>
                        </td>
                        <td><a href="{{ route('roles.show', $role) }}" class="btn btn-info">View Permissions</a></td>
                        <td><button class="btn btn-danger">Delete</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')

@endsection
