<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    protected $fillable = [
        'id_kamar',
        'id_user',
        'lama_pemesanan',
        'nominal_pemesanan',
        'jumlah_pembayaran_pemesanan',
        'bukti_pembayaran_pemesanan',
        'status_pembayaran_pemesanan',
    ];
}
