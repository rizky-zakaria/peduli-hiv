<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class KabGorutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Kab. Gorut',
            'email' => 'kab.gorut@gmail.com',
            'password' => Hash::make('gorut123'),
            'role' => 'kabgorut',
            'alamat' => "-",
            'jenis' => '-'
        ]);
    }
}
