<?php

use Illuminate\Support\Facades\Route;
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

    // Acciones para ejecutar scripts
    Route::post('/admin/fetch-cities', [AdminController::class, 'fetchCities'])->name('admin.fetch-cities');
    Route::post('/admin/update-population', [AdminController::class, 'updatePopulation'])->name('admin.update-population');
    Route::post('/admin/update-temperature', [AdminController::class, 'updateTemperature'])->name('admin.update-temperature');
    Route::post('/admin/update-salary', [AdminController::class, 'updateSalary'])->name('admin.update-salary');
    Route::post('/admin/update-transport', [AdminController::class, 'updateTransport'])->name('admin.update-transport');
});

// Ruta de inicio (no usada en este caso)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');