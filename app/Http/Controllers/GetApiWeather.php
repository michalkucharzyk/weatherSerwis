<?php

namespace App\Http\Controllers;

use App\WeatherConnect;
use Illuminate\Http\Request;

class GetApiWeather extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $weatherConnect = new WeatherConnect();
        $weatherConnect->getWeather();

    }
}
