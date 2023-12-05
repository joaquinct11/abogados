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
        Schema::create('sub_actos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_expediente');
            $table->foreign('numero_expediente')->references('numero_expediente')->on('expedientes');
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
        Schema::dropIfExists('sub_actos');
    }
};
