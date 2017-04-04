<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\PlaceType;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
//GOOGLE_PLACE_API=AIzaSyCGM1oo-dlw__FgzRG5JzIdpPH1YEV8puY

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
        $places = [];

        $i = 0;
        foreach ($data->results as $place) {
            $i++;
            $p = Place::where('place_id', $place->place_id)->first();
            if ($p){
                if($i<21) {array_push($places, $p);}
                continue;
            }

            $ch = curl_init();

            $opt = [CURLOPT_URL => "https://maps.googleapis.com/maps/api/place/details/json?placeid=$place->place_id&key=$key",
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HEADER => FALSE
            ];
            curl_setopt_array($ch, $opt);

            $response = curl_exec($ch);
            curl_close($ch);
            $dat = json_decode($response);

            $photos = [];
            if(isset($dat->result->photos)) {
                foreach ($dat->result->photos as $index => $photo) {
                    Image::make("https://maps.googleapis.com/maps/api/place/photo?key=$key&maxheight=200&photoreference=$photo->photo_reference")
                        ->save("images/places/" . $dat->result->place_id . $index . ".png");
                    array_push($photos, "images/places/" . $dat->result->place_id . $index . ".png");
                }
            }
            Place::create([
                'name' => $dat->result->name,
                'place_id' => $dat->result->place_id,
                'types' => json_encode($dat->result->types),
                'options' => json_encode($dat),
                'photo' => json_encode($photos),
            ]);
            if($i<21) {array_push($places, Place::where('place_id', $place->place_id)->first());}
        }
//        dd($places[0]['name']);

        foreach ($places as $place){
            $place['types'] = json_decode($place['types']);
            $photos = json_decode($place['photo']);
            $place['photo'] = array_shift($photos);
        }
//        dd($data);

        return view('lanlotSearch', compact('data', 'types', 'places'));
    }


}
