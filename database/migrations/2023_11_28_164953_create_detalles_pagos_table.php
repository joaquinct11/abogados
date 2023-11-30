





<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesPagosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalles_pagos', function (Blueprint $table) {
            $table->id('id');
            // En tu migración para la tabla 'detalles_pagos'
            $table->unsignedBigInteger('pago_id'); // Cambiado de 'pagos_id_pagos' a 'pago_id'
            $table->foreign('pago_id')->references('id_pagos')->on('pagos');
            $table->float('adelanto')->nullable();
            $table->float('restante')->nullable();
            $table->date('fecha_adelanto')->nullable();
            $table->string('detalle_adelanto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_pagos');
    }
}
