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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'ViewController@index');

// Route::view('/parkir', 'pages.dashboard-parkir');
Route::get('/parkir', 'ViewController@denah_parkir');

Route::get('/test', 'ParkirController@test');

Route::match(['get','post'], '/updateSensor', 'ParkirController@update');
Route::match(['get','post'], '/addSensor', 'ParkirController@store');

Route::match(['get','post'], '/updateIndex', 'UpdateController@index');