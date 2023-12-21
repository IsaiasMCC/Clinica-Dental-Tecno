<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odontograma extends Model
{
    use HasFactory;
    protected $table = 'odontogramas';
    protected $fillable = [
        'fecha',
        'estado',
        'user_id',
        'descripcion_tratamiento',
    ];
    public function dientes()
    {
        return $this->hasMany(Diente::class);
    }
}
