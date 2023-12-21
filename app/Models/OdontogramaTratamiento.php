<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OdontogramaTratamiento extends Model
{
    use HasFactory;
    protected $table = 'odontograma_tratamientos';
    protected $fillable = [
        'descripcion',
        'nombre',
        'estado',
    ];
}
