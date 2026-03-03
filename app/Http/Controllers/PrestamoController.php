<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Libro;
use App\Models\Usuario;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function store(Request $request)
    {
        $libro = Libro::findOrFail($request->libro_id);
        $usuario = Usuario::findOrFail($request->usuario_id);

    
        if ($libro->stock_disponible <= 0) {
            return response()->json([
                'error' => 'No hay stock disponible'
            ], 400);
        }

        
        if ($usuario->prestamos()->where('estado', 'activo')->count() >= 3) {
            return response()->json([
                'error' => 'Máximo 3 préstamos activos permitidos'
            ], 400);
        }

    
        $prestamo = Prestamo::create([
            'fecha_prestamo' => now(),
            'fecha_devolucion_estimada' => now()->addDays(15),
            'estado' => 'activo',
            'libro_id' => $libro->id,
            'usuario_id' => $usuario->id,
        ]);

        
        $libro->decrement('stock_disponible');

        return response()->json($prestamo, 201);
    }
}