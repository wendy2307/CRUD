<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrestamoController;

Route::view('/dashboard', 'dashboard');
Route::view('/libros', 'libros');
Route::view('/prestamos', 'prestamos');
Route::post('/prestamos', [PrestamoController::class, 'store']);
Route::put('/prestamos/{id}/devolver', [PrestamoController::class, 'devolver']);

