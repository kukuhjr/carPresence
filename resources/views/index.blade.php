<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    {{-- <link rel="stylesheet" href="{{ env('APP_URL') }}//style.css" /> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>CarPresence</title>
  </head>
  <body>
    <header class="showcase">
      <div class="container">
        <nav>
          <h1 class="logo">Car Presence</h1>
          <ul>
            {{-- <li><a href="#">Beranda</a></li> --}}
            <li><a href="{{env('APP_URL')}}/parkir">Parkir</a></li>
          </ul>
        </nav>

        <div class="showcase-content">
          <div>
            <h1>Find Space Easier</h1>
            <p class="my-1">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum,
              optio, deleniti consequuntur corrupti, neque incidunt aspernatur
              ratione repellat totam numquam sit facilis quos similique nulla
              maxime quaerat ipsum tempore voluptas?
            </p>
            <a href="#" class="btn-primary">Apa itu CarPresence ?</a>
            <a href="{{ env('APP_URL') }}/parkir" class="btn-secondary">Ruang Parkir</a>
          </div>
          <img src="img/3795-edited.png" alt="Car Parking" />
        </div>
      </div>
    </header>
  </body>
</html>
