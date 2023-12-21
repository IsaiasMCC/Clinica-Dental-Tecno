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
        'tipo_tratamiento_id'
    ];
    public function recetas()
    {
        return $this->hasMany(Receta::class);
    }
    public function tipo_tratamiento()
    {
        return $this->belongsTo(TipoTratamiento::class, 'tipo_tratamiento_id');
    }
    public function cita() {
        return $this->belongsTo(Cita::class, 'cita_id');
    }
}
