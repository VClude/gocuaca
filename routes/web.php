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

Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('index');
Route::get('/byDate', 'App\Http\Controllers\DashboardController@indexDate')->name('index.date');
Route::get('/getKab/{txt?}', 'App\Http\Controllers\DashboardController@getKabupaten')->name('get.kab');
Route::get('/getKec/{txt?}', 'App\Http\Controllers\DashboardController@getKecamatan')->name('get.kec');
Route::get('/getKel/{txt?}', 'App\Http\Controllers\DashboardController@getKelurahan')->name('get.kel');
Route::get('/getWeather/{id?}', 'App\Http\Controllers\DashboardController@getWeather')->name('get.weather');
Route::get('/getWeatherDate/{id?}/{date?}', 'App\Http\Controllers\DashboardController@getWeatherDate')->name('get.weatherdate');