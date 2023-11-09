<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios=User::all();
        return view('usuario.index')->with('usuarios',$usuarios);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $ap_paterno = $request->get('ap_paterno');
        $ap_materno = $request->get('ap_materno');
        $domicilio = $request->get('domicilio');
        $telefono = $request->get('telefono');
        $email = $request->get('email');
        $id_rol = $request->get('id_rol');
        $id_identidad = $request->get('id_identidad');
        $identidad = $request->get('identidad');
        $password = $request->get('password');
        $password1 = $request->get('password1');
        if (empty($name) || empty($ap_paterno) || empty($ap_materno) || empty($domicilio) || empty($telefono)
        || empty($email) || empty($identidad) || empty($password) || empty($password1)) {
            $error_message = 'Por favor, completa todos los campos';
            return redirect('/usuarios/create')->with('error', $error_message);
        }

        if ($password !== $password1) {
            $error_message = 'Las contraseñas no coinciden';
            return redirect('/usuarios/create')->with('error', $error_message);
        }else{
            $usuarios = new User();
            $usuarios->name = $name;
            $usuarios->ap_paterno = $ap_paterno;
            $usuarios->ap_materno = $ap_materno;
            $usuarios->domicilio = $domicilio;
            $usuarios->telefono = $telefono;
            $usuarios->email = $email;
            $usuarios->id_rol = $id_rol;
            $usuarios->id_identidad = $id_identidad;
            $usuarios->identidad = $identidad;
            $usuarios->password = bcrypt($password);
            $usuarios->save();
            return redirect('/usuarios');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario=User::find($id);
        $usuario->delete();
        return redirect('/usuarios');
    }
}
