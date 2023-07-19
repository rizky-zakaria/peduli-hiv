<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class KabGorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Kab. Gorontalo',
            'email' => 'kab.gorontalo@gmail.com',
            'password' => Hash::make('gorontalo123'),
            'role' => 'kabgor',
            'alamat' => "-",
            'jenis' => '-'
        ]);
    }
}
