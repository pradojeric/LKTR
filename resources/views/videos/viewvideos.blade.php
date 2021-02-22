@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-8">
<h3 class="text-center text-white my-5">Bachelor of Science in Accountancy</h3>
</div>
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">

        <a href="{{ url('/uploadvideo') }}" type="button" class="btn btn-primary my-3">Upload Video</a>

            <table class="table table-striped bg-light border-0">
                <thead class="bg-primary text-white">
                <tr>
 
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <div class="embed-responsive embed-responsive-16by9">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/_pTU4gwmcMs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        
                    </td>
                    <td>
                        <div class="embed-responsive embed-responsive-16by9">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/g9efJduUVws" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </td>
                    <td>
                        <div class="embed-responsive embed-responsive-16by9">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/0--jJn6zqfg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </td>

                </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection