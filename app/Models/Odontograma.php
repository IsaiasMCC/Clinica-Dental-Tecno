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
        'tratamiento_id',
    ];
    public function dientes()
    {
        return $this->hasMany(Diente::class);
    }
}
