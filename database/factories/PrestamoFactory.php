<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Libro;
use App\Models\Usuario;

class PrestamoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'fecha_prestamo' => now(),
            'fecha_devolucion_estimada' => now()->addDays(15),
            'fecha_devolucion_real' => null,
            'estado' => 'activo',
            'libro_id' => Libro::inRandomOrder()->first()?->id,
            'usuario_id' => Usuario::inRandomOrder()->first()?->id,
        ];
    }
}
