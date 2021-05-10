<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeteoLT;

class WeatherController extends Controller
{
    public function index()
    {
        $meteo = new MeteoLT();
        $places = MeteoLT::$places_list;
        return view('weather.index', compact(['places']));
    }

    public function show($place)
    {   
        $meteo = new MeteoLT();
        $forecast_set = $meteo->forecast($place);
        return view('weather.place', $forecast_set);
        //
    }

    public function weateherRedirect(Request $request)
    {
        return redirect()->route('weather.place', $request->place);
    }

}
