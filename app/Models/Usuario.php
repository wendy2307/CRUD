<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'fecha_registro',
        'estado'
    ];

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }
}