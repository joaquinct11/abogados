<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expediente;

class PropiedadesController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function index()
    {
        $propiedades=Expediente::all();
        return view('propiedad.index')->with('propiedades',$propiedades);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('propiedad.create');
    }

    private function generarNumeroUnico()
    {
        // Obtener el último número único de la base de datos
        $ultimoExpediente = Expediente::latest('id_expediente')->first();

        // Verificar si existen expedientes en la base de datos
        if ($ultimoExpediente) {
            // Obtener el número actual y sumar 1
            $ultimoNumero = intval(str_replace("PR-", "", $ultimoExpediente->id_expediente));
            $nuevoNumero = $ultimoNumero + 1;
        } else {
            // Si no hay expedientes, comenzar desde 1
            $nuevoNumero = 1;
        }

        // Formatear el resultado según tus preferencias (por ejemplo, "PR-" seguido del número)
        $codigoGenerado = "PR-" . $nuevoNumero;

        return $codigoGenerado;
    }

    public function store(Request $request)
    {
        // Validar y procesar los datos del formulario
        // Generar el número único utilizando la función
        //$codigoExpediente = $this->generarNumeroUnico();

        $id = $request->get('id');
        $id_area = $request->get('id_area');
        $otros = strtoupper($request->get('otros'));
        $cliente = strtoupper($request->get('cliente'));
        $acto = $request->get('acto');
        $fecha_ingreso = $request->get('fecha_ingreso');
        $fecha_fin = $request->get('fecha_fin');
        if (empty($cliente)) {
            $error_message = 'Por favor, completa todos los campos';
            return redirect('/propiedades/create')->with('error', $error_message);
        }else if (empty($otros)){
            $expedientes = new Expediente();
            $expedientes->id_expediente = $this->generarNumeroUnico();
            $expedientes->id = $id;
            $expedientes->id_area = 1;
            $expedientes->otros = '-';
            $expedientes->cliente = $cliente;
            $expedientes->acto = $acto;
            $expedientes->fecha_ingreso = $fecha_ingreso;
            $expedientes->fecha_fin = $fecha_fin;
            $expedientes->save();
            return redirect('/propiedades');
        }
        else{
            $expedientes = new Expediente();
            $expedientes->id_expediente = $this->generarNumeroUnico();
            $expedientes->id = $id;
            $expedientes->id_area = 1;
            $expedientes->otros = $otros;
            $expedientes->cliente = $cliente;
            $expedientes->acto = $acto;
            $expedientes->fecha_ingreso = $fecha_ingreso;
            $expedientes->fecha_fin = $fecha_fin;
            $expedientes->save();
            return redirect('/propiedades');
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
    public function edit(string $id_expediente)
    {
        $propiedad=Expediente::find($id_expediente);
        return view('propiedad.edit')->with('propiedad',$propiedad);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_expediente)
    {
        $id = $request->get('id');
        $id_area = $request->get('id_area');
        $otros = strtoupper($request->get('otros'));
        $cliente = strtoupper($request->get('cliente'));
        $acto = $request->get('acto');
        $fecha_ingreso = $request->get('fecha_ingreso');
        $fecha_fin = $request->get('fecha_fin');
        if (empty($cliente)) {
            $error_message = 'Por favor, completa todos los campos';
            return redirect('/propiedades/create')->with('error', $error_message);
        }else if (empty($otros)){
            $expediente = Expediente::find($id_expediente);
            $expediente->id = $request->get('id');
            $expediente->id_area = $request->input('id_area', 1);
            $expediente->otros = $request->get('-');
            $expediente->cliente = $request->get('cliente');
            $expediente->acto = $request->get('acto');
            $expediente->fecha_ingreso = $request->get('fecha_ingreso');
            $expediente->fecha_fin = $request->get('fecha_fin');
            $expediente->save();
            return redirect('/propiedades');
        }
        else{
            $expediente = Expediente::find($id_expediente);
            $expediente->id = $request->get('id');
            $expediente->id_area = $request->input('id_area', 1);
            $expediente->otros = $request->get('otros');
            $expediente->cliente = $request->get('cliente');
            $expediente->acto = $request->get('acto');
            $expediente->fecha_ingreso = $request->get('fecha_ingreso');
            $expediente->fecha_fin = $request->get('fecha_fin');
            $expediente->save();
            return redirect('/propiedades');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_expediente)
    {
        $expediente=Expediente::find($id_expediente);
        $expediente->delete();
        return redirect('/propiedades');
    }
}