<?php

namespace Database\Seeders;

use App\Models\Biodata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiodataPasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Biodata::create([
            'pasien_id' => 3,
            'nik' => '75710315555551',
            'tahun_lapor' => date('Y'),
            'bulan_lapor' => date('M'),
            'tgl_kunjungan' => date('d-m-Y'),
            'jenis' => 'hiv',
            'no_reg_nas' => "NO1902RI",
            'no_telp' => '082134567890',
            'tgl_lahir' => '2003-01-13',
            'jk' => 'pria',
            'pekerjaan' => 'Dosen',
            'pendidikan' => 'S2',
            'hamil' => 'TIDAK',
            'fungsional' => 'Kerja',
            'domisili' => 'Kab. Gorontalo'
        ]);
    }
}
