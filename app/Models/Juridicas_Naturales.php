<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juridicas_Naturales extends Model
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

    protected $table = 'juridicas__naturales';

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'numero_expediente', 'numero_expediente');
    }
    public function detallesPagos2()
    {
        return $this->hasMany(SubActo2::class, 'expediente_id');
    }
}
