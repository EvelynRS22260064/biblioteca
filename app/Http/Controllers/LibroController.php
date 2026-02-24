<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Categoria;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::with('categoria')->get();
        return view('libros.index', compact('libros'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('libros.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'isbn' => 'required',
            'autor' => 'required',
            'editorial' => 'required',
            'categoria_id' => 'required'
        ]);

        Libro::create($request->all());

        return redirect()->route('libros.index')
            ->with('success', 'Libro creado correctamente');
    }

    public function edit(Libro $libro)
    {
        $categorias = Categoria::all();
        return view('libros.edit', compact('libro', 'categorias'));
    }

    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'nombre' => 'required',
            'isbn' => 'required',
            'autor' => 'required',
            'editorial' => 'required',
            'categoria_id' => 'required'
        ]);

        $libro->update($request->all());

        return redirect()->route('libros.index')
            ->with('success', 'Libro actualizado correctamente');
    }

    public function destroy(Libro $libro)
    {
        $libro->delete();

        return redirect()->route('libros.index')
            ->with('success', 'Libro eliminado correctamente');
    }
}