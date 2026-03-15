<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = User::all();

        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'user_type' => 'required|string|in:admin,user',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'user_type' => $request->user_type,
    ]);

    return redirect()->route('usuarios.index')
        ->with('success', 'Usuario creado exitosamente.');
}

        public function edit($id)
        {
            $usuario = User::findOrFail($id);
    
            return view('usuarios.edit', compact('usuario'));
        }

        public function update(Request $request, $id)
{
    $usuario = User::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $usuario->id,
        'user_type' => 'required|string|in:admin,user',
    ]);

    $usuario->name = $request->name;
    $usuario->email = $request->email;
    $usuario->user_type = $request->user_type;
    $usuario->save();
    

    return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
}

}