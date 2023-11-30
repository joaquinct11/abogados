<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Pagos extends Model
{
    use HasFactory;

    // En el modelo DetallePago
    protected $table = 'detalles_pagos';

    protected $fillable = ['adelanto', 'fecha_adelanto', 'detalle_adelanto'];

    // En tu modelo Pago
    public function pago()
    {
        return $this->belongsTo(Pagos::class, 'pago_id', 'id_pagos');
    }
}
