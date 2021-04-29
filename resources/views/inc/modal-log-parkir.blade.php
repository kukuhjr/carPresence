@foreach ($data as $dt)
  {{-- Modal --}}
  <div class="modal fade" id="modal{{$dt->loc_name}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Log Parkir {{$dt->loc_name}}</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          {{-- <p>Berikut Log pada {{$dt->loc_name}}.</p> --}}
          <table class="table" id="table{{$dt->loc_name}}">
            <thead>
              <th>No</th>
              <th>Waktu Mulai</th>
              <th>Waktu Selesai</th>
              <th>Status</th>
            </thead>
            <tbody class="body-table{{$dt->loc_name}}">
              <tr class="row-table{{$dt->loc_name}}">
                <td>1</td>
                <td>16:00</td>
                <td>20:00</td>
                <td>Selesai</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>
      
    </div>
  </div>
@endforeach

{{-- Modal TEST--}}
{{-- <div class="modal fade" id="myModal-2" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">TEST</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Ke-2 Nih Gan.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
    
  </div>
</div> --}}