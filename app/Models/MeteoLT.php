<?php

namespace App\Models;

use App\Models\JSONResponse;

class MeteoLT
{
    private $places;
    private $json;

    public static $places_list = [
            'Kapčiamiestis' => 'kapciamiestis',
            'Druskininkai' => 'druskininkai',
            'Veisiejai' => 'veisiejai',
            'Kaunas' => 'kaunas',
            'Vilnius' => 'vilnius'
        ];

    public function __construct()
    {
        date_default_timezone_set("Europe/Vilnius");
    }

    public function getJSON()
    {
        return $this->json;
    }

    public function forecast($place)
    {
        $jr = new JSONResponse("https://api.meteo.lt/v1/places/$place/forecasts/long-term");
        $this->json = $jr->getJson();
        $forecasts = array();
        $forecast_creation_date = null;

        if ($this->json !== null) {
            $forecast_creation_date = date('Y-m-d H:i:s', strtotime($this->json->forecastCreationTimeUtc . ' UTC'));
            $current_hour = date('Y-m-d H');
            $forecast_count = count($this->json->forecastTimestamps);
            /*
             * meteo.lt forecasts are updated several times a day
             * first entry rarely maches current hour so we skip
             * entreis till it does
             */
            for ($i = 0; $i < $forecast_count; $i++) {
                if (date("Y-m-d H", strtotime($this->json->forecastTimestamps[$i]->forecastTimeUtc. ' UTC')) == $current_hour
                ) {
                    break;
                }
            }
            /*
             * City truncated to 13 so the whole line is 20 symbols including CR;
             * leading '\n' for formatting reasons because twilio appends their
             * banner on free accounts and i'm a cheap bastard.
             */
            $i_max = $i + 48;
            for (; $i < $i_max; $i++) {
                $hour = date("H:i", strtotime($this->json->forecastTimestamps[$i]->forecastTimeUtc. ' UTC'));
                $rain_mm= $this->json->forecastTimestamps[$i]->totalPrecipitation;
                $temp = round($this->json->forecastTimestamps[$i]->airTemperature);
                $wind_speed = $this->json->forecastTimestamps[$i]->windSpeed;
                $wind_gust = $this->json->forecastTimestamps[$i]->windGust;
                $wind_direction = $this->json->forecastTimestamps[$i]->windDirection;
                $date = date("Y-m-d", strtotime($this->json->forecastTimestamps[$i]->forecastTimeUtc. ' UTC'));
                $forecasts[] = [
                    'hour' =>$hour,
                    'temp' => $temp,
                    'rain' => $rain_mm,
                    'wind' => $wind_speed,
                    'gust' => $wind_gust,
                    'wdir' => $wind_direction,
                    'date' => $date
                 ];       
            }
        }

        return compact(
            [
                'place',
                'forecast_creation_date',
                'forecasts'
            ]
        );
    }

    public function getPlaces()
    {
        if ($this->places === null) {
            $jr = new JSONResponse("https://api.meteo.lt/v1/places");
            foreach($jr->getJson() as $location){
                $this->places[$location->name] = $location->code;
            }
        }
        return $this->places;
    }
}
