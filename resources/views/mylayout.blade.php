<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <!-- Select2 CSS -->
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
   {{-- search modal --}}
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

   {{-- datatabke --}}
   <link href="{{ asset('datatables/jquery.dataTables.js') }}" rel="stylesheet">
   <title>My store</title>
</head>
<style>
   * {
     box-sizing: border-box;
   }

   body {
     background-color: #f1f1f1;
   }

   #regForm {
     background-color: #ffffff;
     margin: 100px auto;
     font-family: Raleway;
     padding: 40px;
     width: 70%;
     min-width: 300px;
   }

   h1 {
     text-align: center;
   }

   input {
     padding: 10px;
     width: 100%;
     font-size: 17px;
     font-family: Raleway;
     border: 1px solid #aaaaaa;
   }

   /* Mark input boxes that gets an error on validation: */
   input.invalid {
     background-color: #ffdddd;
   }

   /* Hide all steps by default: */
   .tab {
     display: none;
   }

   button {
     background-color: #04AA6D;
     color: #ffffff;
     border: none;
     padding: 10px 20px;
     font-size: 17px;
     font-family: Raleway;
     cursor: pointer;
   }

   button:hover {
     opacity: 0.8;
   }

   #prevBtn {
     background-color: #bbbbbb;
   }

   /* Make circles that indicate the steps of the form: */
   .step {
     height: 15px;
     width: 15px;
     margin: 0 2px;
     background-color: #bbbbbb;
     border: none;
     border-radius: 50%;
     display: inline-block;
     opacity: 0.5;
   }

   .step.active {
     opacity: 1;
   }

   /* Mark the steps that are finished and valid: */
   .step.finish {
     background-color: #04AA6D;
   }
   </style>

<body>

   <div class="container">
      @yield('content')
   </div>
   <!-- Jquery -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   <!-- Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
   </script>
   <!-- Select2 -->
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   @stack('javascript-internal')
</body>

</html>
