@extends('layout.app')

@section('content')
    
    {{-- <h3>Dashboard</h3> --}}

    <div class="d-flex row">
      
      {{-- STATUS PARKIR CARD --}}
      <div class="col-sm-12 col-md-3 mx-auto my-3 order-1 order-md-0">
        <div class="card border border-dark">
          <div class="card-body">
            <h5 class="card-title">Parkir Info</h5>

            <span>Jumlah Terisi: </span> <span class="info-jml-terisi">1</span>
            <br>
            <span>Jumlah Kosong: </span> <span class="info-jml-kosong">2</span>
            <br>
            <span>Jumlah Sensor Bermasalah: </span> <span class="info-jml-bermasalah">1</span>
            <br>
            <span>Jumlah Lahan Parkir: </span> <span class="info-jml-lahan">4</span>
          </div>
        </div>
      </div>

      {{-- PARKIR CARD --}}
      <div class="col-sm-12 col-md-6 card mx-auto my-3 border border-dark order-0 order-md-1" style="width: 1000px; background: rgb(255, 255, 255)">
        <div class="card-body">
          <h5 class="card-title">Lantai 1</h5>

            <div id="parkloc" class="py-4">
                
                {{-- ROW --}}
                <div class="border-parkir atas kiri"></div>
                <div class="d-flex justify-content-center border-parkir atas">
                  @include('inc.arrow-right')
                </div>
                <div class="d-flex justify-content-center border-parkir atas">
                  @include('inc.arrow-right')
                </div>
                <div class="border-parkir atas kanan"></div>

                {{-- ROW --}}
                <div class="border-parkir kiri"></div>
                <div id="s_a_1" class="kosong d-flex justify-content-around align-items-center tempat-parkir">S1 @include('inc.info-icon', ['loc' => 'S1'])</div>
                <div id="s_b_1" class="kosong d-flex justify-content-around tempat-parkir">S3 @include('inc.info-icon', ['loc' => 'S3'])</div>
                <div class="border-parkir kanan"></div>
                
                {{-- ROW --}}
                <div class="d-flex justify-content-center border-parkir kiri">
                  @include('inc.arrow-up')
                </div>
                <div id="s_a_2" class="kosong d-flex justify-content-around text-center tempat-parkir">S2 @include('inc.info-icon', ['loc' => 'S2'])</div>
                <div id="s_b_2" class="kosong d-flex justify-content-around text-center tempat-parkir">S4 @include('inc.info-icon', ['loc' => 'S4'])</div>
                <div class="d-flex justify-content-center border-parkir kanan">
                  @include('inc.arrow-bottom')
                </div>

                {{-- ROW --}}
                <div class="border-parkir kiri"></div>
                <div class="d-flex justify-content-center">
                  @include('inc.arrow-left')
                </div>
                <div class="d-flex justify-content-center">
                  @include('inc.arrow-left')
                </div>
                <div class="border-parkir kanan"></div>

                {{-- ROW --}}
                <div class="text-center border-parkir all">In</div>
                <div class="text-center border-parkir atas"></div>
                <div class="text-center border-parkir atas"></div>
                <div class="text-center border-parkir all">Out</div>

            </div>

          {{-- Test Button --}}
          {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Open Modal</button> --}}
          {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal-2">Open Modal 2</button> --}}
          {{-- <a href="#" class="btn btn-primary">Next Level</a> --}}
          {{-- <button class="btn btn-primary" onclick="myFunction()">Toggle Test 1</button> --}}
          {{-- <button class="btn btn-primary" onclick="myFunction2()">Toggle Test 2</button> --}}
          {{-- <button class="btn btn-primary" onclick="warning()">Toggle Warning Test 1</button> --}}
          
        </div>
      </div>

      {{-- LEGENDA PARKIR --}}
      <div class="col-sm-12 col-md-3 mx-auto my-3 order-2 order-md-2">
        <div class="card border border-dark">
          <div class="card-body">
            <h5 class="card-title mb-0">Legenda Parkir</h5>
          </div>
          <div class="isi-legenda">
            <div class="legenda-kosong"></div>
            <div>Lahan Kosong</div>
          </div>
          <div class="isi-legenda">
            <div class="legenda-terisi"></div>
            <div>Lahan Terisi</div>
          </div>
          <div class="isi-legenda">
            <div class="legenda-warning"></div>
            <div>Sensor Bermasalah</div>
          </div>
          <div class="isi-legenda">
            <div class="legenda-text">In</div>
            <div>Jalur Masuk</div>
          </div>
          <div class="isi-legenda">
            <div class="legenda-text">Out</div>
            <div>Jalur Keluar</div>
          </div>
          <div class="isi-legenda">
            <div class="legenda-text">
              @include('inc.arrow-left')
            </div>
            <div>Arah Jalan</div>
          </div>
        </div>
      </div>
    </div>
    
    {{-- Modal Log Parkir --}}
    @include('inc.modal-log-parkir')

    <script src="{{asset('js/http.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/UiParkir.js')}}" type="text/javascript"></script>
    <script>

      function myFunction() {
        const element = document.getElementById("s_a_3");
        element.classList.toggle("kosong");
        element.classList.toggle("penuh");
      }

      function myFunction2() {
        const element = document.getElementById("s_b_3");
        element.classList.toggle("kosong");
        element.classList.toggle("penuh");
      }

      function warning() {
        const element = document.getElementById("s_b_3");
        // element.classList.toggle("kosong");
        // element.classList.toggle("penuh");
        element.classList.toggle("warning");
        if(element.innerHTML != "Problem sensor"){
          element.innerHTML = "Problem sensor"
        }else{
          element.innerHTML = "TEST 2"
        }
        

      }

    </script>

@endsection