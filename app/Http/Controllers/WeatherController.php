<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class WeatherController extends Controller
{

    private $url = 'https://api.weather.yandex.ru/v1/forecast';
    private $key = '78db3474-beb7-4235-8972-bca130cf926e';
    private $lat = '53.243562';
    private $lon = '34.363407';

    public function getCity()
    {
        $opts = array(
            'http'=>array(
                'method'=>"GET",
                'header'=>"X-Yandex-API-Key: ".$this->key
            ));
        $context = stream_context_create($opts);

        $data = file_get_contents($this->url.'?lat='.$this->lat.'&lon='.$this->lon, false, $context);

        $out = json_decode($data);

        return view('weather', ['result' => $out->fact]);
    }



}

