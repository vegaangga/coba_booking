@extends('mylayout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('booking.create.step.one.post') }}" method="POST">
                @csrf

                <div class="card">
                    <div class="card-header">Step 1: Pilih Jadwal</div>

                    <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
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
                                <select id="select_pelabuhan2" name="pelabuhan2" data-placeholder="Select" class="custom-select w-100">
                                </select>
                             </div>
                             <div class="mb-3">
                                <label class="form-label">
                                   Pelabuhan - 3
                                </label>
                                <select id="select_jadwal" name="id_jadwal" data-placeholder="Select" class="custom-select w-100" value="{{ $booking->id_jadwal ?? '' }}" required>
                                </select>
                             </div>
                             <button type="button" onclick="myFunction()">Try it</button>
                                <p id="demo"></p>

                            {{-- <div class="form-group">
                                <label for="title">Product Name:</label>
                                <input type="text" value="{{ $product->name ?? '' }}" class="form-control" id="taskTitle"  name="name">
                            </div>
                            <div class="form-group">
                                <label for="description">Product Amount:</label>
                                <input type="text"  value="{{{ $product->amount ?? '' }}}" class="form-control" id="productAmount" name="amount"/>
                            </div>

                            <div class="form-group">
                                <label for="description">Product Description:</label>
                                <textarea type="text"  class="form-control" id="taskDescription" name="description">{{{ $product->description ?? '' }}}</textarea>
                            </div> --}}

                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

{{-- JS dah fix --}}
@push('javascript-internal')
   <script>
             function myFunction() {
            var x = document.getElementById("select_jadwal").value;
            document.getElementById("demo").innerHTML = x;
            }
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

         // EVENT ON CLEAR
         $('#select_pelabuhan1').on('select2:clear', function(e) {
            $("#select_pelabuhan2").select2();
            $("#select_jadwal").select2();
         });

         $('#select_pelabuhan2').on('select2:clear', function(e) {
            $("#select_jadwal").select2();
         });
      });
   </script>

@endpush
