@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-8">
</div>
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-end mx-2 my-3">
                <a href="{{ route('users.edit', $user)}}" class="btn btn-primary">Edit Profile</a>
            </div>
            <div class="mx-2 my-4 py-4">
                <div class="col-sm-12 mx-auto">
                    <div class="card">
                        <h4 class="card-header">Profile Info</h4>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    Name:
                                </div>
                                <div class="col-sm-8">
                                    {{ $user->full_name }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    Username:
                                </div>
                                <div class="col-sm-8">
                                    {{ $user->name }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    Role:
                                </div>
                                <div class="col-sm-4">
                                    {{ optional($user->role)->role }}
                                </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-2 my-4 py-4">
                @can('admin-only', Auth::user())
                    <div class="card">
                        <h4 class="card-header">API</h4>
                        <div class="d-flex justify-content-center">
                            @if(count($user->plainTextTokens) > 0)
                            <table>
                                <thead>
                                    <tr>
                                        <th>API Key</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user->plainTextTokens as $token)
                                    <tr>
                                        <td class="p-2">{{$token->token}}</td>
                                        <td class="p-2">
                                            <form method="POST" action="{{route('destroy-token', $token->user_id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Revoke API Key</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <form method="POST" action="{{route('users.store')}}">
                                @csrf
                                <button class="btn btn-success">Generate API Key</button>
                            </form>
                            @endif
                        </div>
                    </div>
                @endcan
            </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $(document).on('click', '#versionAdd, #versionEdit', function(event){
            event.preventDefault();
            var type, url;
            var id = $('#versionId').text();
            var clicked = $(this).data('target');

            if(clicked == "add")
            {
                type = "Add";
                url = "{{ url('admin/versions/') }}";
            }
            else if(clicked == "edit")
            {
                type = "Edit";
                url = "{{ url('admin/versions/') }}/" + id;
                $('#version-form').append('@method('put')');
                var version = $('#versionNum').text();
                $('#version').val(version);
            }


            $('#versionTitle').text(type);
            $('#version-form').attr('action', url);
            $('#versionModal').modal('show');
        });
    });

</script>

@endsection
