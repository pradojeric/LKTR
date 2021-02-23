<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ELEKTRO</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/lux/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/button-datatable/css/buttons.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">

    <style>
        html, body {
            background-color: #2d6187 !important;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }
    </style>
</head>
<body>

        @include('pages._modals._modal')
        @include('pages._modals._version')

    <div id="app">

    <div class="d-flex" id="wrapper">

    <!-- Sidebar -->

    <div class="text-white border-0" id="sidebar-wrapper" style="background-color:#03315c;">
      <div class="sidebar-heading text-center font-weight-bold">ELEKTRO</div>
            <div class="list-group">
            @guest
                <a href="{{ route('login') }}" class="list-group-item list-group-item-action">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="list-group-item list-group-item-action">Register</a>
                    @endif
            @else
                <a href="#" class="list-group-item list-group-item-action text-uppercase text-center font-weight-bold bg-primary text-white">{{ Auth::user()->name }}</a>

                <a href="{{ route('home') }}" class="list-group-item list-group-item-action {{ request()->is('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('courses.index') }}" class="list-group-item list-group-item-action
                {{ request()->routeIs('courses.*')
                || request()->routeIs('subjects.*')
                || request()->routeIs('lessons.*')
                || request()->routeIs('questions.*') ? 'active' : '' }}">Courses</a>
                @can('admin-only', Auth::user())
                    <a href="{{ route('teachers.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('teachers.*') ? 'active' : '' }}">Users</a>
                    <a href="{{ route('game_events.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('game_events.*') ? 'active' : '' }}">Game Events</a>
                    {{-- <a href="{{ url('/videos') }}" class="list-group-item list-group-item-action disabled">Videos (Teacher)</a> --}}
                @endcan

                @can('admin-only', Auth::user())
                    <div class="sidebar-heading">
                        Config
                    </div>
                    <a href="{{ route('roles.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('roles.*') ? 'active' : '' }}">Roles</a>
                    <a href="{{ route('abilities.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('abilities.*') ? 'active' : '' }}">Abilities</a>
                @endcan
                <hr>
                <a class="list-group-item list-group-item-action {{ request()->routeIs('users.*') ? 'active' : '' }}" href="{{route('users.show', Auth::user())}}">Edit Profile</a>

                <a href="{{ route('logout') }}" class="list-group-item list-group-item-action bg-danger text-white text-center text-uppercase font-weight-bold" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            @endguest
        </div>

    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-dark  border-0" style="background-color:#03315c;">
        <button style="background-color:#fff;" class="btn btn-sm" id="menu-toggle" type="button"><i class="fa fa-bars fa-2x"></i></button>
    </nav>


        <main class="py-4">
            @include('pages._flashMessage.flashMessage')
            @yield('content')
        </main>


    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->



    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        });
    </script>

    @yield('scripts')

</body>
</html>
