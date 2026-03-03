<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Libro;
use App\Models\Autor;

class LibroSeeder extends Seeder
{
    public function run(): void
    {
        $libros = Libro::factory(20)->create();

        foreach ($libros as $libro) {
            $libro->autores()->attach(
                Autor::inRandomOrder()->take(rand(1,2))->pluck('id'),
                ['orden_autor' => 1]
            );
        }
    }
}
