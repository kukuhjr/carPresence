<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LogParkir;
use App\Parkir;
use App\Http\Resources\Parkir as ParkirResource;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    // Home page
    public function index(){
        // return view('welcome');
        return view('index');
    }

    // Parkir page
    public function denah_parkir(){
        // Fetch data log parkir
        $parkir = Parkir::all();
        return view('pages.dashboard-parkir', ['data' => $parkir]);
    }

    // Log Parkir page
    public function log_parkir(){
        // Fetch data log parkir
        $join = DB::table('parkirs')
                    ->join('log_parkir', 'parkirs.sensor_name', '=', 'log_parkir.id_parkir')
                    ->select('parkirs.loc_name', 'log_parkir.*')
                    ->get();
        
        return view('pages.log-parkir', ['data' => $join]);
    }
}
