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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('id_pagos');
            $table->string('id_expediente');
            $table->foreign('id_expediente')->references('id_expediente')->on('expedientes');
            $table->float('monto_total')->nullable();
            $table->float('adeltanto')->nullable();
            $table->float('restante')->nullable();
            $table->date('fecha_adelanto')->nullable();
            $table->string('detalle')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
