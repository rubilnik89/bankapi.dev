<?php

use Illuminate\Database\Seeder;

class PlaceTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('place_types')->delete();
        DB::table('place_types')->insert(['name' => 'accounting']);
        DB::table('place_types')->insert(['name' => 'airport']);
        DB::table('place_types')->insert(['name' => 'amusement_park']);
        DB::table('place_types')->insert(['name' => 'aquarium']);
        DB::table('place_types')->insert(['name' => 'art_gallery']);
        DB::table('place_types')->insert(['name' => 'atm']);
        DB::table('place_types')->insert(['name' => 'bakery']);
        DB::table('place_types')->insert(['name' => 'bank']);
        DB::table('place_types')->insert(['name' => 'bar']);
        DB::table('place_types')->insert(['name' => 'beauty_salon']);
        DB::table('place_types')->insert(['name' => 'bicycle_store']);
        DB::table('place_types')->insert(['name' => 'book_store']);
        DB::table('place_types')->insert(['name' => 'bowling_alley']);
        DB::table('place_types')->insert(['name' => 'bus_station']);
        DB::table('place_types')->insert(['name' => 'cafe']);
        DB::table('place_types')->insert(['name' => 'campground']);
        DB::table('place_types')->insert(['name' => 'car_dealer']);
        DB::table('place_types')->insert(['name' => 'car_rental']);
        DB::table('place_types')->insert(['name' => 'car_repair']);
        DB::table('place_types')->insert(['name' => 'car_wash']);
        DB::table('place_types')->insert(['name' => 'casino']);
        DB::table('place_types')->insert(['name' => 'cemetery']);
        DB::table('place_types')->insert(['name' => 'church']);
        DB::table('place_types')->insert(['name' => 'city_hall']);
        DB::table('place_types')->insert(['name' => 'clothing_store']);
        DB::table('place_types')->insert(['name' => 'convenience_store']);
        DB::table('place_types')->insert(['name' => 'courthouse']);
        DB::table('place_types')->insert(['name' => 'dentist']);
        DB::table('place_types')->insert(['name' => 'department_store']);
        DB::table('place_types')->insert(['name' => 'doctor']);
        DB::table('place_types')->insert(['name' => 'electrician']);
        DB::table('place_types')->insert(['name' => 'electronics_store']);
        DB::table('place_types')->insert(['name' => 'embassy']);
        DB::table('place_types')->insert(['name' => 'establishment']);
        DB::table('place_types')->insert(['name' => 'finance']);
        DB::table('place_types')->insert(['name' => 'fire_station']);
        DB::table('place_types')->insert(['name' => 'florist']);
        DB::table('place_types')->insert(['name' => 'food']);
        DB::table('place_types')->insert(['name' => 'funeral_home']);
        DB::table('place_types')->insert(['name' => 'furniture_store']);
        DB::table('place_types')->insert(['name' => 'gas_station']);
        DB::table('place_types')->insert(['name' => 'general_contractor']);
        DB::table('place_types')->insert(['name' => 'grocery_or_supermarket']);
        DB::table('place_types')->insert(['name' => 'gym']);
        DB::table('place_types')->insert(['name' => 'hair_care']);
        DB::table('place_types')->insert(['name' => 'hardware_store']);
        DB::table('place_types')->insert(['name' => 'health']);
        DB::table('place_types')->insert(['name' => 'hindu_temple']);
        DB::table('place_types')->insert(['name' => 'home_goods_store']);
        DB::table('place_types')->insert(['name' => 'hospital']);
        DB::table('place_types')->insert(['name' => 'insurance_agency']);
        DB::table('place_types')->insert(['name' => 'jewelry_store']);
        DB::table('place_types')->insert(['name' => 'laundry']);
        DB::table('place_types')->insert(['name' => 'lawyer']);
        DB::table('place_types')->insert(['name' => 'library']);
        DB::table('place_types')->insert(['name' => 'liquor_store']);
        DB::table('place_types')->insert(['name' => 'local_government_office']);
        DB::table('place_types')->insert(['name' => 'locksmith']);
        DB::table('place_types')->insert(['name' => 'lodging']);
        DB::table('place_types')->insert(['name' => 'meal_delivery']);
        DB::table('place_types')->insert(['name' => 'meal_takeaway']);
        DB::table('place_types')->insert(['name' => 'mosque']);
        DB::table('place_types')->insert(['name' => 'movie_rental']);
        DB::table('place_types')->insert(['name' => 'movie_theater']);
        DB::table('place_types')->insert(['name' => 'moving_company']);
        DB::table('place_types')->insert(['name' => 'museum']);
        DB::table('place_types')->insert(['name' => 'night_club']);
        DB::table('place_types')->insert(['name' => 'painter']);
        DB::table('place_types')->insert(['name' => 'park']);
        DB::table('place_types')->insert(['name' => 'parking']);
        DB::table('place_types')->insert(['name' => 'pet_store']);
        DB::table('place_types')->insert(['name' => 'pharmacy']);
        DB::table('place_types')->insert(['name' => 'physiotherapist']);
        DB::table('place_types')->insert(['name' => 'place_of_worship']);
        DB::table('place_types')->insert(['name' => 'plumber']);
        DB::table('place_types')->insert(['name' => 'police']);
        DB::table('place_types')->insert(['name' => 'post_office']);
        DB::table('place_types')->insert(['name' => 'real_estate_agency']);
        DB::table('place_types')->insert(['name' => 'restaurant']);
        DB::table('place_types')->insert(['name' => 'roofing_contractor']);
        DB::table('place_types')->insert(['name' => 'rv_park']);
        DB::table('place_types')->insert(['name' => 'school']);
        DB::table('place_types')->insert(['name' => 'shoe_store']);
        DB::table('place_types')->insert(['name' => 'shopping_mall']);
        DB::table('place_types')->insert(['name' => 'spa']);
        DB::table('place_types')->insert(['name' => 'stadium']);
        DB::table('place_types')->insert(['name' => 'storage']);
        DB::table('place_types')->insert(['name' => 'store']);
        DB::table('place_types')->insert(['name' => 'subway_station']);
        DB::table('place_types')->insert(['name' => 'synagogue']);
        DB::table('place_types')->insert(['name' => 'taxi_stand']);
        DB::table('place_types')->insert(['name' => 'train_station']);
        DB::table('place_types')->insert(['name' => 'travel_agency']);
        DB::table('place_types')->insert(['name' => 'university']);
        DB::table('place_types')->insert(['name' => 'veterinary_care']);
        DB::table('place_types')->insert(['name' => 'zoo']);
    }
}
