<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;
    protected $table = 'recetas';
    protected $fillable = [
        'fecha',
        'tratamiento_id',
    ];

    public function detalle_recetas()
    {
        return $this->hasMany(DetalleReceta::class);
    }
}
