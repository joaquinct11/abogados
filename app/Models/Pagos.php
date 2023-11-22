<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    use HasFactory;
    protected $table = 'pagos';
    protected $primaryKey = 'id_pagos';
    public function expediente()
    {
        return $this->belongsTo(Expediente::class, 'id_expediente');
    }
}
