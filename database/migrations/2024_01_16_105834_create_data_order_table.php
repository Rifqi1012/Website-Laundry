<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataOrderTable extends Migration
{
    public function up()
    {
        Schema::create('data_order', function (Blueprint $table) {
            $table->id(); // Menambahkan kolom id yang auto-increment
            $table->string('no_order')->unique(); // Mengubah no_order menjadi unique saja
            $table->string('kode_paket');
            $table->string('nama_pelanggan');
            $table->integer('berat_per_kg');
            $table->integer('total');
            $table->date('tanggal_ambil');
            $table->date('Diambil')->nullable();
            $table->enum('status', ['OnProcess', 'Ready', 'Completed']);
            $table->timestamps();

            $table->foreign('kode_paket')->references('kode_paket')->on('data_paket');

        });
    }

    public function down()
    {
        Schema::dropIfExists('data_order');
    }
}
