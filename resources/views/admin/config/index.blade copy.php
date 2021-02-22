@extends('layouts.app')

@section('content')
@include('admin.config._modal')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="text-center text-white my-5">Roles and Abilities</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h4 class="text-white">Roles</h4>
            <button type="button" id="add-role" class="btn btn-primary">Add Roles</button>
            <table class="bg-white table table-striped mt-3">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr id="row">
                        <td>{{ $loop->iteration }}</td>
                        <td id="name">{{ $role->role }}</td>
                        <td>
                            <button class="btn btn-secondary">Abilities</button>
                            <button id="edit" class="btn btn-info">Edit</button>
                            <button id="delete-role" data-id="{{ $role->id }}" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h4 class="text-white">Abilities</h4>
            <button type="button" id="add-ability" class="btn btn-primary">Add Abilities</button>
            <table class="bg-white table table-striped mt-3">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($abilities as $ability)
                    <tr id="row">
                        <td>{{ $loop->iteration }}</td>
                        <td id="name">{{ $ability->abilities }}</td>
                        <td>
                            <button id="edit" class="btn btn-info">Edit</button>
                            <button id="delete-ability" data-id="{{ $ability->id }}" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<form method="post" id="delete-form">
    @csrf
    @method('delete')
</form>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){

        //Add
        $('#add-ability').click(function(event){
            event.preventDefault();

            $('#addModal > span#title').text('Ability');
            $('#add-form > input[type=text]').attr('name', 'abilities');
            $('#add-form').attr('action', '{{ route("config.abilities.store") }}');
            $('#addModal').modal('show');
        });

        $('#add-role').click(function(event){
            event.preventDefault();

            $('#addModal > span#title').text('Role');
            $('#add-form > input[type=text]').attr('name', 'role');
            $('#add-form').attr('action', '{{ route("config.roles.store") }}');
            $('#addModal').modal('show');
        });

        $('#submit-add-form').click(function(event){
            event.preventDefault();
            var input_text = $('#add-form >input[type=text]').val();

            if(input_text === ""){
                alert("Please enter input");
                return;
            }

            $('#add-form').submit();
        });

        //Edit
        $(document).on('click', 'button#edit', function(event){
            event.preventDefault();

            var row = $(this).closest('tr#row');
            var name = row.find('#name').text();

        });

        //Delete
        $(document).on('click', 'button#delete-role', function(event){
            event.preventDefault();

            var id = $(this).data('id');
            var url = "{{ url('config/roles/') }}/" + id;

            $('#delete-form').attr('action', url);
            $('#delete-form').submit();

        });

        $(document).on('click', 'button#delete-ability', function(event){
            event.preventDefault();

            var id = $(this).data('id');
            var url = "{{ url('config/abilities/') }}/" + id;

            $('#delete-form').attr('action', url);
            $('#delete-form').submit();
        });
    });
</script>
@endsection
