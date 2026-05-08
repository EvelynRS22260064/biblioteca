<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Libro;
use App\Models\Prestamo;
use App\Http\Resources\LibroResource;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        // Validar datos
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Intentar login
        if (!Auth::attempt($credentials)) {

            return response()->json([
                'message' => 'Credenciales inválidas'
            ], 401);
        }

        // Obtener usuario autenticado
        $user = Auth::user();

        // Crear token
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'Login exitoso',
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Sesión cerrada'
        ]);
    }

    public function libros_disponibles()
    {
        $libros = Libro::where('estatus', 'D')
            ->orderBy('id', 'asc')
            ->get();

        return LibroResource::collection($libros);
    }

    public function entregar_libro(Request $request)
    {
        // Validar datos
        $request->validate([
            'prestamo_id' => 'required|exists:prestamos,id',
        ]);

        // Buscar préstamo
        $prestamo = Prestamo::find($request->prestamo_id);

        \DB::beginTransaction();

        try {

            // Buscar libro asociado al préstamo
            $libro = Libro::find($prestamo->libro_id);

            // Cambiar estado del libro a disponible
            $libro->estatus = 'D';
            $libro->save();

            // Registrar fecha de devolución
            $prestamo->fecha_devolucion = now();
            $prestamo->save();

            \DB::commit();

            return response()->json([
                'message' => 'Libro entregado correctamente'
            ]);

        } catch (\Exception $e) {

            \DB::rollBack();

            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}