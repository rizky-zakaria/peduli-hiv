<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPasien extends Model
{
    use HasFactory;

    protected $fillable = ['pasien_id', 'kehamilan', 'tb', 'bb', 'status'];

    public function pasien()
    {
        return $this->belongsTo(User::class);
    }
}
