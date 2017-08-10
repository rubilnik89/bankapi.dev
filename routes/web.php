<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'BankController@main')->name('banks');


Route::get('ceska', 'BankController@ceska')->name('ceska');
Route::get('ceskaExchange', 'BankController@ceskaExchange')->name('ceskaExchange');
Route::get('lanLotSearch', 'GeoController@lanLotSearch')->name('lanLotSearch');
Route::get('run', 'GeoController@run')->name('run');
Route::get('placeidSearch', 'GeoController@placeidSearch')->name('placeidSearch');
Route::get('placeidSearch1', 'GeoController@placeidSearch1')->name('placeidSearch1');
Route::get('placesPushAll', 'GeoController@placesPushAll')->name('placesPushAll');
Route::get('placesPush100', 'GeoController@placesPush100')->name('placesPush100');
Route::get('placesPush50photos', 'GeoController@placesPush50photos')->name('placesPush50photos');
Route::get('push', 'GeoController@push')->name('push');




Route::get('trans', 'GeoController@trans')->name('trans');
Route::get('ttt', 'GeoController@ttt')->name('ttt');
