@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body table table-responsive">
                    @if ($message = Session::get('Sukses'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ $message }}
                    </div>
                    @endif
                    @if (Auth::user()->role == 'Admin')
                    <table class="table table-bordered" id="example2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pemesan</th>
                                <th>Kamar</th>
                                <th>Lama Pesan</th>
                                <th>Harga</th>
                                <th>Jumlah Bayar</th>
                                <th>Status</th>
                                <th>Bukti Bayar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemesanan as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->name }}, {{ $row->email }}</td>
                                    <td>{{ $row->no_kamar }}</td>
                                    <td>{{ $row->lama_pemesanan }} Bulan</td>
                                    <td>Rp. {{ number_format($row->nominal_pemesanan) }}</td>
                                    <td>
                                        @if ($row->jumlah_pembayaran_pemesanan != '')
                                            Rp. {{ number_format($row->jumlah_pembayaran_pemesanan) }}
                                        @else
                                            Belum Ada Pembayaran
                                        @endif
                                    </td>
                                    <td>{{ $row->status_pembayaran_pemesanan }}</td>
                                    <td>
                                        @if ($row->bukti_pembayaran_pemesanan != '')
                                             <img src="{{ asset('file/pembayaran/'.$row->bukti_pembayaran_pemesanan) }}" alt="" style="width: 100px;">
                                        @else
                                            Belum Ada Pembayaran
                                        @endif
                                    </td>
                                    <td>
                                        @if ($row->status_pembayaran_pemesanan != 'Paid')
                                        <a href="{{ url('pemesanan.pembayaran', $row->id_pemesanan) }}" class="btn btn-success btn-xs" style="display: inline-block"><i class="fas fa-money-bill-wave-alt"></i> Bayar</a></td>
                                        @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                    @if (Auth::user()->role != 'Admin')
                    <table class="table table-bordered" id="example2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pemesan</th>
                                <th>Kamar</th>
                                <th>Lama Pesan</th>
                                <th>Harga</th>
                                <th>Jumlah Bayar</th>
                                <th>Status</th>
                                <th>Bukti Bayar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemesanan as $row)
                            @if (Auth::user()->id == $row->id_user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->name }}, {{ $row->email }}</td>
                                    <td>{{ $row->no_kamar }}</td>
                                    <td>{{ $row->lama_pemesanan }} Bulan</td>
                                    <td>Rp. {{ number_format($row->nominal_pemesanan) }}</td>
                                    <td>
                                        @if ($row->jumlah_pembayaran_pemesanan != '')
                                            Rp. {{ number_format($row->jumlah_pembayaran_pemesanan) }}
                                        @else
                                            Belum Ada Pembayaran
                                        @endif
                                    </td>
                                    <td>{{ $row->status_pembayaran_pemesanan }}</td>
                                    <td>
                                        @if ($row->bukti_pembayaran_pemesanan != '')
                                             <img src="{{ asset('file/pembayaran/'.$row->bukti_pembayaran_pemesanan) }}" alt="" style="width: 100px;">
                                        @else
                                            Belum Ada Pembayaran
                                        @endif
                                    </td>
                                    <td>
                                        @if ($row->status_pembayaran_pemesanan != 'Paid')
                                        <a href="{{ url('pemesanan.pembayaran', $row->id_pemesanan) }}" class="btn btn-success btn-xs" style="display: inline-block"><i class="fas fa-money-bill-wave-alt"></i> Bayar</a></td>
                                        @else
                                        Lunas
                                        @endif
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table> 
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection