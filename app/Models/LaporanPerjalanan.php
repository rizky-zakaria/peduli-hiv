<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPerjalanan extends Model
{
    use HasFactory;

    protected $fillable = ['pasien_id', 'tgl_kunjungan', 'tgl_pulang', 'tujuan', 'keterangan'];
}
