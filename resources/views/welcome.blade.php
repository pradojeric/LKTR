@extends('layouts.head')

        <!-- Styles -->
        <style>
            html, body {
                background-color: #2d6187 !important;
                color: #fff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            body {
            background: url('{{ asset('img/bg.jpg') }}') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
            }

            @media only screen and (max-width: 600px) {
                    body {
                        background: url('{{ asset('img/bg-mobile.jpg') }}') no-repeat center center fixed;
                        -webkit-background-size: cover;
                        -moz-background-size: cover;
                        background-size: cover;
                        -o-background-size: cover;
                    }
            }
        </style>
    </head>
    <body>
    <div id="app">

        <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
        <div class="col-lg-4 text-center">
        <h1 class="text-white">Elektro</h1>

            @if (Route::has('login'))

                    @auth
                        <a class="btn btn-primary btn-block" href="{{ url('/home') }}">Home</a>
                    @else
                        <a class="btn btn-primary btn-block" href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                        <a class="btn btn-secondary btn-block" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth

            @endif

        </div>
        </div>
        </div>



    </div>
    </body>
</html>
