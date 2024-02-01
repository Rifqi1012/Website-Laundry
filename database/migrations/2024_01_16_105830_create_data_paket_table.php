<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPaketTable extends Migration
{
    public function up()
    {
        Schema::create('data_paket', function (Blueprint $table) {
            $table->id(); // Menambahkan kolom id yang auto-increment
            $table->string('kode_paket')->unique(); // Mengubah kode_paket menjadi unique saja
            $table->string('nama_paket')->unique();
            $table->integer('harga_per_kg');
            $table->integer('waktu');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_paket');
    }
}
