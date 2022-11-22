@extends('mylayout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('booking.create.step.three.post') }}" method="post" >
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">Step 3: Review Details</div>

                    <div class="card-body">

                            <table class="table">
                                <tr>
                                    <td>Product Name:</td>
                                    <td><strong>{{$booking->id_jadwal}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Product Amount:</td>
                                    <td><strong>{{$barang->jenis_container}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Product status:</td>
                                    <td><strong>{{$barang->jenis_barang}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Product Description:</td>
                                    <td><strong>{{$barang->nama_barang}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Product Description:</td>
                                    <td><strong>{{$barang->berat_barang}}</strong></td>
                                </tr>
                            </table>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('booking.create.step.two') }}" class="btn btn-danger pull-right">Previous</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection