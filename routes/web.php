<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriasController; // ← CORREGIDO (con 'a')
use App\Http\Controllers\LibroController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Rutas protegidas
Route::middleware('auth')->group(function (){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Rutas de categorías (CORREGIDO)
    Route::resource('categorias', CategoriasController::class);
    
    // Rutas de libros
    Route::resource('libros', LibroController::class);
});