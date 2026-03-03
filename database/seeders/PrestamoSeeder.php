<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prestamo;
use App\Models\Libro;
use App\Models\Usuario;

class PrestamoSeeder extends Seeder
{
    public function run(): void
    {
        Prestamo::factory(10)->create([
            'libro_id' => Libro::inRandomOrder()->first()->id,
            'usuario_id' => Usuario::inRandomOrder()->first()->id,
        ]);
    }
}
