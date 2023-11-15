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
        Schema::create('expedientes', function (Blueprint $table) {
            $table->string('id_expediente')->primary(); // Cambiado a string y configurado como clave primaria
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('users');
            $table->unsignedBigInteger('id_area');
            $table->foreign('id_area')->references('id_area')->on('areas');
            $table->string('cliente');
            $table->string('nro_expediente')->nullable();
            $table->date('fecha_ingreso');
            $table->date('fecha_fin')->nullable();
            $table->string('acto');
            $table->string('otros')->nullable();
            $table->float('monto_total')->nullable();
            $table->float('adelanto')->nullable();
            $table->float('restante')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedientes');
    }
};
