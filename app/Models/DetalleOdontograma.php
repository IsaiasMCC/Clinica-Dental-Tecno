<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleOdontograma extends Model
{
    use HasFactory;
    protected $table = 'detalle_odontogramas';
    protected $fillable = [
        'odontograma_tratamiento_id',
        'diente_id',
        'odontograma_id',
    ];
}
