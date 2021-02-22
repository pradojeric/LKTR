@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="text-white">Add Ability</h1>
    <div class="card p-3 bg-light">
       <form action="{{ route('abilities.store') }}" method="post">
            @csrf
            <div class="form-group row">
                <label for="ability" class="col-2 col-form-label">Name of Ability</label>
                <div class="col-3">
                    <input type="text" name="ability" class="form-control" id="ability">
                </div>
            </div>
            <a href="{{ route('abilities.index') }}" class="btn btn-danger">Back</a>
            <input type="submit" value="Confirm" class="btn btn-primary">
       </form>
    </div>
</div>
@endsection

@section('script')

@endsection
