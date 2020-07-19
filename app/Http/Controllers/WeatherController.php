<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\ParseDataWeather;

class WeatherController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $parseData = new ParseDataWeather();
        $idCity = $request->idCity;
        if ($request->idCity === 'all')
            $idCity = null;

        $data = $parseData->getData($idCity);

        if (isset($request->idCity)) // AJAX
            return view('weatherCitiesContainer', ['data' => $data]);
        else
            return view('weather', ['data' => $data]);
    }
}
