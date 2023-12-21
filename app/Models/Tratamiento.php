<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;
    protected $table = 'tratamientos';
    protected $fillable = [
        'descripcion',
        'cita_id',
        'estado',
    ];
    public function recetas()
    {
        return $this->hasMany(Receta::class);
    }
}
