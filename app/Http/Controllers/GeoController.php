<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeoController extends Controller
{
    public function lanLotSearch(Request $request)
    {
        $lat = $request->latitude;
        $lon = $request->longitude;
        $radius = $request->radius;
        $key = env('GOOGLE_PLACE_API');
        $ch = curl_init();

        $opt = [ CURLOPT_URL => "https://maps.googleapis.com/maps/api/place/nearbysearch/json?key=$key&location=$lat,$lon&radius=$radius",
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HEADER => FALSE
        ];
        curl_setopt_array($ch, $opt);

        $response = curl_exec($ch);
        curl_close($ch);

        $data=json_decode($response);

        if ($request->lanLotSearchPlace){
            $place_id = $data->results[0]->place_id;

            $ch = curl_init();

            $opt = [ CURLOPT_URL => "https://maps.googleapis.com/maps/api/place/details/json?placeid=$place_id&key=$key",
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HEADER => FALSE
            ];
            curl_setopt_array($ch, $opt);

            $response = curl_exec($ch);
            curl_close($ch);
            $data = json_decode($response);
            dd($data);
        } else dd($data);

    }
}
