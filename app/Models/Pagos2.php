<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagos2 extends Model
{
    use HasFactory;
    protected $table = 'pagos2';
    protected $primaryKey = 'id_pagos2';

public function detallesPagos2()
{
    return $this->hasMany(Detalle_Pagos2::class, 'pago_id');
}
public function expediente()
{
    return $this->belongsTo(Expediente::class, 'numero_expediente', 'numero_expediente');

}
public function juridica_natural()
{
    return $this->belongsTo(Juridicas_Naturales::class, 'numero_expediente', 'numero_expediente');
}
}
