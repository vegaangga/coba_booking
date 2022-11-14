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
         <div class="col">
            <form action="{{ route('jadwal.search') }}" method="GET">
            <div class="mb-3">
               <label class="form-label">
                  Pelabuhan - 1
               </label>
               <select id="select_pelabuhan1" name="pelabuhan1" data-placeholder="Select" class="custom-select w-100">
               </select>
            </div>
            <div class="mb-3">
               <label class="form-label">
                  Pelabuhan - 2
               </label>
               <select id="select_pelabuhan2" name="pelabuhan2" data-placeholder="Select" class="custom-select w-100" data-placeholder="select">
               </select>
            </div>
         </div>
         <div class="mb-3">
            <button class="btn btn-primary" type="submit">Search</button>
         </div>
      </form>
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">asal</th>
                  <th scope="col">final</th>
                  {{-- <th scope="col">rute</th> --}}
                  {{-- <th scope="col">Container</th> --}}

                  <th scope="col">Action</th>
               </tr>
            </thead>
            <tbody>
               @forelse ($trip as $store)
                  <tr>
                     <th>{{ $store->id}}</th>
                     <td>{{ $store->id_trip}}</td>
                     <th>{{ $store->asal_pelabuhan_id}}</th>
                     <td>{{ $store->tujuan_pelabuhan_id}}</td>
                     {{-- <td>{{ $store->pelabuhan->nama_pelabuhan }}</td>
                     <td>{{ $store->pelabuhan->nama_pelabuhan }}</td> --}}
                     {{-- <td>{{ $store->rute }}</td> --}}
                     {{-- <td>{{ $store->container->kode_container }}</td> --}}
                     <td>
                        <button type="submit" class="btn btn-primary btn-block"  href="{{ route('booking.index', ['store' => $store]) }}" data_id="<?php echo $store->id; ?>" data-toggle="modal" data-target="#myModal">Jadwal Kapal</button>
                        <a class="btn btn-primary" href="{{ route('booking.edit', ['store' => $store]) }}">Pilih Trip</a>
                     </td>
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
   <div class="modal fade" id="contohModal" role="dialog" arialabelledby="modalLabel" area-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <p>Test</p>
          </div>
        </div>
      </div>
    </div>
   {{-- @if ($store->hasPages())
      <div class="row">
         <div class="col">
            {{ $store->links('pagination::bootstrap-4') }}
         </div>
      </div>
   @endif --}}
{{-- modal tabel --}}
   <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
      <div class="modal-dialog modal-lg" role="document" >
          <div class="modal-content" style="background: #fff;">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Jadwal Kapal</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <table id="lookup" class="table table-bordered table-hover table-striped">
                      <thead>
                          <tr>
                              <th> Id Trip </th>
                              <th> Pelabuhan </th>
                              <th> ETA </th>
                              <th> ETD </th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($rute as $data)
                          <tr class="pilih" data-user_id="<?php echo $data->id; ?>" data-user_name="<?php echo $data->name; ?>" >
                              <td>{{$data->id_trip}}</td>
                        <td>
                          {{$data->asal_pelabuhan_id}}
                        </td>
                        <td>{{$data->ETA}}</td>
                        <td>
                          @if ($data->level == '1')
                          <p>Siswa</p>
                          @endif
                        </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>



@endsection

