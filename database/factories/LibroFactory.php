<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LibroFactory extends Factory
{
    public function definition(): array
    {
        return [
            'titulo' => fake()->sentence(3),
            'isbn' => fake()->unique()->isbn13(),
            'anio_publicacion' => fake()->numberBetween(1990, 2024),
            'numero_paginas' => fake()->numberBetween(100, 800),
            'descripcion' => fake()->paragraph(),
            'stock_disponible' => fake()->numberBetween(0, 10),
        ];
    }
}