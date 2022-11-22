@extends('mylayout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('booking.create.step.one.post') }}" method="post" >
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">Step 2: Review Details 1</div>

                    <div class="card-body">

                            <table class="table">
                                <tr>
                                    <td>ID-Produk</td>
                                    <td><strong>{{$booking->id_jadwal}}</strong></td>
                                </tr>
                            </table>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('booking.create.step.one') }}" class="btn btn-danger pull-right">Previous</a>
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