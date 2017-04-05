<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\PlaceId;
use App\Models\PlaceType;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use GuzzleHttp\Client;
//GOOGLE_PLACE_API=AIzaSyA9cHVlqZ-bm3daLP6A6TYWt_wa1yhgtZM
//AIzaSyCGM1oo-dlw__FgzRG5JzIdpPH1YEV8puY
//AIzaSyC5VfB2Sz7gK0__eWhTmLNSmWngCHbuJ5Y
//AIzaSyCAg-J0mchIdBae9Xqf7jZBe-SIVoxOWcM

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

    public function placeidSearch()
    {
        $key = env('GOOGLE_PLACE_API');

        $lat = 59.911650;
        $lon = 30.276740;
        $radius = 500;
        $type = 'restaurant';
        set_time_limit(0);

        while ($lat < 59.912469) {
            $client = new Client();
            $result = $client->get("https://maps.googleapis.com/maps/api/place/radarsearch/json?key=$key&types=$type&location=$lat,$lon&radius=$radius");
            $data = json_decode($result->getBody());

            foreach ($data->results as $place) {

                if (PlaceId::where('place_id', $place->place_id)->first()) {
                    continue;
                }
                PlaceId::create([
                    'lat' => $place->geometry->location->lat,
                    'lon' => $place->geometry->location->lng,
                    'place_id' => $place->place_id,
                ]);
            }
            $lat += 0.0004;
            $lon += 0.0135;
        }

        return 'Success!';
    }

    public function placesPush()
    {
        $key = env('GOOGLE_PLACE_API');
        $place_ids = PlaceId::all();
        foreach ($place_ids as $place_id){
            $client = new Client();
            $result = $client->get("https://maps.googleapis.com/maps/api/place/details/json?placeid=$place_id->place_id&key=$key");
            $data = json_decode($result->getBody());

            if (isset($data->result->photos)) {
                $client2 = new Client();
                $photo_reference = $data->result->photos[0]->photo_reference;
                $client2->get("https://maps.googleapis.com/maps/api/place/photo?key=$key&maxheight=200&photoreference=$photo_reference",
                    ['sink' => "images/places/" . $data->result->place_id . ".png"]);
                $photo = "images/places/" . $data->result->place_id . ".png";
            } else { $photo = "images/nophoto.png";}
            Place::create([
                'name' => $data->result->name,
                'place_id' => $data->result->place_id,
                'types' => json_encode($data->result->types),
                'options' => json_encode($data),
                'photos' => (isset($data->result->photos)) ? json_encode($data->result->photos) : json_encode([]),
                'photo' => $photo,
            ]);
        }
        return 'Success!';
    }

    public function run()
    {
        $key = env('GOOGLE_PLACE_API');

        $lat = 59.911650;
        $lon = 30.276740;
        $radius = 500;
        $type = 'restaurant';
        set_time_limit(0);
        while ($lat > 59.911641) {
            $client = new Client();
            $result = $client->get("https://maps.googleapis.com/maps/api/place/radarsearch/json?key=$key&types=$type&location=$lat,$lon&radius=$radius");
            $data = json_decode($result->getBody());

            foreach ($data->results as $place) {
                if (Place::where('place_id', $place->place_id)->first()) {
                    continue;
                }
                $client1 = new Client();
                $result1 = $client1->get("https://maps.googleapis.com/maps/api/place/details/json?placeid=$place->place_id&key=$key");
                $data1 = json_decode($result1->getBody());

                if (isset($data1->result->photos)) {
                    $client2 = new Client();
                    $photo_reference = $data1->result->photos[0]->photo_reference;
                    $client2->get("https://maps.googleapis.com/maps/api/place/photo?key=$key&maxheight=200&photoreference=$photo_reference",
                        ['sink' => "images/places/" . $data1->result->place_id . ".png"]);
                    $photo = "images/places/" . $data1->result->place_id . ".png";
                } else { $photo = "images/nophoto.png";}
                Place::create([
                    'name' => $data1->result->name,
                    'place_id' => $data1->result->place_id,
                    'types' => json_encode($data1->result->types),
                    'options' => json_encode($data1),
                    'photos' => (isset($data1->result->photos)) ? json_encode($data1->result->photos) : json_encode([]),
                    'photo' => $photo,
                ]);
            }
            $lat -= 0.0004;
            $lon += 0.0135;
        }

        return 'Success!';
    }

}
