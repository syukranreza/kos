<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konf = Setting::first();
        $kamar = DB::table('kamar')
        ->limit(6)
        ->get();
        return view('welcome', compact('konf', 'kamar'));
    }

    public function data_kamar()
    {
        $kamar = Kamar::all();
        $konf = Setting::first();
        return view('data_kamar', compact('kamar', 'konf'));
    }

    public function detail_kamar($id)
    {
        $kamar = Kamar::find($id);
        $list = Kamar::all();
        $konf = Setting::first();
        return view('detail_kamar', compact('kamar', 'konf', 'list'));
    }

    public function pesan_kamar($id)
    {
        $kamar = Kamar::find($id);
        $konf = Setting::first();
        return view('pesan_kamar', compact('kamar', 'konf'));
    }

    public function proses_pesan_kamar(Request $request)
    {
        $kamar = Kamar::find($request->id_kamar);
        $messages = [ 
            'required' => 'Atribut Wajib Diisi',
        ];
        $request->validate([
            'lama_pemesanan' => 'required',
        ], $messages);
        $pemesanan = new Pemesanan();
        $pemesanan->id_kamar = $kamar->id_kamar;
        $pemesanan->id_user = Auth::user()->id;
        $pemesanan->lama_pemesanan = $request->lama_pemesanan;
        $pemesanan->nominal_pemesanan = $kamar->harga_kamar * $request->lama_pemesanan;
        $pemesanan->status_pembayaran_pemesanan = 'Unpaid';
        $pemesanan->save();

        $kamar->status_kamar = 'Booked';
        $kamar->save();
        return redirect('notif');
    }

    public function notif()
    {
        return view('notif');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
