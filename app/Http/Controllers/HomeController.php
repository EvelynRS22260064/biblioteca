<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\User;     
use App\Models\Prestamo; 

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->tipo_usuario === 'admin') {
            $libros = Libro::paginate(4);
            $total_libros = Libro::count();
            $libros_prestados = Libro::where('estatus', 'I')->count();
            $total_usuarios = User::count();
            $devoluciones_pendientes = Prestamo::whereNull('fecha_devolucion')->count();

            return view('home.index', compact('libros', 'total_libros', 'libros_prestados', 'total_usuarios', 'devoluciones_pendientes'));
        } else {
            return view('home.index_user');
        }
    }
}