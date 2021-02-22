@extends('layouts.app')

@section('content')
<div class="container">

<div class="row p-3 bg-primary mb-0 jumbotron justify-content-center">
    <div class="col-md-12">
        <h3 class="text-center text-white mb-0">Edit Course</h3>
    </div>
</div>
<form method="POST" action="{{route('courses.update', $course)}}" >
@csrf
@method('put')
    <div class="row mt-0 jumbotron bg-light justify-content-center">

            <div class="col-sm-5 form-group">
                <label>Course Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Course Name" name="name" value="{{ $course->name }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-sm-3 form-group">
                <label>Abbreviation (example: BSA)</label>
                <input type="text" class="form-control @error('abbreviation') is-invalid @enderror" placeholder="Abbreviation" name="abbreviation" value="{{ $course->abbreviation }}">
                @error('abbreviation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="col-sm-3 form-group">
                <label>Product ID</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" placeholder="productID" name="slug" value="{{ $course->slug }}">
                @error('slug')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-sm-1 form-group">
                <label>Free</label>
                <input type="checkbox" class="form-control" name="free" @if($course->free) checked @endif>
            </div>

            <div class="col-sm-12 form-group">
                <label>Description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="7" name="description">{{ $course->description }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>





            <div class="col-sm-12 text-right mt-5">
            <a href="{{ route('courses.show', $course)}}" type="submit" class="btn btn-sm btn-danger">Cancel</a>
            <button type="submit" class="btn btn-sm btn-primary">Save</button>
            </div>



    </div>
    </form>
</div>
@endsection
