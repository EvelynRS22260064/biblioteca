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
        $prestamos = Prestamo::with('libro', 'usuario')->get();

        return view('prestamos.index', compact('prestamos'));
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

    public function select_libro(Request $request)
    {
        $usuario_id = $request->input('usuario_id');
        $usuario = User::findOrFail($usuario_id);
        $libros = Libro::all();

        return view('prestamos.select_libro', compact('usuario', 'libros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:users,id',
            'libro_id' => 'required|exists:libros,id',
        ]);

        #Crear transaccion
        \DB::beginTransaction();
        try{

        $prestamo = new Prestamo();
        $prestamo->usuario_id = $request->input('usuario_id');
        $prestamo->libro_id = $request->input('libro_id');
        $prestamo->fecha_prestamo = now();
        $prestamo->save();

        $libro = Libro::findOrFail($request->input('libro_id'));
        $libro->estatus = 1;
        $libro->save();

        \DB::commit();

        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->back()->with('error','Error al registrar el préstamo: '.$e->getMessage());
        }

        return redirect()->route('prestamos.index')->with('success', 'Préstamo registrado exitosamente');
    }

}
