<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubActo2 extends Model
{
    use HasFactory;
    protected $table = 'sub_actos2';

    protected $fillable = ['subacto', 'ubicacion', 'intervinientes', 'created_at', 'fecha_fin'];

    public function pago2()
    {
        return $this->belongsTo(Juridicas_Naturales::class, 'numero_expediente', 'id');
    }

    public function juridicas_naturales()
    {
        return $this->belongsTo(Juridicas_Naturales::class, 'expediente_id');
    }
}
