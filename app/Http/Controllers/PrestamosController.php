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
        $libros = Libro::where('estatus', 'D')->orderBy('id', 'asc')->get();

        return view('prestamos.select_libro', compact('usuario', 'libros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:users,id',
            'libro_id' => 'required|exists:libros,id',
        ]);

        $libro = Libro::findOrFail($request->input('libro_id'));
        
        if($libro->estatus != 'D') {
            return redirect()->back()->with('error', 'Este libro ya fue prestado a otro usuario');
        }

        \DB::beginTransaction();
        try{
            $prestamo = new Prestamo();
            $prestamo->usuario_id = $request->input('usuario_id');
            $prestamo->libro_id = $request->input('libro_id');
            $prestamo->fecha_prestamo = now();
            $prestamo->save();

            $libro->estatus = 'I';
            $libro->save();

            \DB::commit();
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->back()->with('error','Error al registrar el préstamo: '.$e->getMessage());
        }

        return redirect()->route('prestamos.index')->with('success', 'Préstamo registrado exitosamente');
    }

    public function devolver($id)
    {
        \DB::beginTransaction();
        try{
            $prestamo = Prestamo::findOrFail($id);
            
            if($prestamo->fecha_devolucion) {
                return redirect()->back()->with('error', 'Este libro ya fue devuelto');
            }
            
            $libro = Libro::findOrFail($prestamo->libro_id);
            $libro->estatus = 'D';
            $libro->save();
            
            $prestamo->fecha_devolucion = now();
            $prestamo->save();
            
            \DB::commit();
            
            return redirect()->route('prestamos.index')->with('success', 'Libro devuelto exitosamente');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->back()->with('error', 'Error al devolver el libro: '.$e->getMessage());
        }
    }

    public function edit($id)
    {
        $prestamo = Prestamo::with('libro', 'usuario')->findOrFail($id);
        $libros = Libro::all();
        $usuarios = User::all();
        
        return view('prestamos.edit', compact('prestamo', 'libros', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'usuario_id' => 'required|exists:users,id',
            'libro_id' => 'required|exists:libros,id',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'nullable|date|after_or_equal:fecha_prestamo',
        ]);

        $prestamo = Prestamo::findOrFail($id);
        $libroAnterior = Libro::findOrFail($prestamo->libro_id);
        $libroNuevo = Libro::findOrFail($request->libro_id);

        \DB::beginTransaction();
        try {
            // Si cambiaron el libro, actualizar estados
            if ($prestamo->libro_id != $request->libro_id) {
                // El libro anterior vuelve a estar disponible
                $libroAnterior->estatus = 'D';
                $libroAnterior->save();
                
                // El nuevo libro se marca como prestado si no tiene devolución
                if ($libroNuevo->estatus == 'D') {
                    $libroNuevo->estatus = 'I';
                    $libroNuevo->save();
                } else {
                    throw new \Exception('El nuevo libro no está disponible');
                }
            }

            // Actualizar datos del préstamo
            $prestamo->usuario_id = $request->usuario_id;
            $prestamo->libro_id = $request->libro_id;
            $prestamo->fecha_prestamo = $request->fecha_prestamo;
            $prestamo->fecha_devolucion = $request->fecha_devolucion;
            $prestamo->save();

            \DB::commit();
            
            return redirect()->route('prestamos.index')
                ->with('success', 'Préstamo actualizado exitosamente');
                
        } catch (\Exception $e) {
            \DB::rollBack();
            return redirect()->back()
                ->with('error', 'Error al actualizar el préstamo: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        
        \DB::beginTransaction();
        try {
            // Si el préstamo no tiene fecha de devolución, el libro vuelve a estar disponible
            if (!$prestamo->fecha_devolucion) {
                $libro = Libro::findOrFail($prestamo->libro_id);
                $libro->estatus = 'D';
                $libro->save();
            }
            
            $prestamo->delete();
            
            \DB::commit();
            
            return redirect()->route('prestamos.index')
                ->with('success', 'Préstamo eliminado exitosamente');
                
        } catch (\Exception $e) {
            \DB::rollBack();
            return redirect()->back()
                ->with('error', 'Error al eliminar el préstamo: ' . $e->getMessage());
        }
    }
}