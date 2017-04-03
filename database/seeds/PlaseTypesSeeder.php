<?php

use Illuminate\Database\Seeder;

class PlaseTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('placeTypes')->delete();
        DB::table('placeTypes')->insert(['name' => 'accounting']);
        DB::table('placeTypes')->insert(['name' => 'airport']);
        DB::table('placeTypes')->insert(['name' => 'amusement_park']);
        DB::table('placeTypes')->insert(['name' => 'aquarium']);
        DB::table('placeTypes')->insert(['name' => 'art_gallery']);
        DB::table('placeTypes')->insert(['name' => 'atm']);
        DB::table('placeTypes')->insert(['name' => 'bakery']);
        DB::table('placeTypes')->insert(['name' => 'bank']);
        DB::table('placeTypes')->insert(['name' => 'bar']);
        DB::table('placeTypes')->insert(['name' => 'beauty_salon']);
        DB::table('placeTypes')->insert(['name' => 'bicycle_store']);
        DB::table('placeTypes')->insert(['name' => 'book_store']);
        DB::table('placeTypes')->insert(['name' => 'bowling_alley']);
        DB::table('placeTypes')->insert(['name' => 'bus_station']);
        DB::table('placeTypes')->insert(['name' => 'cafe']);
        DB::table('placeTypes')->insert(['name' => 'campground']);
        DB::table('placeTypes')->insert(['name' => 'car_dealer']);
        DB::table('placeTypes')->insert(['name' => 'car_rental']);
        DB::table('placeTypes')->insert(['name' => 'car_repair']);
        DB::table('placeTypes')->insert(['name' => 'car_wash']);
        DB::table('placeTypes')->insert(['name' => 'casino']);
        DB::table('placeTypes')->insert(['name' => 'cemetery']);
        DB::table('placeTypes')->insert(['name' => 'church']);
        DB::table('placeTypes')->insert(['name' => 'city_hall']);
        DB::table('placeTypes')->insert(['name' => 'clothing_store']);
        DB::table('placeTypes')->insert(['name' => 'convenience_store']);
        DB::table('placeTypes')->insert(['name' => 'courthouse']);
        DB::table('placeTypes')->insert(['name' => 'dentist']);
        DB::table('placeTypes')->insert(['name' => 'department_store']);
        DB::table('placeTypes')->insert(['name' => 'doctor']);
        DB::table('placeTypes')->insert(['name' => 'electrician']);
        DB::table('placeTypes')->insert(['name' => 'electronics_store']);
        DB::table('placeTypes')->insert(['name' => 'embassy']);
        DB::table('placeTypes')->insert(['name' => 'establishment']);
        DB::table('placeTypes')->insert(['name' => 'finance']);
        DB::table('placeTypes')->insert(['name' => 'fire_station']);
        DB::table('placeTypes')->insert(['name' => 'florist']);
        DB::table('placeTypes')->insert(['name' => 'food']);
        DB::table('placeTypes')->insert(['name' => 'funeral_home']);
        DB::table('placeTypes')->insert(['name' => 'furniture_store']);
        DB::table('placeTypes')->insert(['name' => 'gas_station']);
        DB::table('placeTypes')->insert(['name' => 'general_contractor']);
        DB::table('placeTypes')->insert(['name' => 'grocery_or_supermarket']);
        DB::table('placeTypes')->insert(['name' => 'gym']);
        DB::table('placeTypes')->insert(['name' => 'hair_care']);
        DB::table('placeTypes')->insert(['name' => 'hardware_store']);
        DB::table('placeTypes')->insert(['name' => 'health']);
        DB::table('placeTypes')->insert(['name' => 'hindu_temple']);
        DB::table('placeTypes')->insert(['name' => 'home_goods_store']);
        DB::table('placeTypes')->insert(['name' => 'hospital']);
        DB::table('placeTypes')->insert(['name' => 'insurance_agency']);
        DB::table('placeTypes')->insert(['name' => 'jewelry_store']);
        DB::table('placeTypes')->insert(['name' => 'laundry']);
        DB::table('placeTypes')->insert(['name' => 'lawyer']);
        DB::table('placeTypes')->insert(['name' => 'library']);
        DB::table('placeTypes')->insert(['name' => 'liquor_store']);
        DB::table('placeTypes')->insert(['name' => 'local_government_office']);
        DB::table('placeTypes')->insert(['name' => 'locksmith']);
        DB::table('placeTypes')->insert(['name' => 'lodging']);
        DB::table('placeTypes')->insert(['name' => 'meal_delivery']);
        DB::table('placeTypes')->insert(['name' => 'meal_takeaway']);
        DB::table('placeTypes')->insert(['name' => 'mosque']);
        DB::table('placeTypes')->insert(['name' => 'movie_rental']);
        DB::table('placeTypes')->insert(['name' => 'movie_theater']);
        DB::table('placeTypes')->insert(['name' => 'moving_company']);
        DB::table('placeTypes')->insert(['name' => 'museum']);
        DB::table('placeTypes')->insert(['name' => 'night_club']);
        DB::table('placeTypes')->insert(['name' => 'painter']);
        DB::table('placeTypes')->insert(['name' => 'park']);
        DB::table('placeTypes')->insert(['name' => 'parking']);
        DB::table('placeTypes')->insert(['name' => 'pet_store']);
        DB::table('placeTypes')->insert(['name' => 'pharmacy']);
        DB::table('placeTypes')->insert(['name' => 'physiotherapist']);
        DB::table('placeTypes')->insert(['name' => 'place_of_worship']);
        DB::table('placeTypes')->insert(['name' => 'plumber']);
        DB::table('placeTypes')->insert(['name' => 'police']);
        DB::table('placeTypes')->insert(['name' => 'post_office']);
        DB::table('placeTypes')->insert(['name' => 'real_estate_agency']);
        DB::table('placeTypes')->insert(['name' => 'restaurant']);
        DB::table('placeTypes')->insert(['name' => 'roofing_contractor']);
        DB::table('placeTypes')->insert(['name' => 'rv_park']);
        DB::table('placeTypes')->insert(['name' => 'school']);
        DB::table('placeTypes')->insert(['name' => 'shoe_store']);
        DB::table('placeTypes')->insert(['name' => 'shopping_mall']);
        DB::table('placeTypes')->insert(['name' => 'spa']);
        DB::table('placeTypes')->insert(['name' => 'stadium']);
        DB::table('placeTypes')->insert(['name' => 'storage']);
        DB::table('placeTypes')->insert(['name' => 'store']);
        DB::table('placeTypes')->insert(['name' => 'subway_station']);
        DB::table('placeTypes')->insert(['name' => 'synagogue']);
        DB::table('placeTypes')->insert(['name' => 'taxi_stand']);
        DB::table('placeTypes')->insert(['name' => 'train_station']);
        DB::table('placeTypes')->insert(['name' => 'travel_agency']);
        DB::table('placeTypes')->insert(['name' => 'university']);
        DB::table('placeTypes')->insert(['name' => 'veterinary_care']);
        DB::table('placeTypes')->insert(['name' => 'zoo']);
    }
}
