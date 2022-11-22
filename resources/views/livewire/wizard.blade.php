<div>

    @if(!empty($successMessage))
    <div class="alert alert-success">
       {{ $successMessage }}
    </div>
    @endif

    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }}">1</a>
                <p>Step 1</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">2</a>
                <p>Step 2</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}" disabled="disabled">3</a>
                <p>Step 3</p>
            </div>
        </div>
    </div>

        <div class="row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> Step 1</h3>
                    <div class="mb-3">
                        <label for="select_pelabuhan1" class="form-label">
                           Pelabuhan - 1
                        </label>
                        <select id="select_pelabuhan1" name="pelabuhan1" data-placeholder="Select" class="custom-select w-100">
                            <option value=''>Pelabuhan Asal</option>
                        </select>
                     </div>
                     <div class="mb-3">
                        <label for="select_pelabuhan2" class="form-label">
                           Pelabuhan - 2
                        </label>
                        <select id="select_pelabuhan2" name="pelabuhan2" data-placeholder="Select" class="custom-select w-100">
                            <option value=''>Pelabuhan Tujuan</option>
                        </select>
                     </div>
                     <div class="mb-3">
                        <label for="select_jadwal" class="form-label">
                           Jadwal Kapal
                        </label>
                        <select id="select_jadwal" data-placeholder="Select" class="custom-select w-100" value="">
                            <option value=''>Jadwal Kapal</option>
                        </select>
                        <input type="text" wire:model="jadwalkapal" name="jadwalkapal" class="form-control" id="id_jadwall"/>
                        <span id="id_jadwal" ></span>
                        @error('jadwalkapal') <span class="error">{{ $message }}</span> @enderror
                     </div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit" type="button" >Next</button>
                </div>
            </div>
        </div>
        <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> Step 2</h3>

                    <div class="form-group">
                        <label for="description">Product Status</label><br/>
                        <label class="radio-inline"><input type="radio" wire:model="status" value="1" {{{ $status == '1' ? "checked" : "" }}}> Active</label>
                        <label class="radio-inline"><input type="radio" wire:model="status" value="0" {{{ $status == '0' ? "checked" : "" }}}> DeActive</label>
                        @error('status') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="productAmount">Product Stock</label>
                        <input type="text" wire:model="stock" class="form-control" id="productAmount"/>
                        @error('stock') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="secondStepSubmit">Next</button>
                    <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(1)">Back</button>
                </div>
            </div>
        </div>
        <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> Step 3</h3>

                    <table class="table">
                        <tr>
                            <td>ID Jadwal</td>
                            <td><strong>{{$jadwalkapal}}</strong></td>
                        </tr>
                        <tr>
                            <td>Product Amount:</td>
                            <td><strong>{{$amount}}</strong></td>
                        </tr>
                        <tr>
                            <td>Product status:</td>
                            <td><strong>{{$status ? 'Active' : 'DeActive'}}</strong></td>
                        </tr>
                        <tr>
                            <td>Product Description:</td>
                            <td><strong>{{$description}}</strong></td>
                        </tr>
                        <tr>
                            <td>Product Stock:</td>
                            <td><strong>{{$stock}}</strong></td>
                        </tr>
                    </table>

                    <button class="btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">Finish!</button>
                    <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(2)">Back</button>
                </div>
            </div>
        </div>
    </div>

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

         $('#select_pelabuhan1').change(function () {
            $("#select_pelabuhan2").empty();
            $("#select_jadwal").empty();
                var $pelabuhan2 = $('#select_pelabuhan2');
                $.ajax({
                    url: "{{ route('states.index') }}",
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

         $('#select_jadwal').change(function() {
            let jadwalID = $('#select_jadwal').val();
            const span = document.getElementById('id_jadwal');
            span.insertAdjacentText('beforeend', jadwalID);
            document.getElementById("id_jadwall").value = jadwalID;
         })
        //  let jadwalID = $('#select_jadwal').val();
        //  document.getElementById("id_jadwal").value = jadwalID;

      });
   </script>

@endpush
