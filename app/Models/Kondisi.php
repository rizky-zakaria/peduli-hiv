<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kondisi extends Model
{
    use HasFactory;

    protected $fillable = ['pasien_id', 'cd4', 'periode', 'ims'];

    public function pasien()
    {
        return $this->belongsTo(User::class);
    }
}
