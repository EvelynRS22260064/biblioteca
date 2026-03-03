<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class HomeController extends Controller
{
    public function index()
    
    {
        $user = auth()->user();

        if ($user->tipo_usuario === 'admin') {
            $libros = Libro::paginate(4);

            return view('home.index', compact('libros'));
        } else {
            return view('home.index_user');
        }
    }
}
