<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class KabBonbolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Kab. Bonebolango',
            'email' => 'kab.bonebolango@gmail.com',
            'password' => Hash::make('bonebolango123'),
            'role' => 'kabbonbol',
            'alamat' => "-",
            'jenis' => '-'
        ]);
    }
}
