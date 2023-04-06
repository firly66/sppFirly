<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->integer('id_pembayaran')->primary();
            $table->integer('id_petugas');
            $table->string('nisn',10);
            $table->date('tgl_bayar');
            $table->string('bulan_dibayar',8);
            $table->string('tahun_dibayar',4);
            $table->integer('id_spp');
            $table->integer('jumlah_dibayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
};
