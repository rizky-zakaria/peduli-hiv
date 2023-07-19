<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class KotaGorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Kota Gorontalo',
            'email' => 'kota.gorontalo@gmail.com',
            'password' => Hash::make('gorontalo123'),
            'role' => 'kotagor',
            'alamat' => "-",
            'jenis' => '-'
        ]);
    }
}
