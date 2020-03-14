<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class WeatherController extends Controller
{

    public function getCity($lat = '53.243562' ,$lon = '34.363407')
    {
        $opts = array(
            'http'=>array(
                'method'=>"GET",
                'header'=>"X-Yandex-API-Key: 78db3474-beb7-4235-8972-bca130cf926e"
            ));
        $context = stream_context_create($opts);

        $data = file_get_contents('https://api.weather.yandex.ru/v1/forecast?lat='.$lat.'&lon='.$lon, false, $context);

        $out = json_decode($data);

        return view('weather', ['result' => $out->fact]);
    }

    
}
