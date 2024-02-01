<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataOrder extends Model
{
    public function dataPaket()
    {
        return $this->belongsTo(DataPaket::class, 'kode_paket', 'kode_paket');
    }
    protected $table = 'data_order'; // Sesuaikan dengan nama tabel di database
    protected $fillable = ['no_order', 'kode_paket', 'nama_pelanggan', 'berat_per_kg', 'tanggal_ambil', 'status', 'total']; // Kolom yang dapat diisi
    public $timestamps = true; // Atur apakah Anda ingin menggunakan kolom timestamps atau tidak
}
