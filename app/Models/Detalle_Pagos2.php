<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Pagos2 extends Model
{
    use HasFactory;
    protected $table = 'detalles_pagos2';

    protected $fillable = ['adelanto', 'fecha_adelanto', 'detalle_adelanto'];

    // En tu modelo Pago
    public function pago2()
    {
        return $this->belongsTo(Pagos2::class, 'pago_id', 'id_pagos2');
    }
}
