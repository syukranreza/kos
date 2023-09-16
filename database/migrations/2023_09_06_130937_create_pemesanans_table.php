<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->increments('id_pemesanan');
            $table->integer('id_kamar');
            $table->integer('id_user');
            $table->integer('lama_pemesanan');
            $table->float('nominal_pemesanan');
            $table->float('jumlah_pembayaran_pemesanan')->nullable();
            $table->string('bukti_pembayaran_pemesanan')->nullable();
            $table->string('status_pembayaran_pemesanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
