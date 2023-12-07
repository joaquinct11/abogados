<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pagos;
use App\Models\Expediente;

class PagosController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $pagos=Pagos::all();
        return view('pago.index')->with('pagos',$pagos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $codigosExpedientes = Expediente::pluck('numero_expediente', 'id');
        return view('pago.create', compact('codigosExpedientes'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $numero_expediente = $request->get('numero_expediente');
        $monto_total = $request->get('monto_total');
        $fecha_monto_total = $request->get('fecha_monto_total');

        $pagos = new Pagos();
        $pagos->numero_expediente = $numero_expediente; // Usar el nuevo campo
        $pagos->monto_total = $monto_total;
        $pagos->fecha_monto_total = $fecha_monto_total;
        $pagos->save();
        return redirect('/pagos');
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
        $pago=Pagos::find($id);
        return view('pago.edit')->with('pago',$pago);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $numero_expediente = $request->get('numero_expediente');
        $monto_total = $request->get('monto_total');
        $fecha_monto_total = $request->get('fecha_monto_total');

        $pago = Pagos::find($id);
        $pago->numero_expediente = $request->get('numero_expediente');
        $pago->monto_total = $request->get('monto_total');
        $pago->fecha_monto_total = $request->get('fecha_monto_total');
        $pago->save();
        return redirect('/pagos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pago=Pagos::find($id);
        $pago->detallesPagos()->delete();
        $pago->delete();
        return redirect('/pagos');
    }
}
