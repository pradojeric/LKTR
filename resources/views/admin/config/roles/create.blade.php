@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 class="text-white">Add Role</h3>
    <div class="card p-3">
        <form action="{{ route('roles.store') }}" method="post">
            @csrf
            <div class="form-group row">
                <label for="role" class="col-2 col-form-label">Name of Role</label>
                <div class="col-3">
                    <input type="text" name="role" class="form-control" id="role">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2">
                    Permissions
                </div>
                <div class="col-3">
                    @foreach($abilities as $ability)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $ability->id }}" name="abilities[]" id="abilty{{$ability->id}}">
                            <label class="form-check-label" for="abilty{{$ability->id}}">
                                {{$ability->ability}}
                            </label>
                        </div>
                    @endforeach
                </div>

            </div>

            <a href="{{ route('roles.index') }}" class="btn btn-danger">Back</a>
            <input type="submit" value="Confirm" class="btn btn-primary">
        </form>
    </div>
</div>
@endsection
