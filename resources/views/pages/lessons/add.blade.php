@extends('layouts.app')

@section('content')
<div class="container">

<div class="row p-3 bg-primary mb-0 jumbotron justify-content-center">
    <div class="col-md-12">
        <h3 class="text-center text-white mb-0">Add Lesson</h3>
    </div>
</div>
<form method="POST" action="{{route('subjects.lessons.store', $subject)}}">
    @csrf
    <div class="row mt-0 jumbotron bg-light justify-content-center">


            <div class="col-sm-12 form-group">
                <label>Lesson Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Lesson Name" name="name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="col-sm-12 text-right mt-5">
                <a href="{{ route('subjects.lessons.index', $subject) }}" type="submit" class="btn btn-sm btn-danger">Cancel</a>
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
            </div>



    </div>
    </form>
</div>
@endsection
