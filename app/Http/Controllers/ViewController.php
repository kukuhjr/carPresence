<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    // Home page
    public function index(){
        // return view('welcome');
        return view('index');
    }

    // Parkir page
    public function denah_parkir(){
        return view('pages.dashboard-parkir');
    }
}
