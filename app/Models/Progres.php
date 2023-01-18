<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progres extends Model
{
    use HasFactory;

    protected $fillable = ['pasien_id', 'fungsional', 'bb', 'cd4', 'perubahan_ims', 'terapi_ims'];

    public function pasien()
    {
        return $this->belongsTo(User::class);
    }
}
