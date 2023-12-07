<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pagos1;
use App\Models\Judiciales;

class Pagos1Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $pagos1=Pagos1::all();
        return view('pago1.index')->with('pagos1',$pagos1);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $codigosJudiciales = Judiciales::pluck('numero_expediente', 'id');
        return view('pago1.create', compact('codigosJudiciales'));
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $numero_expediente = $request->get('numero_expediente');
        $monto_total = $request->get('monto_total');
        $fecha_monto_total = $request->get('fecha_monto_total');

        $pagos1 = new Pagos1();
        $pagos1->numero_expediente = $numero_expediente; // Usar el nuevo campo
        $pagos1->monto_total = $monto_total;
        $pagos1->fecha_monto_total = $fecha_monto_total;
        $pagos1->save();
        return redirect('/pagos1');
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
        $pago1=Pagos1::find($id);
        return view('pago1.edit')->with('pago1',$pago1);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $numero_expediente = $request->get('numero_expediente');
        $monto_total = $request->get('monto_total');
        $fecha_monto_total = $request->get('fecha_monto_total');

        $pago1 = Pagos1::find($id);
        $pago1->numero_expediente = $request->get('numero_expediente');
        $pago1->monto_total = $request->get('monto_total');
        $pago1->fecha_monto_total = $request->get('fecha_monto_total');
        $pago1->save();
        return redirect('/pagos1');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pago1=Pagos1::find($id);
        $pago1->detallesPagos1()->delete();
        $pago1->delete();
        return redirect('/pagos1');
    }
}
