<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historiale extends Model
{
    use HasFactory;
    protected $table = 'historiales';
    protected $fillable = [
        'observaciones',
        'cita_id',
    ];
}
