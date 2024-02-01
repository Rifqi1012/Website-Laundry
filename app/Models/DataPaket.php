<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPaket extends Model
{
    protected $table = 'data_paket';
    protected $fillable = ['kode_paket', 'nama_paket', 'harga_per_kg', 'waktu'];
    public $timestamps = true;
}
