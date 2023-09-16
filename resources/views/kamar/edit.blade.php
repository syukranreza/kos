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
                    <form action="{{ route('kamar.update', $kamar->id_kamar) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="">Nomor kamar</label>
                        <input type="number" class="form-control" name="no_kamar" value="{{ $kamar->no_kamar }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Deskripsi Kamar</label>
                        <textarea name="deskripsi_kamar" id="editor" rows="3" class="form-control">{{ $kamar->deskripsi_kamar }}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Harga Kamar / Bulan</label>
                        <input type="number" class="form-control" name="harga_kamar" value="{{ $kamar->harga_kamar }}">
                    </div>
                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" class="form-control" accept="image/*" name="foto_kamar" id="preview_gambar" />
                    </div>
                    <div class="form-group">
                        <label for="">Preview Icon</label>
                        <img src="{{ asset('file/kamar/'.$kamar->foto_kamar) }}" alt="" style="width: 30%; height: 30%" id="gambar_nodin">
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
@section('script')
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ),{
            ckfinder: {
                uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
    }
        })
        .catch( error => {
            console.error( error );
        } );
  </script>
  <script>
      CKEDITOR.replace( 'editor', {
          filebrowserUploadUrl: "{{route('image.upload', ['_token' => csrf_token() ])}}",
          filebrowserUploadMethod: 'form'
      });
  </script>
@endsection