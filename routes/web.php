<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AdminController;

// Ruta principal (SPA)
Route::get('/', function () {
    return view('spa');
});

// Rutas de autenticación (mantenemos el login, pero desactivamos el registro)
Auth::routes([
    'register' => false, // Desactivar el registro de nuevos usuarios
]);

// Ruta protegida para el panel de administración
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/cities', [AdminController::class, 'getCities'])->name('admin.cities');
    Route::post('/admin/cities/store', [AdminController::class, 'storeCity'])->name('admin.cities.store');
});

// API para obtener las ciudades (pública)
Route::get('/api/cities', [CityController::class, 'getCities']);

// Ruta de inicio (no usada en este caso)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');