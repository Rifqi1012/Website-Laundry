<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataInventaris extends Model
{
    protected $table = 'data_inventaris'; // Sesuaikan dengan nama tabel di database
    protected $fillable = ['nama_barang', 'harga_barang', 'jumlah_barang', 'tanggal', 'total']; // Kolom yang dapat diisi

    public $timestamps = true; // Atur apakah Anda ingin menggunakan kolom timestamps atau tidak
}
