@extends('layouts.app')

@section('content')
<div class="container">

<div class="row p-3 bg-primary mb-0 jumbotron justify-content-center">
    <div class="col-md-12">
        <h3 class="text-center text-white mb-0">Upload Video</h3>
    </div>
</div>

<div class="row mt-0 jumbotron bg-light justify-content-center">


    <div class="col-md-12">

          <div class="form-group">
            <label >Title</label>
            <input type="text" class="form-control" placeholder="Enter Title">
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea type="email" class="form-control" placeholder="Enter Description" rows="3"></textarea>
          </div>

          <div class="form-group">
          <label>Choose File</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input">
                        <label class="custom-file-label">Broswe File</label>
                    </div>
        </div>


          <div class="text-right mt-5">
            <a href="{{ url('/viewvideos') }}" type="submit" class="btn btn-sm btn-danger">Cancel</a>
            <a type="submit" class="btn btn-sm btn-primary">Save</a>
        </div>

    </div> 


        


</div>


</div>
@endsection