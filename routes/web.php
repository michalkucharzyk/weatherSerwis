<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'WeatherController')->name('weather');
Route::resource('cities', 'CitiesController');
//Route::resource('cities', 'CitiesController',[
//    'names' => [
//        'index' => 'cities',
//        'store' => 'cities.store',
//        'create' => 'cities.create',
//        'edit' => 'cities.edit',
//        'destroy' => 'cities.destroy',
//        'update' => 'cities.update',
//    ]
//]);