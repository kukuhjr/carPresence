<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Parkir;
use App\LogParkir;
use App\Http\Resources\Parkir as ParkirResource;
use App\Http\Resources\LogParkir as LogParkirResource;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            // Fetch data parkir
            $parkir = Parkir::where('sensor_name', $request->input('sensor'.$i))->first();
            $parkir->sensor_name = $request->input('sensor'.$i);
                
                if ($request->input('data'.$i) != 2) { // tidak deteksi masalah pada sensor (running)
                    // Fetch data log parkir
                    $log_parkir = 
                        LogParkir::where('id_parkir', $request->input('sensor'.$i))
                        ->orderByDesc('id_log')
                        ->first();

                    // Menyimpan status pada lahan parkir sebelum di-update
                    $old_status = $parkir->status;
                    
                    // Mengubah status dari inputan baru
                    $parkir->status = $request->input('data'.$i) == 0 ? 'kosong' : 'penuh';
                    $parkir->warn_detect = 'running';

                    if ($parkir->status !== $old_status) {
                        // die('TIDAK SAMA, UPDATE LOG');
                        // Update log parkir
                        if ($log_parkir !== NULL && $log_parkir->end == NULL) { // Log tidak kosong (Update)
                            // die('<update log parkir> => '.$log_parkir);
                            $log_parkir->end = Carbon::now()->toDateTimeString();
                            $log_parkir->save();
                        } else { // Log Baru (Create new)
                            // die('<create log parkir> => '.$log_parkir);
                            $log_parkir = new LogParkir;
                            $log_parkir->id_parkir = $request->input('sensor'.$i);
                            $log_parkir->save();
                        }
                    }

                } else {
                    $parkir->warn_detect = 'warning'; // Deteksi masalah pada sensor
                }
            // submit query
            $parkir->save();
        }
        echo "<script> alert('Anda berhasil dengan status pada sensor'); </script>";
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

    // API Get data parkir dan Log Parkir
    public function get_json(){
        // Create parkir
        $parkir = Parkir::all();

        // Return collection of parkir as a resource
        return ParkirResource::collection($parkir);
    }

    // API Get data parkir by id
    public function show_json($id){
        // Create parkir
        $parkir = Parkir::findOrFail($id);

        // Return collection of parkir as a resource
        return new ParkirResource($parkir);
    }
}
