<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    protected $table = 'kamar';
    protected $primaryKey = 'id_kamar';
    protected $fillable = [
        'no_kamar',
        'deskripsi_kamar',
        'foto_kamar',
        'status_kamar',
        'harga_kamar',
    ];
}
