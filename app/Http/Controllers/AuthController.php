<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credenciales = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->rol === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('usuario.perfil');
        }

        return back()->withErrors([
            'username' => 'Usuario o contraseña incorrectos.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}