@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="text-white">Update Role of {{ $teacher->full_name }}</h1>
    <div class="card p-3">
       <form action="{{ route('teachers.role.update', $teacher) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group row">
                <label for="role_id" class="col-2 col-form-label">Role</label>
                <div class="col-3">
                    <select name="role_id" id="role_id" class="form-control">
                        <option selected disabled>...</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" @if(optional($teacher->role)->id == $role->id) selected @endif>{{ $role->role }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <a href="{{ route('teachers.show', $teacher) }}" class="btn btn-danger"><i class="fa fa-arrow-left mr-1"></i>Back</a>
            <button type="submit" class="btn btn-info"><i class="fa fa-save mr-1"></i>Confirm</button>
       </form>
    </div>
</div>
@endsection

@section('script')

@endsection
