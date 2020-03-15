<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel - @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Scripts -->

        <script type="text/javascript" src="{{ URL::asset('/js/app.js') }}"></script> <!-- BootStrap -->
        <script type="text/javascript" src="{{ URL::asset('/js/script.js') }}"></script> <!-- User -->

        <!-- Styles -->

        <link href="{{ URL::asset('/css/app.css') }}" rel="stylesheet" type="text/css" > <!-- BootStrap -->
        <link href="{{ URL::asset('/css/style.css') }}" rel="stylesheet" type="text/css" > <!-- User -->

    </head>
    <body>
        <div class="flex-top position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title">
                    Laravel
                </div>

                <div class="links  m-b-md">
                         <a href="{{ url('/') }}">Home</a>
                         <a href="{{ url('weather')}}">Прогноз погоды</a>
                         <a href="{{ url('order/list')}}">Заказы</a>
                         <a href="{{ url('products')}}">Продукты</a>
                </div>


                @section('main')
                    <h3>GeLabs - тестовое задание, Матвеев Юрий</h3>
                @show

            </div>
        </div>
    </body>
</html>
