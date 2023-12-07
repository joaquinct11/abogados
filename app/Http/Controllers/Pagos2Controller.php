<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pagos2;
use App\Models\Juridicas_Naturales;

class Pagos2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pagos2 =Pagos2::all();
        return view('pago2.index')->with('pagos2',$pagos2);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $codigosExpedientes = Juridicas_Naturales::pluck('numero_expediente', 'id');
        return view('pago2.create', compact('codigosExpedientes'));
  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $numero_expediente = $request->get('numero_expediente');
        $monto_total = $request->get('monto_total');
        $fecha_monto_total = $request->get('fecha_monto_total');

        $pagos2 = new Pagos2();
        $pagos2->numero_expediente = $numero_expediente; // Usar el nuevo campo
        $pagos2->monto_total = $monto_total;
        $pagos2->fecha_monto_total = $fecha_monto_total;
        $pagos2->save();
        return redirect('/pagos2');

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
        $pago2=Pagos2::find($id);
        return view('pago2.edit')->with('pago2',$pago2);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $numero_expediente = $request->get('numero_expediente');
        $monto_total = $request->get('monto_total');
        $fecha_monto_total = $request->get('fecha_monto_total');

        $pago2 = Pagos2::find($id);
        $pago2->numero_expediente = $request->get('numero_expediente');
        $pago2->monto_total = $request->get('monto_total');
        $pago2->fecha_monto_total = $request->get('fecha_monto_total');
        $pago2->save();
        return redirect('/pagos2');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pago2=Pagos2::find($id);
        $pago2->detallesPagos2()->delete();
        $pago2->delete();
        return redirect('/pagos2');
    }
}
