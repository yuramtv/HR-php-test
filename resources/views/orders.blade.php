<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
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
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                         <a href="{{ url('/') }}">Home</a>
                         <a href="weather">Прогноз погоды</a>
                         <a href="orders">Заказы</a>
                </div>
            </div>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">partner</th>
                  <th scope="col">summ</th>
                  <th scope="col">наименование_состав_заказа</th>
                  <th scope="col">статус</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              @foreach ($orders as $key=>$order)
                <tr>
                  <td scope="col">{{$key}}</td>
                  <td scope="col">{{$order['name']}}</td>
                  <th scope="col">{{$order['summ']}}</th>
                  <th scope="col" align="left">
                  <ol>
                  @foreach ($order['composition'] as $item)
                    <li>{{$item->prod_name}} ({{$item->vnd_name}}) :: {{$item->quantity}}*{{$item->price}}={{$item->quantity*$item->price}}</li>
                  @endforeach
                  </ol>
                  </th>
                  <th>{{$order['status']}}</th>
                  <td><a href='{{$key}}?mod=edit' >Edit</a></td>
                </tr>
              @endforeach
              </tbody>
            </table>

        </div>

    </body>
</html>
