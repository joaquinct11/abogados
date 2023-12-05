<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Juridicas_Naturales;
use App\Models\User; // Asegúrate de importar el modelo User al inicio del archivo

class Juridicas_NaturalesController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function index()
    {
        $juridicas_naturales=Juridicas_Naturales::all();
        return view('juridica_natural.index')->with('juridicas_naturales',$juridicas_naturales);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = User::all(); // Obtén todos los usuarios de la base de datos
        return view('juridica_natural.create', ['usuarios' => $usuarios]);
    }


    private function generarNumeroUnico()
    {
        // Obtener el último número único de la base de datos
        $ultimoExpediente = Juridicas_Naturales::latest('id')->first();

        // Verificar si existen expedientes en la base de datos
        if ($ultimoExpediente) {
            // Obtener el número actual y sumar 1
            $nuevoNumero = $ultimoExpediente->id + 1;
        } else {
            // Si no hay expedientes, comenzar desde 1
            $nuevoNumero = 1;
        }

        // Formatear el resultado según tus preferencias (por ejemplo, "PR-" seguido del número)
        $codigoGenerado = "JN-" . $nuevoNumero;

        return $codigoGenerado;
    }

    public function store(Request $request)
    {
        // Validar y procesar los datos del formulario
        // Generar el número único utilizando la función
        //$codigoExpediente = $this->generarNumeroUnico();
        $codigoExpediente = $this->generarNumeroUnico();
        $id_usuario = $request->get('id_usuario');
        $id_area = $request->get('id_area');
        $otros = strtoupper($request->get('otros'));
        $cliente = strtoupper($request->get('cliente'));
        $acto = $request->get('acto');
        $fecha_ingreso = $request->get('fecha_ingreso');
        $fecha_fin = $request->get('fecha_fin');
        if (empty($cliente)) {
            $error_message = 'Por favor, completa todos los campos';
            return redirect('/juridicas_naturales/create')->with('error', $error_message);
        }
        else{
            $expediente = new Juridicas_Naturales();
            $expediente->numero_expediente = $codigoExpediente; // Usar el nuevo campo
            $expediente->id_usuario = $id_usuario;
            $expediente->id_area = 3; // Puedes ajustar esto según tus necesidades
            $expediente->otros = $otros ?: '-';
            $expediente->cliente = $cliente;
            $expediente->acto = $acto;
            $expediente->fecha_ingreso = $fecha_ingreso;
            $expediente->fecha_fin = $fecha_fin;
            $expediente->save();
            return redirect('/juridicas_naturales');
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
        $juridica_natural=Juridicas_Naturales::find($id_expediente);
        $usuarios = User::all(); // Obtén todos los usuarios de la base de datos
        return view('juridica_natural.edit',['usuarios' => $usuarios])->with('juridica_natural',$juridica_natural);
   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_expediente)
    {
        $id_usuario = $request->get('id_usuario');
        $id_area = $request->get('id_area');
        $otros = strtoupper($request->get('otros'));
        $cliente = strtoupper($request->get('cliente'));
        $acto = $request->get('acto');
        $fecha_ingreso = $request->get('fecha_ingreso');
        $fecha_fin = $request->get('fecha_fin');
        if (empty($cliente)) {
            $error_message = 'Por favor, completa todos los campos';
            return redirect('/juridicas_naturales/create')->with('error', $error_message);
        }else if (empty($otros)){
            $expediente = Juridicas_Naturales::find($id_expediente);
            $expediente->id_usuario = $request->get('id_usuario');
            $expediente->id_area = $request->input('id_area', 3);
            $expediente->otros = $request->get('-');
            $expediente->cliente = $request->get('cliente');
            $expediente->acto = $request->get('acto');
            $expediente->fecha_ingreso = $request->get('fecha_ingreso');
            $expediente->fecha_fin = $request->get('fecha_fin');
            $expediente->save();
            return redirect('/juridicas_naturales');
        }
        else{
            $expediente = Juridicas_Naturales::find($id_expediente);
            $expediente->id_usuario = $request->get('id_usuario');
            $expediente->id_area = $request->input('id_area', 3);
            $expediente->otros = $request->get('otros');
            $expediente->cliente = $request->get('cliente');
            $expediente->acto = $request->get('acto');
            $expediente->fecha_ingreso = $request->get('fecha_ingreso');
            $expediente->fecha_fin = $request->get('fecha_fin');
            $expediente->save();
            return redirect('/juridicas_naturales');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_expediente)
    {
        $expediente=Juridicas_Naturales::find($id_expediente);
        $expediente->delete();
        return redirect('/juridicas_naturales');
    }
}