@push('javascript-internal')
   <script>
      $(document).ready(function() {

         //  select province:start
         $('#select_pelabuhan1').select2({
            allowClear: true,
            ajax: {
               url: "{{ route('pelabuhan.select') }}",
               dataType: 'json',
               delay: 250,
               processResults: function(data) {
                  return {
                     results: $.map(data, function(item) {
                        return {
                           text: item.kode_pelabuhan + '-' +item.nama_pelabuhan,
                           id: item.kode_pelabuhan
                        }
                     })
                  };
               }
            }
         });

         $('#select_pelabuhan1').change(function() {
            //clear select
            $("#select_pelabuhan2").empty();
            $("#select_jadwal").empty();

            //set id
            let asalID = $('#select_pelabuhan1').val();
            if (asalID) {
               $('#select_pelabuhan2').select2({
                  //var yay = "asalID='"+ asalID+"'&tujuanID='"+tujuanID+"'"
                  allowClear: true,
                  ajax: {
                     url: "{{ route('pelabuhan2.select') }}?asalID="+asalID,
                     dataType: 'json',
                     delay: 250,
                     processResults: function(data) {
                        return {
                           results: $.map(data, function(item) {
                              return {
                                 text: item.kode_pelabuhan+'-'+item.nama_pelabuhan,
                                 id: item.kode_pelabuhan
                              }
                           })
                        };
                     }
                  }
               });
            }
         });


         // $('#select_pelabuhan2').select2({
         //    allowClear: true,
         //    ajax: {
         //       url: "{{ route('pelabuhan.select') }}",
         //       dataType: 'json',
         //       delay: 250,
         //       processResults: function(data) {
         //          return {
         //             results: $.map(data, function(item) {
         //                return {
         //                   text: item.kode_pelabuhan + '-' +item.nama_pelabuhan,
         //                   id: item.kode_pelabuhan
         //                }
         //             })
         //          };
         //       }
         //    }
         // });

         // $('select_pelabuhan2').change(function(){
         //    $("#select_jadwal").empty();
         //    // $('#select_pelabuhan2').change(function(){
         //       let asalID = $('#select_pelabuhan1').val();
         //       let tujuanID = $('#select_pelabuhan2').val();

         //       if (asalID) {
         //       $('#select_pelabuhan2').select2({
         //          allowClear: true,
         //          ajax: {
         //             url: "{{ route('pelabuhan2.select') }}?asalID=" + asalID,
         //             dataType: 'json',
         //             delay: 250,
         //             processResults: function(data) {
         //                return {
         //                   results: $.map(data, function(item) {
         //                      return {
         //                         text: item.kode_pelabuhan + '-' +item.nama_pelabuhan,
         //                         id: item.id
         //                      }
         //                   })
         //                };
         //             }
         //          }
         //       });

         //    } else {
         //       $('#select_pelabuhan2').empty();
         //       $("#select_jadwal").empty();
         //    }
         //    // })
         // })

         // //  Event on change select province:end

         // //  Event on change select regency:start
         // $('#select_regency').change(function() {
         //    //clear select
         //    $("#select_district").empty();
         //    $("#select_village").empty();
         //    //set id
         //    let regencyID = $(this).val();
         //    if (regencyID) {
         //       $('#select_district').select2({
         //          allowClear: true,
         //          ajax: {
         //             url: "{{ route('districts.select') }}?regencyID=" + regencyID,
         //             dataType: 'json',
         //             delay: 250,
         //             processResults: function(data) {
         //                return {
         //                   results: $.map(data, function(item) {
         //                      return {
         //                         text: item.name,
         //                         id: item.id
         //                      }
         //                   })
         //                };
         //             }
         //          }
         //       });
         //    } else {
         //       $("#select_district").empty();
         //       $("#select_village").empty();
         //    }
         //    })

         // });
         //  Event on change select regency:end

         //  Event on change select district:Start
         // $('#select_pelabuhan1').change(function() {
         //    //clear select
         //    $("#select_pelabuhan2").empty();
         //    //set id
         //    let asalID = $('#select_pelabuhan1').val();
         //    if (asalID) {
         //       $('#select_pelabuhan2').select2({
         //          allowClear: true,
         //          ajax: {
         //             url: "{{ route('pelabuhan2.select') }}?asalID=" + asalID,
         //             dataType: 'json',
         //             delay: 250,
         //             processResults: function(data) {
         //                return {
         //                   results: $.map(data, function(item) {
         //                      return {
         //                         text: item.kode_pelabuhan,
         //                         id: item.id
         //                      }
         //                   })
         //                };
         //             }
         //          }
         //       });
         //    }
         // });
         //  Event on change select district:End

         // EVENT ON CLEAR
         $('#select_province').on('select2:clear', function(e) {
            $("#select_regency").select2();
            $("#select_district").select2();
            $("#select_village").select2();
         });

         $('#select_regency').on('select2:clear', function(e) {
            $("#select_district").select2();
            $("#select_village").select2();
         });

         $('#select_district').on('select2:clear', function(e) {
            $("#select_village").select2();
         });
      });
   </script>

@endpush
