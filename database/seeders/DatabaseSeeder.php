<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UserSeeder::class);
        $this->call(FaskesSeeder::class);
        $this->call(PasienSeeder::class);
        $this->call(BiodataPasienSeeder::class);
        $this->call(ClusterSeeder::class);
        $this->call(KabBolSeeder::class);
        $this->call(KabBonbolSeeder::class);
        $this->call(KabGorSeeder::class);
        $this->call(KabGorutSeeder::class);
        $this->call(KabPohSeeder::class);
        $this->call(KotaGorSeeder::class);
    }
}
