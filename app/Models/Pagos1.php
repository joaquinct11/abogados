<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagos1 extends Model
{
    use HasFactory;
    protected $table = 'pagos1';
    protected $primaryKey = 'id_pagos';

    // En tu modelo Pago
public function detallesPagos1()
{
    return $this->hasMany(Detalle_Pagos1::class, 'pago_id');
}


public function judicial()
{
    return $this->belongsTo(Judiciales::class, 'numero_expediente', 'numero_expediente');
}

}
