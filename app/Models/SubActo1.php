<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubActo1 extends Model
{
    use HasFactory;
    // En el modelo DetallePago
    protected $table = 'sub_actos1';

    protected $fillable = ['subacto', 'ubicacion', 'intervinientes', 'created_at', 'fecha_fin'];

    // En tu modelo Pago
    public function pago1()
    {
        return $this->belongsTo(Judiciales::class, 'numero_expediente', 'id');
    }

    public function judiciales()
    {
        return $this->belongsTo(Judiciales::class, 'expediente_id');
    }
}
