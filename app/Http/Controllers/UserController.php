<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit()
    {
       
        $user = auth()->user();

        
        return view('profile.edit', compact('user'));
    }

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


        return redirect('/profile')->with('success', 'Perfil actualizado correctamente');
    }
}
