<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    public function index()
    {
        $clientes=Cliente::all();
        return view('cliente.index')->with('clientes',$clientes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente.create');
    }


    public function store(Request $request)
    {
        $nombres = $request->get('nombres');
        $ap_paterno = $request->get('ap_paterno');
        $ap_materno = $request->get('ap_materno');
        $domicilio = $request->get('domicilio');
        $telefono = $request->get('telefono');
        $email = $request->get('email');
        $id_identidad = $request->get('id_identidad');
        $identidad = $request->get('identidad');
        if (empty($nombres) || empty($ap_paterno) || empty($ap_materno) || empty($domicilio) || empty($telefono)
        || empty($email) || empty($identidad)) {
            $error_message = 'Por favor, completa todos los campos';
            return redirect('/clientes/create')->with('error', $error_message);
        }else{
            $clientes = new Cliente();
            $clientes->nombres = $nombres;
            $clientes->ap_paterno = $ap_paterno;
            $clientes->ap_materno = $ap_materno;
            $clientes->domicilio = $domicilio;
            $clientes->telefono = $telefono;
            $clientes->email = $email;
            $clientes->id_identidad = $id_identidad;
            $clientes->identidad = $identidad;
            $clientes->save();
            return redirect('/clientes');
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
    public function edit(string $id_cliente)
    {
        $cliente=Cliente::find($id_cliente);
        return view('cliente.edit')->with('cliente',$cliente);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_cliente)
    {
        $nombres = $request->get('nombres');
        $ap_paterno = $request->get('ap_paterno');
        $ap_materno = $request->get('ap_materno');
        $domicilio = $request->get('domicilio');
        $telefono = $request->get('telefono');
        $email = $request->get('email');
        $id_identidad = $request->get('id_identidad');
        $identidad = $request->get('identidad');
        if (empty($nombres) || empty($ap_paterno) || empty($ap_materno) || empty($domicilio) || empty($telefono)
        || empty($email) || empty($identidad)) {
            $error_message = 'Por favor, completa todos los campos';
            return redirect("/clientes/{$id}/edit")->with('error', $error_message);
        }else{
            $cliente = Cliente::find($id_cliente);
            $cliente->nombres = $request->get('nombres');
            $cliente->ap_paterno = $request->get('ap_paterno');
            $cliente->ap_materno = $request->get('ap_materno');
            $cliente->domicilio = $request->get('domicilio');
            $cliente->telefono = $request->get('telefono');
            $cliente->email = $request->get('email');
            $cliente->id_identidad = $request->get('id_identidad');
            $cliente->identidad = $request->get('identidad');
            $cliente->save();
            return redirect('/clientes');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente=Cliente::find($id);
        $cliente->delete();
        return redirect('/clientes');
    }
}
