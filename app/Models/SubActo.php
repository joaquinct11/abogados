<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubActo extends Model
{
    use HasFactory;
// En el modelo DetallePago
    protected $table = 'sub_actos';

    protected $fillable = ['subacto', 'ubicacion', 'intervinientes', 'created_at', 'fecha_fin'];

    // En tu modelo Pago
    public function pago()
    {
        return $this->belongsTo(Expediente::class, 'numero_expediente', 'id');
    }

    public function expediente()
    {
        return $this->belongsTo(Expediente::class, 'expediente_id');
    }
    
}
