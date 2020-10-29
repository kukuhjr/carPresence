@extends('layout.app')

@section('content')
    
    <h3>Dashboard</h3>

    <div class="card mx-auto my-3" style="width: 600px">
        <div class="card-body">
          <h5 class="card-title">Lantai 1</h5>
          {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}

            <div id="parkloc" class="py-4">
                
                {{-- Row --}}
                <div></div>
                <div class="d-flex justify-content-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </div>
                <div class="d-flex justify-content-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </div>
                <div></div>
                <div class="d-flex justify-content-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </div>
                <div></div>

                <div></div>
                <div id="s_a_1" class="free text-center">S1</div>
                <div id="s_b_1" class="free text-center">S4</div>
                <div class=""></div>
                <div id="s_c_1" class="free text-center">C1</div>
                <div class=""></div>
                
                <div class="d-flex justify-content-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                </div>
                <div id="s_a_2" class="free text-center">S2</div>
                <div id="s_b_2" class="free text-center">B2</div>
                <div class="d-flex justify-content-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                </div>
                <div id="s_c_2" class="free text-center">C2</div>
                <div class="d-flex justify-content-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                </div>

                <div></div>
                <div id="s_a_3" class="free text-center">S3</div>
                <div id="s_b_3" class="free text-center">B3</div>
                <div class=""></div>
                <div id="s_c_3" class="free text-center">C3</div>
                <div class=""></div>

                <div></div>
                <div class="d-flex justify-content-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                </div>
                <div class="d-flex justify-content-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                </div>
                <div></div>
                <div class="d-flex justify-content-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                </div>
                <div></div>

                <div class="text-center">in</div>
                <div id="s_d_1" class="free text-center">D1</div>
                <div id="s_d_2" class="free text-center">D2</div>
                <div id="s_d_3" class="free text-center">D3</div>
                <div id="s_d_4" class="free text-center">D4</div>
                <div class="text-center">out</div>

            </div>

          {{-- <a href="#" class="btn btn-primary">Next Level</a> --}}
          <button class="btn btn-primary" onclick="myFunction()">Toggle Status</button>
          <button class="btn btn-primary" onclick="myFunction2()">Toggle Status2</button>
        </div>
    </div>

    <script src="{{asset('js/http.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/UiParkir.js')}}" type="text/javascript"></script>
    <script>

      function myFunction() {
        const element = document.getElementById("s_a_3");
        element.classList.toggle("free");
        element.classList.toggle("occupied");
      }

      function myFunction2() {
        const element = document.getElementById("s_b_3");
        element.classList.toggle("free");
        element.classList.toggle("occupied");
      }

    </script>

@endsection