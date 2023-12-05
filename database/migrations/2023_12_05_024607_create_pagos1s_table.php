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
        Schema::create('pagos1', function (Blueprint $table) {
            $table->id('id_pagos');
            $table->string('numero_expediente');
            $table->foreign('numero_expediente')->references('numero_expediente')->on('judiciales');
            $table->float('monto_total')->nullable();
            $table->date('fecha_monto_total')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos1');
    }
};
