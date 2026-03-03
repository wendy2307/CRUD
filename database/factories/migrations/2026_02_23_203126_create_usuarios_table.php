<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
{
    Schema::create('usuarios', function (Blueprint $table) {
        $table->id();
        $table->string('nombre', 150);
        $table->string('email')->unique();
        $table->string('telefono')->nullable();
        $table->timestamp('fecha_registro')->useCurrent();
        $table->enum('estado', ['activo', 'inactivo'])->default('activo');
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
