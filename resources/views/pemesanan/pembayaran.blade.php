@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Error!</strong> 
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('proses_pembayaran', $pemesanan->id_pemesanan) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="">Jumlah Yang Harus di Bayar:</label>
                        <p class="form-control"> Rp. {{ number_format($pemesanan->nominal_pemesanan) }}</p>
                    </div> 
                    <div class="form-group mb-2">
                        <label for="">Jumlah Pembayaran</label>
                        <input type="number" class="form-control" name="jumlah_pembayaran_pemesanan" value="{{ old('jumlah_pembayaran_pemesanan') }}">
                    </div>
                    <div class="form-group">
                        <label for="">Bukti Pembayaran</label>
                        <input type="file" class="form-control" name="bukti_pembayaran_pemesanan" accept="image/*" placeholder="" id="preview_gambar" required/>
                    </div>
                    <div class="form-group">
                        <label for="">Preview Bukti</label>
                        <img src="#" alt="" style="width: 30%; height: 30%" id="gambar_nodin">
                    </div>      
                </div>
                <div class="card-footer">
                    <button class="btn btn-dark"><i class="fas fa-save fa-pulse"> </i> Save</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
