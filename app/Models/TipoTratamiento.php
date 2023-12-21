<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoTratamiento extends Model
{
    use HasFactory;
    protected $table = 'tipo_tratamientos';
    protected $fillable = [
        'nombre',
        'costo'
    ];

    public function tratamientos()
    {
        return $this->hasMany(Tratamiento::class);
    }
}
