<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifDistribusi extends Model
{
    use HasFactory;
    protected $fillable = ['notif', 'user_id'];
}
