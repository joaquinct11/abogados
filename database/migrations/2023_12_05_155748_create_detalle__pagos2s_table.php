<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalles_pagos2', function (Blueprint $table) {
            $table->id('id');
            // En tu migración para la tabla 'detalles_pagos'
            $table->unsignedBigInteger('pago_id');
            $table->foreign('pago_id')->references('id_pagos2')->on('pagos2');
            $table->float('adelanto')->nullable();
            $table->float('restante')->nullable();
            $table->date('fecha_adelanto')->nullable();
            $table->string('detalle_adelanto')->nullable();
            $table->timestamps(); // Utiliza timestamps() en lugar de timestamp()
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_pagos2');
    }
};
