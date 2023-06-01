<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crear el nuevo usuario
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Realizar acciones adicionales, como enviar un correo de confirmación, si es necesario

        // Iniciar sesión del usuario
        auth()->login($user);

        // Redirigir al usuario a la página de inicio o a otra ruta deseada
        return redirect('/home');
    }

    public function login(Request $request)
    {
        // Validar los datos del formulario
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Autenticar al usuario
        if (auth()->attempt($credentials)) {
            // La autenticación fue exitosa
            // Redirigir al usuario a la página de inicio o a otra ruta deseada
            return redirect('/home');
        } else {
            // La autenticación falló
            // Redirigir de nuevo a la página de inicio de sesión con un mensaje de error
            return redirect('/login')->with('error', 'Credenciales inválidas');
        }
    }

    public function logout()
    {
        // Cerrar sesión del usuario
        auth()->logout();

        // Redirigir al usuario a la página de inicio o a otra ruta deseada
        return redirect('/');
    }
}