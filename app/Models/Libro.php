<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'isbn',
        'anio_publicacion',
        'numero_paginas',
        'descripcion',
        'stock_disponible'
    ];

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }

    public function autores()
    {
        return $this->belongsToMany(Autor::class)
                    ->withPivot('orden_autor')
                    ->withTimestamps();
    }
}