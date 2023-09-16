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

    <div class="container">
        <div class="featured-property-half d-flex">
            <div class="image" style="background-image: url({{ asset('file/kamar/'.$kamar->foto_kamar) }})"></div>
            <div class="text">
                <h2>Kamar {{ $kamar->no_kamar }}</h2>
                <p class="mb-5">{!! $kamar->deskripsi_kamar !!}</p>
                <ul class="property-list-details mb-5">
                    <li>No. Kamar: <strong>{{ $kamar->no_kamar }}</strong></li>
                    <li>Harga / Bulan: <strong>Rp. {{ number_format($kamar->harga_kamar) }}</strong></li>
                    <li>Status: <strong>{{ $kamar->status_kamar }}</strong></li>
                </ul>
                @if (Auth::check())
                @if ($kamar->status_kamar == 'Tersedia')
                <p><a href="{{ url('pesan_kamar', $kamar->id_kamar) }}" class="btn btn-primary px-4 py-3">Pesan Sekarang</a></p>
                @else
                <p>Kamar Ini Sudah Laku</p>
                @endif
                @else
                <p>Anda Harus Login Terlebih Dahulu Untuk Bisa Memesan Kamar</p>
                @endif
            </div>
        </div>
    </div>
    
    
  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
          <h2 class="mb-5">Lihat Kamar</h2>
          <p>Tersedia berbagai macam pilihan kamar yang dapat anda pilih sesuai dengan keinginan anda masing-masing</p>
        </div>
      </div>
      <div class="row">
        @foreach ($list as $row)
        <div class="col-md-6 col-lg-4 mt-2" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ url('detail_kamar', $row->id_kamar) }}" class="unit-9">
              <img src="{{ asset('file/kamar/'.$row->foto_kamar) }}" alt="" class="image">
              <div class="unit-9-content">
                <h2>Kamar {{ $row->no_kamar }}</h2>
                <span>Rp. {{ number_format($row->harga_kamar) }} / Bulan</span>
              </div>
            </a>
          </div>
        @endforeach
        <div class="col-md-12 text-center mt-5" data-aos="fade-up">
          <a href="{{ url('data_kamar') }}" class="btn btn-primary">Lihat Kamar Lain</a>
        </div>
      </div>
    </div>
  </div>
@endsection
