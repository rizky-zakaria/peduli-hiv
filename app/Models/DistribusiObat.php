<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistribusiObat extends Model
{
    use HasFactory;
    protected $fillable = ['pasien_id', 'faskes_id', 'obat_id', 'jumlah', 'dosis', 'jam', 'menit'];
}
