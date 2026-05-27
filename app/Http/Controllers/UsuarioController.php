<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function perfil()
    {
        $usuario = Auth::user();
        return view('usuario.perfil', compact('usuario'));
    }
}