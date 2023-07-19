<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class KabBolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Kab. Boalemo',
            'email' => 'kab.boalemo@gmail.com',
            'password' => Hash::make('boalemo123'),
            'role' => 'kabbol',
            'alamat' => "-",
            'jenis' => '-'
        ]);
    }
}
