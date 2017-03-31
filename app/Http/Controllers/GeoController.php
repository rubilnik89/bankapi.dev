<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GeoController extends Controller
{
    public function lanLotSearch(Request $request)
    {
        $key = env('GOOGLE_PLACE_API');

        if($request->placeid){

            $ch = curl_init();

            $opt = [CURLOPT_URL => "https://maps.googleapis.com/maps/api/place/details/json?placeid=$request->placeid&key=$key",
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HEADER => FALSE
            ];
            curl_setopt_array($ch, $opt);

            $response = curl_exec($ch);
            curl_close($ch);
            $data = json_decode($response);
            Session::forget('items');
            Session::flash('item', 'Search item');
            dd($data);
        }

        $lat = $request->latitude;
        $lon = $request->longitude;
        $radius = $request->radius;
        $ch = curl_init();

        if ($request->next) {
            $opt = [CURLOPT_URL => "https://maps.googleapis.com/maps/api/place/nearbysearch/json?key=$key&pagetoken=$request->next",
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HEADER => FALSE
            ];
        } else {
            $opt = [CURLOPT_URL => "https://maps.googleapis.com/maps/api/place/nearbysearch/json?key=$key&location=$lat,$lon&radius=$radius",
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HEADER => FALSE
            ];
        }
        curl_setopt_array($ch, $opt);

        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response);

//        if ($request->lanLotSearchPlace) {
//            $place_id = $data->results[1]->place_id;
//
//            $ch = curl_init();
//
//            $opt = [CURLOPT_URL => "https://maps.googleapis.com/maps/api/place/details/json?placeid=$place_id&key=$key",
//                CURLOPT_RETURNTRANSFER => TRUE,
//                CURLOPT_HEADER => FALSE
//            ];
//            curl_setopt_array($ch, $opt);
//
//            $response = curl_exec($ch);
//            curl_close($ch);
//            $data = json_decode($response);
//            Session::forget('items');
//            Session::flash('item', 'Search item');
//            dd($data);
//        }
        $photos = [];
        for ($i = 0; $i < count($data->results); $i++) {
            $photoreference = isset($data->results[$i]->photos) ? $data->results[$i]->photos[0]->photo_reference : 'nophoto';
            ($photoreference == 'nophoto') ? ($photos[$i] = "nophoto") : ($photos[$i] = "https://maps.googleapis.com/maps/api/place/photo?key=$key&maxheight=200&photoreference=$photoreference");
        }

        Session::flash('items', 'Search items');
        return view('lanlotSearch', compact('data', 'photos'));
    }


}
