<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\UsuariosController;

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
});

// Rutas solo para administrador
Route::middleware(['auth', 'user_type:admin'])->group(function () {

    Route::resource('categorias', CategoriasController::class);
    Route::resource('libros', LibroController::class);

    // CRUD completo de usuarios
    Route::resource('usuarios', UsuariosController::class);

});

// Rutas para usuarios normales
Route::middleware(['auth', 'user_type:user'])->group(function () {

});