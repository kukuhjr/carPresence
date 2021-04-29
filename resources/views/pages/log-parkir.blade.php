@extends('layout.app')

@section('content')

    <h3>Log Parkir</h3>

    <div class="table-responsive">
        <table class="table table-secondary table-striped mt-4">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Waktu Mulai</th>
                <th scope="col">Waktu Selesai</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;   // Counter Variable
                @endphp
                @foreach ($data as $dt)
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $dt->loc_name }}</td>
                        <td>{{ $dt->start }}</td>
                        <td>{{ $dt->end == NULL ? 'Masih berjalan' : $dt->end }}</td>
                        <td>{{ $dt->end == NULL ? 'Sedang Terisi' : 'Selesai' }}</td>
                    </tr>
                    <?php $i++ ?>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection