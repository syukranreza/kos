@extends('layouts.web')
@section('isi')
<div class="site-blocks-cover overlay" style="background-image: url('web/images/hero_bg_2.jpg');" data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-8 text-center" data-aos="fade-up" data-aos-delay="400">
          <h1 class="mb-4">{{ $konf->tentang_setting }}</h1>
          <p class="mb-5">{{ $konf->alamat_setting }}</p>
        </div>
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
        @foreach ($kamar as $row)
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
      </div>
    </div>
  </div>
@endsection