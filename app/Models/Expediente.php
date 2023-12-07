<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;
    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    protected $fillable = [
        'numero_expediente',
        'id_usuario',
        'id_area',
        'cliente',
        'nro_expediente',
        'fecha_ingreso',
        'fecha_fin',
        'acto',
        'otros',
    ];


    protected $table = 'expedientes';

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'numero_expediente', 'numero_expediente');
    }

    public function detallesPagos()
{
    return $this->hasMany(SubActo::class, 'expediente_id');
}
}
