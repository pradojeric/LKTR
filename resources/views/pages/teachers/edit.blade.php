@extends('layouts.app')

@section('content')
<div class="container">

<div class="row p-3 bg-primary mb-0 jumbotron justify-content-center">
    <div class="col-md-12">
        <h3 class="text-center text-white mb-0">Edit User</h3>
    </div>
</div>
<form method="post", action="{{ route('teachers.update', $teacher) }}">
    @csrf
    @method('put')
    <div class="row mt-0 jumbotron bg-light justify-content-center">

        <div class="col-sm-6 form-group">
            <label>Username</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="User Name" name="name" value="{{ $teacher->name }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-sm-6 form-group">
            <label>Role</label>
            <select class="form-control @error('role_id') is-invalid @enderror" name="role_id" id="role_id">
                <option selected hidden disabled>...</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" @if($teacher->role == $role) selected @endif>{{ $role->role }}</option>
                @endforeach
            </select>
            @error('role_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-sm-5 form-group">
            <label>Lastname</label>
            <input type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name" name="last_name" value="{{ $teacher->last_name }}">
            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-sm-5 form-group">
            <label>Firstname</label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name" name="first_name" value="{{ $teacher->first_name }}">
            @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="col-sm-2 form-group">
            <label>Middlename</label>
            <input type="text" class="form-control" placeholder="Middle Name" name="middle_name" value="{{ $teacher->middle_name }}">
        </div>

        <div class="col-sm-6 form-group">
            <label>Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ $teacher->email }}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-sm-6 form-group">
            <label>Contact</label>
            <input type="text" class="form-control @error('contact') is-invalid @enderror" placeholder="Contact Number" name="contact" value="{{ $teacher->contact }}">
            @error('contact')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-sm-6 form-group">
            <label>Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-sm-6 form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" name="password_confirmation">
            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-sm-12 text-right mt-5">
        <a href="{{ url()->previous() }}" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-arrow-left mr-1"></i>Cancel</a>
        <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-save mr-1"></i>Save</button>
        </div>



    </div>
    </form>
</div>
@endsection
