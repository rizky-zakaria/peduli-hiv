<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosis extends Model
{
    use HasFactory;

    protected $fillable = ['pasien_id', 'obat_id', 'dosis'];
}
