<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Pagos1 extends Model
{
    use HasFactory;

    // En el modelo DetallePago
    protected $table = 'detalles_pagos1';

    protected $fillable = ['adelanto', 'fecha_adelanto', 'detalle_adelanto',
        'nro_comprobante'];

    // En tu modelo Pago
    public function pago1()
    {
        return $this->belongsTo(Pagos1::class, 'pago_id', 'id_pagos');
    }
}
