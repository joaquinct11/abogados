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
        return $this->belongsTo(User::class, 'id');
    }


    protected $primaryKey = 'id_expediente'; // Utiliza id_expediente como clave primaria
    public $incrementing = false;
}
