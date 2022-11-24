@extends('mylayout')

@section('content')
   <h2>Edit book</h2>
   <div class="row">
      <div class="col">
         <form action="" method="post">
            {{-- <form action="{{ route('booking.update', ['booking' => $product]) }}" method="post"> --}}
            @csrf
            @method('PUT')
            <div class="mb-3">
               <label class="form-label">No Resi</label>
               <input name="name" value="{{ $booking->no_resi }}" type="text" class="form-control" readonly>
            </div>
            <div class="mb-3">
               <label class="form-label">Pengirim</label>
               <input name="name" value="{{ $booking->id_user }}" type="text" class="form-control" readonly>
            </div>
            <div class="mb-3">
               <label class="form-label">Jadwal</label>
               <input name="id_jadwal" value="{{ $fjadwal }}" type="text" class="form-control" readonly>
            </div>
            <input id="id_jadwal" type="hidden" name="id_jadwal" value="{{ old('id_jadwal') }}" required readonly>
               <span class="input-group-btn">
                  <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><b>Cari Jadwal</b> <span class="fa fa-search"></span></button>
               </span>
            <div class="mb-3">
               <label class="form-label">
                  Detail Barang
               </label>
               {{-- @foreach($b as $student) {
                  @foreach($student as $mykey=>$myValue) {
                     <textarea name="address" class="form-control" rows="3">{{ $b[0] -> id }}</textarea>
                  }
                  @endforeach
               } @endforeach --}}
               <textarea name="address" class="form-control" rows="3">{{ $b[0] -> id }}</textarea>
               <input id="nama_barang" name="nama_barang" value="{{ $b[0] -> jenis_barang }}" required readonly>
               <input id="nama_barang" name="nama_barang" value="{{ $b[0] -> nama_barang }}" required readonly>
               <input id="nama_barang" name="nama_barang" value="{{ $b[0] -> berat_barang }}" required readonly>
            </div>
            <div class="mb-3">
               <button class="btn btn-primary" type="submit">Update</button>
            </div>
         </form>
      </div>
   </div>

   {{-- Modal Jadwal--}}

<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
   <div class="modal-dialog modal-lg" role="document" >
       <div class="modal-content" style="background: #fff;">
           <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Cari Jadwal</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
            <input class="form-control" id="myInput" type="text" placeholder="Search..">
               <table id="lookup" class="table table-bordered table-hover table-striped">
                   <thead>
                       <tr>
                           <th> ID Jadwal </th>
                           <th> ID Trip </th>
                           <th> Pelabuhan Awal </th>
                           <th> Pelabuhan tujuan </th>
                           <th> Kapal </th>
                           <th> Kode Container </th>
                           {{-- <th> Jenis Container </th> --}}
                           <th> Kapasitas </th>
                           <th> ETA </th>
                           <th> ETD </th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach($tjadwal as $data)
                       <tr class="pilih" data-user_id="<?php echo $data->id; ?>" data-user_nisn="<?php echo $data->id_trip; ?>" data-user_email="<?php echo $data->id; ?>" data-user_name="<?php echo $data->id; ?>" >
                        <td>{{$data->id}}</td>
                        <td>{{$data->id_trip}}</td>
                           <td>
                               {{$data->nama_pelabuhan}}
                           </td>
                           <td>{{$data->nama_pelabuhan}}</td>
                           <td>{{$data->nama_kapal}}</td>
                           <td>{{$data->tujuan_pelabuhan_id}}</td>
                           {{-- <td>{{$data->tujuan_pelabuhan_id}}</td> --}}
                           <td>{{$data->tujuan_pelabuhan_id}}</td>
                           <td>{{$data->ETA}}</td>
                           <td>{{$data->ETD}}</td>
                       </tr>
                       @endforeach
                   </tbody>
               </table>
           </div>
       </div>
   </div>
</div>

{{-- Script --}}
<script type="text/javascript">
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#lookup tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
   $(document).on('click', '.pilih', function (e) {
                document.getElementById("user_name").value = $(this).attr('data-user_name');
                document.getElementById("id_jadwal").value = $(this).attr('data-id');
                document.getElementById("user_email").value = $(this).attr('data-user_email');
                document.getElementById("user_nisn").value = $(this).attr('data-user_nisn');
                $('#myModal').modal('hide');
            });


             $(function () {
                $("#lookup").dataTable();
            });

        </script>

@endsection