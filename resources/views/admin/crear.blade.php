<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f8; margin: 0; }
        .navbar { background: #1a1a2e; color: white; padding: 14px 30px; }
        .container {
            max-width: 550px; margin: 40px auto;
            background: white; padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        h2 { color: #1a1a2e; margin-bottom: 20px; }
        label { font-size: 13px; color: #333; }
        input {
            width: 100%; padding: 9px; margin: 5px 0 15px;
            border: 1px solid #ccc; border-radius: 5px; font-size: 14px;
        }
        .btn-guardar {
            background: #27ae60; color: white;
            padding: 10px 20px; border: none;
            border-radius: 5px; cursor: pointer;
        }
        .btn-volver {
            color: #1a1a2e; text-decoration: none; margin-left: 12px;
        }
        .error { color: red; font-size: 12px; margin-bottom: 10px; }
    </style>
</head>
<body>
<div class="navbar">Panel Administrador — Crear Usuario</div>
<div class="container">
    <h2>Agregar Nuevo Usuario</h2>

    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $e)<p>{{ $e }}</p>@endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('admin.guardar') }}">
        @csrf
        <label>Nombre completo:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>

        <label>Usuario:</label>
        <input type="text" name="username" value="{{ old('username') }}" required>

        <label>Correo institucional:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>

        <label>Contraseña:</label>
        <input type="password" name="password" required>

        <label>Carnet de identidad:</label>
        <input type="text" name="carnet" value="{{ old('carnet') }}">

        <label>Celular:</label>
        <input type="text" name="celular" value="{{ old('celular') }}">

        <label>Gmail:</label>
        <input type="email" name="gmail" value="{{ old('gmail') }}">

        <button type="submit" class="btn-guardar">Guardar</button>
        <a href="{{ route('admin.dashboard') }}" class="btn-volver">Cancelar</a>
    </form>
</div>
</body>
</html>