<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meninggal extends Model
{
    use HasFactory;

    protected $fillable = ['tgl_meninggal', 'pasien_id', 'keterangan', 'tgl_kunjungan_akhir', 'tgl_rujuk_keluar'];
}
