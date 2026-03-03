<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Autor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'nacionalidad',
        'biografia'
    ];

    public function libros()
    {
        return $this->belongsToMany(Libro::class)
                    ->withPivot('orden_autor')
                    ->withTimestamps();
    }
}