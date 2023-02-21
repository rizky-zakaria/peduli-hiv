<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FaskesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Rizky Zakaria',
            'email' => 'rizky.zakaria78@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'faskes',
            'alamat' => 'Jln. Kenangan No. 1, Kota Gorontalo'
        ]);
    }
}
