<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expediente;
use App\Models\SubActo;

class SubActosController extends Controller
{

    public function agregarDetallePago(Request $request, Expediente $propiedad)
    {
        // Valida los datos del formulario
        $request->validate([
            'numero_expediente' => 'required|string',
            'subacto' => 'required|string',
            'ubicacion' => 'required|string',
            'intervinientes' => 'required|string',
            'created_at' => 'required|date',
            'fecha_fin' => 'required|date',
        ]);
    
        // Agrega el nuevo detalle al pago
        $detalle = $propiedad->detallesPagos()->create([
            'numero_expediente' => 'PR-' . $request->input('numero_expediente'), // Asegúrate de ajustar esto
            'subacto' => $request->input('subacto'),
            'ubicacion' => $request->input('ubicacion'),
            'intervinientes' => $request->input('intervinientes'),
            'created_at' => $request->input('created_at'),
            'fecha_fin' => $request->input('fecha_fin'),
        ]);
    
        return redirect()->back()->with('success', 'Detalle agregado exitosamente');
    }

    public function eliminar($detalleId)
{
    try {
        // Buscar el detalle de pago por ID
        $detallePago = SubActo::findOrFail($detalleId);

        // Eliminar el detalle de pago
        $detallePago->delete();

        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()]);
    }
}

    
    
    public function index()
    {
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
