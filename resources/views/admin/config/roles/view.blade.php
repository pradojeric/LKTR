@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 class="text-white">Show Role</h3>
    <div class="card p-3">

        <div class="row">
            <div class="col-2">
                Name of Role
            </div>
            <div class="col-3">
                {{ $role->role }}
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                Permissions
            </div>
            <div class="col-3">
                @foreach($abilities as $ability)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $ability->id }}" name="abilities[]" id="abilty{{$ability->id}}" disabled @if($role->abilities->contains($ability)) checked @endif>
                        <label class="form-check-label" for="abilty{{$ability->id}}">
                            {{$ability->ability}}
                        </label>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="d-flex">
            <a href="{{ route('roles.index') }}" class="btn btn-danger">Back</a>
            <a href="{{ route('roles.edit', $role) }}" class="btn btn-info">Edit</a>
        </div>


    </div>
</div>
@endsection
