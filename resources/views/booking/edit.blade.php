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
               <table id="lookup" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID Jadwal</th>
                        <th>Asal</th>
                        <th>Tujuan</th>
                        <th>ETA</th>
                        <th>ETD</th>
                        <th>Nama Kapal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwal as $data)
                    <tr>
                     <td>{{$data->id_jadwal}}</td>
                     <td>{{$data->asal}}</td>
                     <td>{{$data->tujuan}}</td>
                     <td>{{$data->ETA}}</td>
                     <td>{{$data->ETD}}</td>
                     <td>{{$data->nama_kapal}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

               {{-- <input name="id_jadwal" value="{{ $jadwal_decode }}" type="text" class="form-control" readonly> --}}
            </div>
            <input id="id_jadwal" type="hidden" name="id_jadwal" value="{{ old('id_jadwal') }}" required readonly>
               <span class="input-group-btn">
                  <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><b>Cari Jadwal</b> <span class="fa fa-search"></span></button>
               </span>
            <div class="mb-3">
               <label class="form-label">
                  Detail Barang
               </label>
               <label class="form-label">Jadwal</label>
               <textarea name="address" class="form-control" rows="3">{{ $barang->id }}</textarea>
               <label class="form-label">Jenis Barang</label>
               <input id="nama_barang" name="nama_barang" value="{{ $barang->jenis_barang }}" required readonly>
               <label class="form-label">Nama Barang</label>
               <input id="nama_barang" name="nama_barang" value="{{ $barang->nama_barang }}" required readonly>
               <label class="form-label">Berat Barang</label>
               <input id="nama_barang" name="nama_barang" value="{{ $barang->berat_barang }}" required readonly>
            </div>
            <div class="mb-3">
               <label class="form-label">
                  Detail Penerima
               </label>
               <label class="form-label">Nama Penerima</label>
               <textarea name="address" class="form-control" rows="3">{{ $booking->nama_penerima }}</textarea>
               <label class="form-label">Jenis Barang</label>
               <input id="nama_barang" name="nama_barang" value="{{ $booking->telp_penerima }}" required readonly>
               <label class="form-label">Nama Barang</label>
               <input id="nama_barang" name="nama_barang" value="{{ $booking->alamat_penerima }}" required readonly>
            </div>
            <label class="form-label">
              Status Booking
            </label>
            <select class="form-control" id="status" name="status">
               <option value="belum">Belum</option>
               <option value="terima">Terima</option>
               <option value="reschedule">Reschedule</option>
               <option value="tolak">Tolak</option>
            </select>
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
                       <tr class="pilih" data-id_jadwal="<?php echo $data->id; ?>">
                        <td>{{$data->id}}</td>
                        <td>{{$data->id_trip}}</td>
                           <td>
                               {{$data->awal->nama_pelabuhan}}
                           </td>
                           <td>{{$data->tujuan->nama_pelabuhan}}</td>
                           <td>{{$data->nama_kapal}}</td>
                           <td>{{$data->kode_container}}</td>
                           {{-- <td>{{$data->tujuan_pelabuhan_id}}</td> --}}
                           <td>{{$data->kapasitas_berat}}</td>
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
                document.getElementById("id_jadwal").value = $(this).attr('data-id_jadwal');
                $('#myModal').modal('hide');
            });

             $(function () {
                $("#lookup").dataTable();
            });

        </script>

@endsection
