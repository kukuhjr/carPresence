<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Parkir;
use App\Http\Resources\Parkir as ParkirResource;
use Illuminate\Support\Facades\DB;

class ParkirController extends Controller
{
    public function index(){
        return 'TEST '.$_POST['jumlah'];
    }

    public function create(){

    }

    public function store(Request $request){

        die('Jumlah = '.$_POST['jumlah']);
        die('Jumlah = '.$request->input('jumlah').' Nama Sensor ='.$request->input('sensor1').' Status = '.$request->input('data1') == 0 ? 'kosong' : 'penuh');
        
        for ($i=1; $i <= $request->input('jumlah') ; $i++) { 
            // Input value
            $parkir = new Parkir;
            $parkir->sensor_name = 'TEST'.$i;
            $parkir->status = 'TEST';
            $parkir->level = '1';
            $parkir->save();
        }

        echo "<script> alert('Anda berhasil dengan status pada sensor); </script>";
    }

    public function show($id){

    }

    public function edit($id){

    }

    public function update(Request $request){

        // die('Jumlah = '.$_POST['jumlah'].', Nama Sensor = '.$request->input('sensor1').', Status = '.($request->input('data1') == 0 ? 'kosong' : 'penuh'));

        for ($i=1; $i <= $_POST['jumlah'] ; $i++) { 
            $parkir = Parkir::where('sensor_name', $request->input('sensor'.$i))->first();
            $parkir->sensor_name = $request->input('sensor'.$i);
            $parkir->status = $request->input('data'.$i) == 0 ? 'kosong' : 'penuh';
            // $test = $request->input('data'.$i) == 0 ? 'kosong' : 'penuh';
            // die($parkir);

            // submit query
            $parkir->save();
        }

        echo "<script> alert('Anda berhasil dengan status pada sensor); </script>";

    }

    public function destroy($id){

    }

    // Test, insert 1 record to db
    public function test(){

        // Create parkir
        $parkir = new Parkir;
        $parkir->sensor_name = 'SR04_3';
        $parkir->variable_name = 's_a_3';
        $parkir->status = 'kosong';
        $parkir->level = '1';
        $parkir->save();

        $parkir = new Parkir;
        $parkir->sensor_name = 'SR04_4';
        $parkir->variable_name = 's_a_4';
        $parkir->status = 'kosong';
        $parkir->level = '1';
        $parkir->save();

        return 'Berhasil tambah sensor!';
    }

    // API Get data
    public function get_json(){

        // Create parkir
        $parkir = Parkir::all();

        // Return collection of parkir as a resource
        return ParkirResource::collection($parkir);

    }

    // API Get data by id
    public function show_json($id){
        // Create parkir
        $parkir = Parkir::findOrFail($id);

        // Return collection of parkir as a resource
        return new ParkirResource($parkir);
    }
}
