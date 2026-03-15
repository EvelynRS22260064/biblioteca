<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\PrestamosController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Rutas protegidas
Route::middleware('auth')->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Rutas para préstamos
    Route::get('/prestamos', [PrestamosController::class, 'index'])->name('prestamos.index');
    Route::get('/prestamos/create', [PrestamosController::class, 'create'])->name('prestamos.create');

    // Buscar usuario
    Route::match(['get','post'], '/prestamos/buscar_usuario',
        [PrestamosController::class, 'buscar_usuario'])
        ->name('prestamos.buscar_usuario');

    // Seleccionar libro
    Route::match(['get','post'], '/prestamos/select_libro',
        [PrestamosController::class, 'select_libro'])
        ->name('prestamos.select_libro');

    // Guardar préstamo
    Route::post('/prestamos/store', [PrestamosController::class, 'store'])->name('prestamos.store');

    // EDITAR préstamo
    Route::get('/prestamos/{id}/edit', [PrestamosController::class, 'edit'])
        ->name('prestamos.edit');

    // ACTUALIZAR préstamo
    Route::put('/prestamos/{id}', [PrestamosController::class, 'update'])
        ->name('prestamos.update');

    // ELIMINAR préstamo
    Route::delete('/prestamos/{id}', [PrestamosController::class, 'destroy'])
        ->name('prestamos.destroy');
});

// Rutas solo para administrador
Route::middleware(['auth', 'user_type:admin'])->group(function () {

    Route::resource('categorias', CategoriasController::class);
    Route::resource('libros', LibroController::class);
    // CRUD completo de usuarios para el administrador
    Route::resource('usuarios', UsuariosController::class);
});

// Rutas para usuarios normales
Route::middleware(['auth', 'user_type:user'])->group(function () {

});