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
        Schema::create('juridicas__naturales', function (Blueprint $table) {
            $table->id();
            $table->string('numero_expediente')->unique();  // Esto será tu PR-número único
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->unsignedBigInteger('id_area');
            $table->foreign('id_area')->references('id_area')->on('areas');
            $table->string('cliente');
            $table->string('nro_expediente')->nullable();
            $table->date('fecha_ingreso');
            $table->date('fecha_fin')->nullable();
            $table->string('acto');
            $table->string('otros')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('juridicas__naturales');
    }
};
