<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function adminlte_desc(){
        return 'Admin';
    }
    
    public function isAdmin()
{
    return $this->tipo === 'Admin'; // Asegúrate de ajustar esto según tu lógica de determinación de roles
}

public function isSecretaria()
{
    return $this->tipo === 'Secretaria'; // Asegúrate de ajustar esto según tu lógica de determinación de roles
}

public function isPropiedades()
{
    return $this->tipo === 'Propiedades'; // Asegúrate de ajustar esto según tu lógica de determinación de roles
}

public function isJudiciales()
{
    return $this->tipo === 'Judiciales'; // Asegúrate de ajustar esto según tu lógica de determinación de roles
}

public function isJuridicas()
{
    return $this->tipo === 'Juridicas'; // Asegúrate de ajustar esto según tu lógica de determinación de roles
}
}
