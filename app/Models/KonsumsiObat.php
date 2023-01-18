<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonsumsiObat extends Model
{
    use HasFactory;

    protected $fillable = ['pasien_id', 'konsumsi', 'terlewati', 'periode'];
}
