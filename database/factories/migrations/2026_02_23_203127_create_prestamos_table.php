<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
{
    Schema::create('prestamos', function (Blueprint $table) {
        $table->id();

        $table->foreignId('usuario_id')
              ->constrained('usuarios')
              ->onDelete('cascade');

        $table->foreignId('libro_id')
              ->constrained('libros')
              ->onDelete('cascade');

        $table->date('fecha_prestamo')->useCurrent();
        $table->date('fecha_devolucion_estimada');
        $table->date('fecha_devolucion_real')->nullable();

        $table->enum('estado', ['prestado', 'devuelto', 'atrasado'])
              ->default('prestado');

        $table->timestamps();
    });
}

   
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
