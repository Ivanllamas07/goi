<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
        ]);

    
        $user = auth()->user();

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->save();

        // Redirigir al usuario a la página de perfil o a otra ruta deseada
        return redirect('/profile')->with('success', 'Perfil actualizado correctamente');
    }
}