@extends('mydefault')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Manage Product</div>

                <div class="card-body">

                    <a href="{{ route('booking.create.step.one') }}" class="btn btn-primary pull-right">Create Product</a>

                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID User</th>
                            <th scope="col">ID Jadwal</th>
                            <th scope="col">ID Barang</th>
                            <th scope="col">ID Container</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <th scope="row">{{$product->id}}</th>
                                <td>{{$product->id_user}}</td>
                                <td>{{$product->id_jadwal}}</td>
                                <td>{{$product->id_barang}}</td>
                                <td>{{$product->id_container}}</td>
                                <td>{{$product->status}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection