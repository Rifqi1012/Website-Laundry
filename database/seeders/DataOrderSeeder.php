<?php

use Illuminate\Database\Seeder;
use App\Models\DataOrder;
use App\Models\DataPaket;
use Carbon\Carbon;

class DataOrderSeeder extends Seeder
{
    public function run()
    {
        // Data order dummy
        $dataOrder = [];

        for ($i = 1; $i <= 10; $i++) {
            $kodePaket = 'P' . $i;
            $paket = DataPaket::where('kode_paket', $kodePaket)->first();

            $dataOrder[] = [
                'no_order' => Carbon::now()->format('dmY') . ($i + 1),
                'kode_paket' => $kodePaket,
                'nama_pelanggan' => 'Pelanggan ' . $i,
                'berat_per_kg' => rand(1, 10),
                'tanggal_ambil' => Carbon::now()->addDays($paket->waktu)->format('Y-m-d'),
                'status' => 'OnProcess',
                'total' => rand(1, 10) * $paket->harga_per_kg,
            ];
        }

        // Simpan data order ke dalam database
        foreach ($dataOrder as $order) {
            DataOrder::create($order);
        }
    }
}
