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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->datetime('fecha_prestamo')->nullable();
            $table->datetime('fecha_devolucion')->nullable();
            $table->string('estado', ['prestado', 'devuelto', 'pendiente'])->default('prestado');
            $table->unsignedBigInteger('libro_id');
            $table->unsignedBigInteger('usuario_id');

            $table->foreign('libro_id')->references('id')->on('libros')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
