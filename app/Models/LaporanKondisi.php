<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKondisi extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'berat', 'efek', 'keluhan'];
}
