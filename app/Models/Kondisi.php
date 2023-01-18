<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kondisi extends Model
{
    use HasFactory;

    protected $fillable = ['pasien_id', 'tgl_konfirmasi', 'tgl_pra_art', 'tgl_art', 'who', 'cd4', 'tlc'];

    public function pasien()
    {
        return $this->belongsTo(User::class);
    }
}
