@extends('mylayout')
@section('content')

<form id="regForm" action="{{ route('booking.store') }}" method="POST">
    @csrf
    <h1>Register:</h1>
    <!-- One "tab" for each step in the form: -->
    <div class="tab">Nama Pelabuhan
      {{-- <p><input placeholder="First name..." oninput="this.className = ''" name="fname"></p>
      <p><input placeholder="Last name..." oninput="this.className = ''" name="lname"></p> --}}
      <p><select id="select_pelabuhan1" name="pelabuhan1" data-placeholder="Select" class="custom-select w-100">
    </select></p>
    <p><select id="select_pelabuhan2" name="pelabuhan2" data-placeholder="Select" class="custom-select w-100">
    </select></p>
    <p><select id="select_jadwal" name="id_jadwal" data-placeholder="Select" class="custom-select w-100">
    </select></p>
    </div>
    <div class="tab">Detail Barang
            <label for="position-option">Jenis Container</label>
            <select class="form-control" id="jenis_container" name="jenis_container">
               @foreach ($jc as $jeniscontainer)
                  <option value="{{ $jeniscontainer->id }}">{{ $jeniscontainer->jenis_container }}</option>
               @endforeach
            </select>
            <label for="position-option">Jenis Barang</label>
            <select class="form-control" id="jenis_barang" name="jenis_barang">
               @foreach ($jb as $jenisbarang)
                  <option value="{{ $jenisbarang->id }}">{{ $jenisbarang->jenis_barang }}</option>
               @endforeach
            </select>

                <label for="description">Nama Barang</label>
                <p><input type="text" class="form-control" oninput="this.className = ''" id="productAmount" name="nama_barang"/></p>

                <label for="description">Berat Barang</label>
                <p><input type="text" class="form-control" oninput="this.className = ''" id="productAmount" name="berat_barang"/></p>
    </div>
    <div class="tab">Informasi Penerima
      <p><input placeholder="nama" oninput="this.className = ''" name="nama_penerima"></p>
      <p><input placeholder="telp" oninput="this.className = ''" name="telp_penerima"></p>
      <p><input placeholder="alamat" oninput="this.className = ''" name="alamat_penerima"></p>
    </div>

    <div style="overflow:auto;">
      <div style="float:right;">
        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
      </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
    </div>
  </form>

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


    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
      }
      //... and run a function that will display the correct step indicator:
      fixStepIndicator(n)
    }

    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }

    function validateForm() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
          // and set the current valid status to false
          valid = false;
        }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
    }

    function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += " active";
    }
    </script>
    @endpush