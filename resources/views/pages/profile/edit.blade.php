@extends('layouts.app')

@section('content')
<div class="container">

<div class="row p-3 bg-primary mb-0 jumbotron justify-content-center">
    <div class="col-md-12">
        <h3 class="text-center text-white mb-0">Edit {{ $user->full_name}}</h3>
    </div>
</div>
<form method="post", action="{{ route('users.update', $user) }}">
    @csrf
    @method('put')
    <div class="row mt-0 jumbotron bg-light justify-content-center">

        <div class="col-sm-12 form-group">
            <label>Username</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="User Name" name="name" value="{{ $user->name }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-sm-5 form-group">
            <label>Last Name</label>
            <input type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name" name="last_name" value="{{ $user->last_name }}">
            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-sm-5 form-group">
            <label>First Name</label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name" name="first_name" value="{{ $user->first_name }}">
            @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="col-sm-2 form-group">
            <label>Middle Name</label>
            <input type="text" class="form-control" placeholder="Middle Name" name="middle_name" value="{{ $user->middle_name }}">
        </div>

        <div class="col-sm-6 form-group">
            <label>Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ $user->email }}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-sm-6 form-group">
            <label>Contact</label>
            <input type="text" class="form-control @error('contact') is-invalid @enderror" placeholder="Contact Name" name="contact" value="{{ $user->contact }}">
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
        <a href="{{ url()->previous() }}" type="submit" class="btn btn-sm btn-danger">Cancel</a>
        <button type="submit" class="btn btn-sm btn-primary">Save</button>
        </div>
    </div>
    </form>
</div>
@endsection
