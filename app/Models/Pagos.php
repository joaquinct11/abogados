<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    use HasFactory;
    protected $table = 'pagos';
    protected $primaryKey = 'id_pagos';

    // En tu modelo Pago
public function detallesPagos()
{
    return $this->hasMany(Detalle_Pagos::class, 'pago_id');
}


public function expediente()
{
    return $this->belongsTo(Expediente::class, 'numero_expediente', 'numero_expediente');
}
}
