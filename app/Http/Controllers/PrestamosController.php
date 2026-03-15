<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Prestamo;
use App\Models\Libro;

class PrestamosController extends Controller
{
    public function index()
    {
        return view('prestamos.index');
    }

    public function create()
    {
        return view('prestamos.create');
    }

    public function buscar_usuario(Request $request)
{
    $usuario_id = $request->input('usuario_id');
    $usuario_nombre = $request->input('usuario_nombre');

    if(!$usuario_id && !$usuario_nombre){
        return redirect()->back()->with('error','Ingrese un ID o nombre');
    }

    if($usuario_id){
        $usuario = User::find($usuario_id);
    }else{
        $usuario = User::where('name','like','%'.$usuario_nombre.'%')->first();
    }

    if(!$usuario){
        return redirect()->back()->with('error','Usuario no encontrado');
    }

    return view('prestamos.create', compact('usuario'));
}

}
