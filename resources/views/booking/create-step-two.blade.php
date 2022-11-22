@extends('mylayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('booking.create.step.two.post') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">Step 2: Detail Produk</div>

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
                            <div class="form-group">
                                <label for="description">Jadwal Kapal</label>
                                <input type="text"  value="{{{ $booking->id_jadwal ?? '' }}}" class="form-control" id="productAmount" name="nama_barang" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="position-option">Jenis Container</label>
                                <select class="form-control" id="jenis_container" name="jenis_container">
                                   @foreach ($jc as $jeniscontainer)
                                      <option value="{{ $jeniscontainer->id }}">{{ $jeniscontainer->jenis_container }}</option>
                                   @endforeach
                                </select>
                             </div>
                             <div class="form-group">
                                <label for="position-option">Jenis Barang</label>
                                <select class="form-control" id="jenis_barang" name="jenis_barang">
                                   @foreach ($jb as $jenisbarang)
                                      <option value="{{ $jenisbarang->id }}">{{ $jenisbarang->jenis_barang }}</option>
                                   @endforeach
                                </select>
                             </div>

                            {{-- <div class="form-group">
                                <label for="description">Product Status</label><br/>
                                <label class="radio-inline"><input type="radio" name="status" value="1" {{{ (isset($product->status) && $product->status == '1') ? "checked" : "" }}}> Active</label>
                                <label class="radio-inline"><input type="radio" name="status" value="0" {{{ (isset($product->status) && $product->status == '0') ? "checked" : "" }}}> DeActive</label>
                            </div> --}}
                            <div class="form-group">
                                <label for="description">Nama Barang</label>
                                <input type="text"  value="{{{ $product->nama_barang ?? '' }}}" class="form-control" id="productAmount" name="nama_barang"/>
                            </div>

                            <div class="form-group">
                                <label for="description">Berat Barang</label>
                                <input type="text"  value="{{{ $product->berat ?? '' }}}" class="form-control" id="productAmount" name="berat_barang"/>
                            </div>

                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('booking.create.step.one') }}" class="btn btn-danger pull-right">Previous</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection