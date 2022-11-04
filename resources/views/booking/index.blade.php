@extends('mylayout')

@section('content')
   <h3>Booking</h3>
   <div class="row">
      <div class="col">
         <a class="btn btn-primary" href="{{ route('booking.create') }}">Add</a>
      </div>
   </div>
   <div class="row">
      <div class="col">
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Client</th>
                  <th scope="col">Kapal</th>
                  <th scope="col">Tanggal Booking</th>
                  <th scope="col">Barang</th>
                  {{-- <th scope="col">Container</th> --}}
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
               </tr>
            </thead>
            <tbody>
               @forelse ($booking->user as $store)
                  <tr>
                     <th></th>
                     <th>{{ $store->user->id}}</th>
                     <td>{{ $store->id_jadwal}}</td>
                     <td>{{ $store->id_barang }}</td>
                     <td>{{ $store->tanggal }}</td>
                     {{-- <td>{{ $store->container->kode_container }}</td> --}}
                     <td>{{ $store->status }}</td>
                     <td><a class="btn btn-primary" href="{{ route('booking.edit', ['store' => $store]) }}">Edit</a></td>
                  </tr>
               @empty
                  <tr>
                     <td colspan="100%">
                        Data not found
                     </td>
                  </tr>
               @endforelse
            </tbody>
         </table>
      </div>
   </div>
   {{-- @if ($booking->hasPages())
      <div class="row">
         <div class="col">
            {{ $booking->links('pagination::bootstrap-4') }}
         </div>
      </div>
   @endif --}}

@endsection
