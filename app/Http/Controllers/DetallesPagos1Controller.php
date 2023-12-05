<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Detalle_Pagos1;
use App\Models\Pagos1;

class DetallesPagos1Controller extends Controller
{
    
    public function agregarDetallePago1(Request $request, Pagos1 $pago)
    {
        // Valida los datos del formulario
        $request->validate([
            'adelanto' => 'required|numeric',
            'fecha_adelanto' => 'required|date',
            'detalle_adelanto' => 'required|string',
        ]);
    
        // Agrega el nuevo detalle al pago
        $detalle = $pago->detallesPagos1()->create([
            'adelanto' => $request->input('adelanto'),
            'fecha_adelanto' => $request->input('fecha_adelanto'),
            'detalle_adelanto' => $request->input('detalle_adelanto'),
        ]);
    
        // Depuración: 
        //dd($detalle);
    
        return redirect()->back()->with('success', 'Detalle agregado exitosamente');
    }
    
    public function eliminar($detalleId)
    {
        try {
            // Buscar el detalle de pago por ID
            $detallePago = Detalle_Pagos1::findOrFail($detalleId);
    
            // Eliminar el detalle de pago
            $detallePago->delete();
    
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
