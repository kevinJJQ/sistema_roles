<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $usuarios = User::where('rol', 'usuario')->get();
        return view('admin.dashboard', compact('usuarios'));
    }

    public function crear()
    {
        return view('admin.crear');
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'username' => 'required|unique:users,username',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'carnet'   => 'nullable|string|max:20',
            'celular'  => 'nullable|string|max:20',
            'gmail'    => 'nullable|email',
        ]);

        User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'rol'      => 'usuario',
            'carnet'   => $request->carnet,
            'celular'  => $request->celular,
            'gmail'    => $request->gmail,
        ]);

        return redirect()->route('admin.dashboard')
               ->with('success', 'Usuario creado correctamente.');
    }

    public function editar($id)
    {
        $usuario = User::findOrFail($id);
        return view('admin.editar', compact('usuario'));
    }

    public function actualizar(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:100',
            'username' => 'required|unique:users,username,' . $id,
            'email'    => 'required|email|unique:users,email,' . $id,
            'carnet'   => 'nullable|string|max:20',
            'celular'  => 'nullable|string|max:20',
            'gmail'    => 'nullable|email',
        ]);

        $datos = [
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'carnet'   => $request->carnet,
            'celular'  => $request->celular,
            'gmail'    => $request->gmail,
        ];

        if ($request->filled('password')) {
            $datos['password'] = Hash::make($request->password);
        }

        $usuario->update($datos);

        return redirect()->route('admin.dashboard')
               ->with('success', 'Usuario actualizado correctamente.');
    }

    public function eliminar($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.dashboard')
               ->with('success', 'Usuario eliminado correctamente.');
    }
}