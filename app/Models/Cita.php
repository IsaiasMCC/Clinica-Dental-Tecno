<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;
    protected $table = 'citas';
    protected $fillable = [
        'fecha',
        'hora',
        'estado',
        'motivo',
        'diagnostico',
        'paciente',
        'odontologo',
    ];

    public function user_paciente()
    {
        return $this->belongsTo(User::class,'paciente');
    }
    public function user_odontologo()
    {
        return $this->belongsTo(User::class,'odontologo');
    }
    public function historiales()
    {
        return $this->hasMany(Historiale::class);
    }
}
