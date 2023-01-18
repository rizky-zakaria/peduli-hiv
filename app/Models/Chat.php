<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = ['cluster_id', 'pengirim', 'pesan', 'waktu', 'tanggal', 'tipe'];

    public $timestamps = false;

    public function cluster()
    {
        return $this->belongsTo(Cluster::class);
    }
}
