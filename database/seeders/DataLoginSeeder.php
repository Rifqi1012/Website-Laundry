<?php

use Illuminate\Database\Seeder;
use App\Models\DataLogin;
use Illuminate\Support\Facades\Hash;

class DataLoginSeeder extends Seeder
{
    public function run()
    {
        // Data login yang ingin Anda tambahkan
        $dataLogin = [
            [
                'username' => 'Wawan',
                'password' => Hash::make('Wawan123'),
            ],
            [
                'username' => 'Reno',
                'password' => Hash::make('Reno123'),
            ],
        ];

        // Simpan data login ke dalam database
        foreach ($dataLogin as $login) {
            DataLogin::create($login);
        }
    }
}

