@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="text-white">Update Courses of {{ $teacher->full_name }}</h1>
    <div class="card p-3">
       <form action="{{ route('teachers.courses.update', $teacher) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group row">
                <div class="col-2">
                    Courses
                </div>
                <div class="col-3">
                    @foreach($courses as $course)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $course->id }}" name="courses[]" id="course{{ $course->id }}" @if($teacher->courses->contains($course)) checked @endif>
                            <label class="form-check-label" for="course{{$course->id}}">
                                {{$course->name}}
                            </label>
                        </div>
                    @endforeach
                </div>

            </div>
            <a href="{{ route('teachers.show', $teacher) }}" class="btn btn-danger"><i class="fa fa-arrow-left mr-2"></i>Back</a>
            <button type="submit" class="btn btn-info"><i class="fa fa-save mr-2"></i>Confirm</button>
       </form>
    </div>
</div>
@endsection

@section('script')

@endsection
