<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
    public function showResetForm(Request $request)
    {

        return view('password.reset');
    }

    public function sendResetLinkEmail(Request $request)
    {

        $validatedData = $request->validate([
            'email' => 'required|string|email',
        ]);

        return redirect('/')->with('success', 'Correo electrónico de restablecimiento de contraseña enviado');
    }

    public function showResetPasswordForm(Request $request, $token, $email)
    {

        return view('password.reset', compact('token', 'email'));
    }

    public function resetPassword(Request $request)
    {

        return redirect('/login')->with('success', 'Contraseña restablecida correctamente');
    }
}