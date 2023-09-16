@extends('layouts.web')
@section('isi')
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('file/kamar/'.$kamar->foto_kamar) }});"
        data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
                    <h1 class="text-white">Kamar {{ $kamar->no_kamar }}</h1>
                    <p>Rp. {{ number_format($kamar->harga_kamar) }} / Bulan</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="featured-property-half d-flex">
            <div class="image" style="background-image: url({{ asset('file/kamar/'.$kamar->foto_kamar) }})"></div>
            <div class="text">
                <h2>Kamar {{ $kamar->no_kamar }}</h2>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('proses_pesan_kamar') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_kamar" value="{{ $kamar->id_kamar }}">
                    <div class="form-group mb-2">
                        <label for="">Durasi Pemesanan (*Dalam Jumlah Bulan)</label>
                        <input type="number" class="form-control" placeholder="Masukkan jumlah bulan" name="lama_pemesanan">
                    </div>
                    <button class="btn btn-primary" onclick="return confirm('Apakah anda sudah yakin?')">Pesan Sekarang</button>
                </form>
               
            </div>
        </div>
    </div>
@endsection
