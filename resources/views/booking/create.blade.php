@extends('mylayout')

@section('content')
   <h2>Create store</h2>
   <div class="row">
      <div class="col">
         <form action="{{ route('booking.store') }}" method="post">
            @csrf
            <div class="mb-3">
               <label class="form-label">Name</label>
               <input name="name" type="text" class="form-control">
            </div>
            @livewire('dropdowns', ['selectedPelabuhan1' => 1])
            {{-- <div class="mb-3">
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
               <select id="select_pelabuhan2" name="pelabuhan2" data-placeholder="Select" class="custom-select w-100">
               </select>
            </div>
            <div class="mb-3">
               <label class="form-label">
                  Jadwal Kapal
               </label>
               <select id="select_jadwal" name="jadwal" data-placeholder="Select" class="custom-select w-100">
               </select>
            </div> --}}
            <div class="mb-3">
               <label class="form-label">
                  Village
               </label>
               <select id="select_village" name="village" data-placeholder="Select" class="custom-select w-100">
               </select>
            </div>
            <div class="mb-3">
               <label class="form-label">
                  Address
               </label>
               <textarea name="address" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
               <button class="btn btn-primary" type="submit">Create</button>
            </div>
         </form>
      </div>
   </div>
@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#country_id').change(function () {
                var $state = $('#state_id');
                $.ajax({
                    url: "{{ route('pelabuhan2.pelabuhan2') }}",
                    data: {
                        country_id: $(this).val()
                    },
                    success: function (data) {
                        $state.html('<option value="" selected>Choose state</option>');
                        $.each(data, function (id, value) {
                            $state.append('<option value="' + id + '">' + value + '</option>');
                        });
                    }
                });
                $('#state_id, #city_id').val("");
                $('#state').removeClass('d-none');
            });
            $('#state_id').change(function () {
                var $city = $('#city_id');
                $.ajax({
                    url: "{{ route('jadwal.jadwal') }}",
                    data: {
                        state_id: $(this).val()
                    },
                    success: function (data) {
                        $city.html('<option value="" selected>Choose city</option>');
                        $.each(data, function (id, value) {
                            $city.append('<option value="' + id + '">' + value + '</option>');
                        });
                    }
                });
                $('#city').removeClass('d-none');
            });
        });
    </script>
@endsection

{{-- JS dah fix --}}
{{-- @push('javascript-internal')
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
                  allowClear: true,
                  ajax: {
                     url: "{{ route('pelabuhan2.select') }}?asalID="+asalID,
                     dataType: 'json',
                     delay: 250,
                     processResults: function(data) {
                        return {
                           results: $.map(data, function(item) {
                              return {
                                 text: item.kode_pelabuhan+"-"+item.nama_pelabuhan,
                                 id: item.kode_pelabuhan
                              }
                           })
                        };
                     }
                  }
               });
            }
         });

         $('#select_pelabuhan2').change(function() {
            //clear select
            $("#select_jadwal").empty();

            //set id
            let tujuanID = $('#select_pelabuhan2').val();
            let asalID = $('#select_pelabuhan1').val();
            if (tujuanID) {
               $('#select_jadwal').select2({
                  //var yay = "asalID='"+ asalID+"'&tujuanID='"+tujuanID+"'"
                  allowClear: true,
                  ajax: {
                     url: "{{ route('jadwalkapal.select') }}?asalID="+asalID+"&"+"tujuanID="+tujuanID,
                     dataType: 'json',
                     delay: 250,
                     processResults: function(data) {
                        return {
                           results: $.map(data, function(item) {
                              return {
                                 text: item.id_trip+"|"+item.nama_kapal +"|"+ "ETA: " + item.ETA +"|" +"ETD: " +item.ETD,
                                 id: item.id
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

@endpush --}}
