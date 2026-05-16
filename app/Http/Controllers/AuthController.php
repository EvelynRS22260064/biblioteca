<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\UsuarioResgistrado;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Muestra el formulario de login
     */
    public function loginForm()
    {
        return view('auth.login');
    }

    /**
     * Procesa el registro de nuevos usuarios
     */
    public function register()
    {
        // Validar los datos de registro
        $validatedData = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crear el usuario CON CONTRASEÑA ENCRIPTADA
        $user = \App\Models\User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'username' => $validatedData['email'], // Asignar el email como username
            'tipo_usuario' => 'user', // Asignar un tipo de usuario por defecto
        ]);

        // Redirigir o iniciar sesión automáticamente
        Auth::login($user);
        Mail::to($user->email)->queue(new UsuarioResgistrado($user));
        return redirect()->route('home');
    }

    /**
     * Procesa el inicio de sesión
     */
    public function login()
    {
        // Validar los datos de inicio de sesión
        $credentials = request()->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Intentar iniciar sesión
        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            return redirect()->intended(route('home'));
        }

        // Si falla, volver con error
        return back()->withErrors([
            'email' => 'Las credenciales no son correctas.',
        ])->onlyInput('email');
    }

    /**
     * Cierra la sesión del usuario
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}