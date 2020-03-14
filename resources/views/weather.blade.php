@extends('layouts.app')

@section('title', 'Прогноз погоды')

@section('main')
   <h1>Погода в Брянске: {{ $result->temp }} °C <img src="https://yastatic.net/weather/i/icons/blueye/color/svg/{{ $result->icon }}.svg" width="80" /></h1>
@endsection

