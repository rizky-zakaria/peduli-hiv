<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id', 'nik', 'tahun_lapor', 'bulan_lapor', 'tgl_kunjungan', 'jenis', 'no_reg_nas', 'no_telp', 'tgl_lahir', 'jk', 'pekerjaan', 'pendidikan', 'hamil', 'ims', 'cd4', 'fungsional', 'domisili'
    ];

    public $timestamps = false;

    public function pasien()
    {
        return $this->belongsTo(User::class);
    }
}
