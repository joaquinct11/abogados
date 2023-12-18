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
        Schema::create('sub_actos2', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('expediente_id'); // Cambia a clave foránea de tipo integer
            $table->foreign('expediente_id')->references('id')->on('expedientes'); // Referencia la clave primaria 'id' de la tabla 'expedientes'
            $table->string('subacto')->nullable();
            $table->string('ubicacion')->nullable();
            $table->string('intervinientes')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_actos2');
    }
};
