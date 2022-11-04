@extends('mylayout')

@section('content')
   <h2>Edit store</h2>
   <div class="row">
      <div class="col">
         <form action="{{ route('stores.update', ['store' => $store]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
               <label class="form-label">Name</label>
               <input name="name" value="{{ $store->name }}" type="text" class="form-control">
            </div>
            <div class="mb-3">
               <label class="form-label">
                  Province
               </label>
               <select id="select_province" name="province" data-placeholder="Select" class="custom-select w-100">
                  <option value="{{ $provinceSelected->id }}" selected>{{ $provinceSelected->name }}</option>
               </select>
            </div>
            <div class="mb-3">
               <label class="form-label">
                  Regency
               </label>
               <select id="select_regency" name="regency" data-placeholder="Select" class="custom-select w-100">
                  <option value="{{ $regencySelected->id }}" selected>{{ $regencySelected->name }}</option>
               </select>
            </div>
            <div class="mb-3">
               <label class="form-label">
                  District
               </label>
               <select id="select_district" name="district" data-placeholder="Select" class="custom-select w-100">
                  <option value="{{ $districtSelected->id }}" selected>{{ $districtSelected->name }}</option>
               </select>
            </div>
            <div class="mb-3">
               <label class="form-label">
                  Village
               </label>
               <select id="select_village" name="village" data-placeholder="Select" class="custom-select w-100">
                  <option value="{{ $villageSelected->id }}" selected>{{ $villageSelected->name }}</option>
               </select>
            </div>
            <div class="mb-3">
               <label class="form-label">
                  Address
               </label>
               <textarea name="address" class="form-control" rows="3">{{ $store->address }}</textarea>
            </div>
            <div class="mb-3">
               <button class="btn btn-primary" type="submit">Update</button>
            </div>
         </form>
      </div>
   </div>
@endsection

@push('javascript-internal')
   <script>
      $(document).ready(function() {
         // set var id
         let provinceID = $('#select_province').val();
         let regencyID = $('#select_regency').val();
         let districtID = $('#select_district').val();

         //  select province:start
         $('#select_province').select2({
            allowClear: true,
            ajax: {
               url: "{{ route('provinces.select') }}",
               dataType: 'json',
               delay: 250,
               processResults: function(data) {
                  return {
                     results: $.map(data, function(item) {
                        return {
                           text: item.name,
                           id: item.id
                        }
                     })
                  };
               }
            }
         });
         //  select province:end

         //  select regency:start
         $('#select_regency').select2({
            allowClear: true,
            ajax: {
               url: "{{ route('regencies.select') }}?provinceID=" + provinceID,
               dataType: 'json',
               delay: 250,
               processResults: function(data) {
                  return {
                     results: $.map(data, function(item) {
                        return {
                           text: item.name,
                           id: item.id
                        }
                     })
                  };
               }
            }
         });
         //  select regency:end

         //  select district:start
         $('#select_district').select2({
            allowClear: true,
            ajax: {
               url: "{{ route('districts.select') }}?regencyID=" + regencyID,
               dataType: 'json',
               delay: 250,
               processResults: function(data) {
                  return {
                     results: $.map(data, function(item) {
                        return {
                           text: item.name,
                           id: item.id
                        }
                     })
                  };
               }
            }
         });
         //  select district:end

         //  select village:start
         $('#select_village').select2({
            allowClear: true,
            ajax: {
               url: "{{ route('villages.select') }}?districtID=" + districtID,
               dataType: 'json',
               delay: 250,
               processResults: function(data) {
                  return {
                     results: $.map(data, function(item) {
                        return {
                           text: item.name,
                           id: item.id
                        }
                     })
                  };
               }
            }
         });
         //  select village:end


         //  Event on change select province:start
         $('#select_province').change(function() {
            //clear select
            $('#select_regency').empty();
            $("#select_district").empty();
            $("#select_village").empty();
            //set id
            provinceID = $(this).val();
            if (provinceID) {
               $('#select_regency').select2({
                  allowClear: true,
                  ajax: {
                     url: "{{ route('regencies.select') }}?provinceID=" + provinceID,
                     dataType: 'json',
                     delay: 250,
                     processResults: function(data) {
                        return {
                           results: $.map(data, function(item) {
                              return {
                                 text: item.name,
                                 id: item.id
                              }
                           })
                        };
                     }
                  }
               });
            } else {
               $('#select_regency').empty();
               $("#select_district").empty();
               $("#select_village").empty();
            }
         });
         //  Event on change select province:end

         //  Event on change select regency:start
         $('#select_regency').change(function() {
            //clear select
            $("#select_district").empty();
            $("#select_village").empty();
            //set id
            regencyID = $(this).val();
            if (regencyID) {
               $('#select_district').select2({
                  allowClear: true,
                  ajax: {
                     url: "{{ route('districts.select') }}?regencyID=" + regencyID,
                     dataType: 'json',
                     delay: 250,
                     processResults: function(data) {
                        return {
                           results: $.map(data, function(item) {
                              return {
                                 text: item.name,
                                 id: item.id
                              }
                           })
                        };
                     }
                  }
               });
            } else {
               $("#select_district").empty();
               $("#select_village").empty();
            }
         });
         //  Event on change select regency:end

         //  Event on change select district:Start
         $('#select_district').change(function() {
            //clear select
            $("#select_village").empty();
            //set id
            districtID = $(this).val();
            if (districtID) {
               $('#select_village').select2({
                  allowClear: true,
                  ajax: {
                     url: "{{ route('villages.select') }}?districtID=" + districtID,
                     dataType: 'json',
                     delay: 250,
                     processResults: function(data) {
                        return {
                           results: $.map(data, function(item) {
                              return {
                                 text: item.name,
                                 id: item.id
                              }
                           })
                        };
                     }
                  }
               });
            }
         });
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
