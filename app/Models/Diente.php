<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diente extends Model
{
    use HasFactory;
    protected $table = 'dientes';
    protected $fillable = [
        'numero_diente',
        'cuadrante',
        'nombre_cuadrante',
        'estado',
        'odontograma_id',
    ];
}
