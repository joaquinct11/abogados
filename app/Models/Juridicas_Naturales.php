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
    public function pagos()
    {
        return $this->hasMany(Pago::class, 'numero_expediente', 'numero_expediente');
    }
}
