<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleReceta extends Model
{
    use HasFactory;
    protected $table = 'detalle_recetas';
    protected $fillable = [
        'medicamento',
        'indicaciones',
        'cantidad',
        'receta_id',
    ];
}
