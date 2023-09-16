<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kamar = Kamar::all();
        $title = 'Data Kamar';
        return view('kamar.index', compact('title', 'kamar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Kamar';
        return view('kamar.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Atribut Wajib Diisi',
        ];
        $request->validate([
            'no_kamar' => 'required',
            'deskripsi_kamar' => 'required',
            'foto_kamar' => 'required',
            'harga_kamar' => 'required'
        ], $messages);

        $foto_kamar = $request->file('foto_kamar');
        $namafotokamar = 'kamar'.date('Ymdhis').'.'.$request->file('foto_kamar')->getClientOriginalExtension();
        $foto_kamar->move('file/kamar/',$namafotokamar);

        $data = new Kamar();
        $data->no_kamar = $request->no_kamar;
        $data->deskripsi_kamar = $request->deskripsi_kamar;
        $data->foto_kamar = $namafotokamar;
        $data->harga_kamar = $request->harga_kamar;
        $data->status_kamar = 'Tersedia';
        $data->save();

        return redirect()->route('kamar.index')->with('Sukses', 'Berhasil Tambah Kamar');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kamar $kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kamar $kamar)
    {
        $title = 'Edit Kamar';
        return view('kamar.edit', compact('kamar', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kamar $kamar)
    {
        $namafotokamar = $kamar->foto_kamar;
        $update = [
            'no_kamar' => $request->no_kamar,
            'deskripsi_kamar' => $request->deskripsi_kamar,
            'harga_kamar' => $request->harga_kamar,
            'foto_kamar' => $namafotokamar,
            'status_kamar' => $kamar->status_kamar,
        ];

        if($request->foto_kamar != ""){
            $request->foto_kamar->move(public_path('file/kamar/'), $namafotokamar);
        }
        $kamar->update($update);
        return redirect()->route('kamar.index')->with('Sukses', 'Berhasil Edit Foto Kamar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kamar = Kamar::find($id);
        $namagambar = $kamar->foto_kamar;
        $file_kamar = public_path('file/kamar/').$namagambar;
        if(file_exists($file_kamar)){
            @unlink($file_kamar);
        }
        $kamar->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus kamar');
    }
}
