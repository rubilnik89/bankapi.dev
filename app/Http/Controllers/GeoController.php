<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\PlaceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class GeoController extends Controller
{
    public function lanLotSearch(Request $request)
    {
        $key = env('GOOGLE_PLACE_API');
        $types = PlaceType::all();

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
//            Session::forget('items');
//            Session::flash('item', 'Search item');
            dd($data);
        }

        $lat = $request->latitude;
        $lon = $request->longitude;
        $radius = $request->radius;
        $type = $request->type;
        $ch = curl_init();

        if ($request->next) {
            $opt = [CURLOPT_URL => "https://maps.googleapis.com/maps/api/place/nearbysearch/json?key=$key&pagetoken=$request->next",
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HEADER => FALSE
            ];
        } else {
            $opt = [CURLOPT_URL => "https://maps.googleapis.com/maps/api/place/nearbysearch/json?key=$key&types=$type&location=$lat,$lon&radius=$radius",
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HEADER => FALSE
            ];
        }
        curl_setopt_array($ch, $opt);

        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response);

        foreach ($data->results as $place) {
            $photoreference = isset($place->photos) ? $place->photos[0]->photo_reference : 'nophoto';

            if ($photoreference != 'nophoto') {
                Image::make("https://maps.googleapis.com/maps/api/place/photo?key=$key&maxheight=200&photoreference=$photoreference")
                    ->save("images/places/" . $place->place_id . ".png");
            }
            Place::create([
                'name' => $place->name,
                'place_id' => $place->place_id,
                'types' => json_encode($place->types),
                'options' => json_encode($place),
                'photo' => ($photoreference == 'nophoto') ? 'images/nophoto.png' : "images/places/$place->place_id.png",
            ]);
        }
        $places = Place::all();




//        Session::flash('items', 'Search items');
        return view('lanlotSearch', compact('data', 'types', 'places'));
    }


}
