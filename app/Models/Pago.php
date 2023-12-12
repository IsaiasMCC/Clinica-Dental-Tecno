<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pago extends Model
{
    use HasFactory;
    protected $table = 'pagos';
    protected $fillable = [
        'monto',
        'fecha',
        'nombre',
        'metodo_pago_id',
        'tratamiento_id',
    ];
    public function metodo_pago(): BelongsTo
    {
        return $this->belongsTo(MetodoPago::class);
    }
}
