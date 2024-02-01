<?php

use Illuminate\Database\Seeder;
use App\Models\DataPaket;

class DataPaketSeeder extends Seeder
{
    public function run()
    {
        // Data paket dummy
        $dataPaket = [
            [
                'kode_paket' => 'P1',
                'nama_paket' => 'Paket A',
                'harga_per_kg' => 5000,
                'waktu' => 1, // Dalam hari
            ],
            [
                'kode_paket' => 'P2',
                'nama_paket' => 'Paket B',
                'harga_per_kg' => 7000,
                'waktu' => 2, // Dalam hari
            ],
            [
                'kode_paket' => 'P3',
                'nama_paket' => 'Paket C',
                'harga_per_kg' => 10000,
                'waktu' => 3, // Dalam hari
            ],
            [
                'kode_paket' => 'P4',
                'nama_paket' => 'Paket D',
                'harga_per_kg' => 12000,
                'waktu' => 4, // Dalam hari
            ],
            [
                'kode_paket' => 'P5',
                'nama_paket' => 'Paket E',
                'harga_per_kg' => 15000,
                'waktu' => 5, // Dalam hari
            ],
            [
                'kode_paket' => 'P6',
                'nama_paket' => 'Paket F',
                'harga_per_kg' => 18000,
                'waktu' => 6, // Dalam hari
            ],
            [
                'kode_paket' => 'P7',
                'nama_paket' => 'Paket G',
                'harga_per_kg' => 20000,
                'waktu' => 7, // Dalam hari
            ],
            [
                'kode_paket' => 'P8',
                'nama_paket' => 'Paket H',
                'harga_per_kg' => 22000,
                'waktu' => 8, // Dalam hari
            ],
            [
                'kode_paket' => 'P9',
                'nama_paket' => 'Paket I',
                'harga_per_kg' => 25000,
                'waktu' => 9, // Dalam hari
            ],
            [
                'kode_paket' => 'P10',
                'nama_paket' => 'Paket J',
                'harga_per_kg' => 28000,
                'waktu' => 10, // Dalam hari
            ],
        ];

        // Simpan data paket ke dalam database
        foreach ($dataPaket as $paket) {
            DataPaket::create($paket);
        }
    }
}
