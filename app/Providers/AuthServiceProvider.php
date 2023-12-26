<?php

namespace App\Providers;

 use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('Admin', function ($user) {
            return $user->isAdmin(); // Asegúrate de tener el método isAdmin() definido en tu modelo de usuario
        });

        Gate::define('Secretaria', function ($user) {
            return $user->isSecretaria(); // Asegúrate de tener el método isPropiedades() definido en tu modelo de usuario
        });

        Gate::define('Secretaria2', function ($user) {
            return $user->isSecretaria2(); // Asegúrate de tener el método isPropiedades() definido en tu modelo de usuario
        });

        Gate::define('Propiedades', function ($user) {
            return $user->isPropiedades(); // Asegúrate de tener el método isPropiedades() definido en tu modelo de usuario
        });

        Gate::define('Judiciales', function ($user) {
            return $user->isJudiciales(); // Asegúrate de tener el método isPropiedades() definido en tu modelo de usuario
        });

        Gate::define('Juridicas', function ($user) {
            return $user->isJuridicas(); // Asegúrate de tener el método isPropiedades() definido en tu modelo de usuario
        });
    }
}
