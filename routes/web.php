<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

use App\Parkir;
use App\LogParkir;
use App\Http\Resources\Parkir as ParkirResource;
use App\Http\Resources\LogParkir as LogParkirResource;
use Illuminate\Support\Facades\DB;

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

Route::get('/test', function () {
    // $d2 = new Datetime('now', new Datetimezone('Asia/Jakarta'));
    // echo $d2->format('Y-m-d H:i:s ');

    // $current_timestamp = now();
    // $current_timestamp->format('Y-m-d H:i:s');
    // echo $current_timestamp;

    // $log = LogParkir::find(1);
    // return $log;

    $parkir = Parkir::all();

    // Return collection of parkir as a resource
    return ParkirResource::collection($parkir);

    // $parkir = Parkir::all();
    // return $parkir[0]->logs;
});

Route::get('/', 'ViewController@index');
Route::get('/parkir', 'ViewController@denah_parkir');
Route::match(['get','post'], '/logParkir', 'ViewController@log_parkir');

Route::match(['get','post'], '/updateSensor', 'ParkirController@update');
Route::match(['get','post'], '/addSensor', 'ParkirController@store');

Route::match(['get','post'], '/updateIndex', 'UpdateController@index');

// Route::get('/insert_test', 'ParkirController@test');