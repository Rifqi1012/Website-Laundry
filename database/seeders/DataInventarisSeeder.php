<?php


use Illuminate\Database\Seeder;
use App\Models\DataInventaris;
use Carbon\Carbon;

class DataInventarisSeeder extends Seeder
{
    public function run()
    {
        // Data inventaris dummy
        $dataInventaris = [];

        for ($i = 1; $i <= 10; $i++) {
            $dataInventaris[] = [
                'nama_barang' => 'Barang ' . $i,
                'harga_barang' => rand(1000, 5000),
                'jumlah_barang' => rand(1, 50),
                'tanggal' => Carbon::now()->subDays($i)->format('Y-m-d'),
                'total' => rand(1, 50) * rand(1000, 5000),
            ];
        }

        // Simpan data inventaris ke dalam database
        foreach ($dataInventaris as $inventaris) {
            DataInventaris::create($inventaris);
        }
    }
}
