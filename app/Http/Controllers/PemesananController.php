<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesanan = DB::table('pemesanan')
        ->join('users', 'pemesanan.id_user', 'users.id')
        ->join('kamar', 'pemesanan.id_kamar', 'kamar.id_kamar')
        ->orderByDesc('pemesanan.id_pemesanan')
        ->get();
        $title = 'Data Reservasi Kamar';
        return view('pemesanan.index', compact('title', 'pemesanan'));
    }

    public function pembayaran($id)
    {
        $pemesanan = Pemesanan::find($id);
        $title = 'Upload Pembayaran';
        return view('pemesanan.pembayaran', compact('title', 'pemesanan'));
    }

    public function proses_pembayaran(Request $request, $id)
    {
        $pemesanan = Pemesanan::find($id);
        $request->validate([
            'jumlah_pembayaran_pemesanan' => 'required',
            'bukti_pembayaran_pemesanan' => 'required',
        ]);
        $bukti_pembayaran_pemesanan = $request->file('bukti_pembayaran_pemesanan');
        $namagambarbukti = 'Pembayaran'.date('Ymdhis').'.'.$request->file('bukti_pembayaran_pemesanan')->getClientOriginalExtension();
        $bukti_pembayaran_pemesanan->move('file/pembayaran/',$namagambarbukti);

        $pemesanan->jumlah_pembayaran_pemesanan = $request->jumlah_pembayaran_pemesanan;
        $pemesanan->bukti_pembayaran_pemesanan = $namagambarbukti;
        if($request->jumlah_pembayaran_pemesanan >= $pemesanan->nominal_pemesanan)
        {
            $pemesanan->status_pembayaran_pemesanan = 'Paid';
        }
        else{
            $pemesanan->status_pembayaran_pemesanan = 'Belum Lunas';
        }
        $pemesanan->save();
        return redirect()->route('pemesanan.index')->with('Sukses', 'Berhasil Upload Pembayaran');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        //
    }
}
