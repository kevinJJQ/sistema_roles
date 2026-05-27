<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: Arial, sans-serif;
            background: #1a1a2e;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .card {
            background: white;
            padding: 40px;
            border-radius: 10px;
            width: 380px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
        .card h1 {
            text-align: center;
            color: #1a1a2e;
            font-size: 22px;
            margin-bottom: 4px;
        }
        .subtitulo {
            text-align: center;
            color: #666;
            font-size: 13px;
            margin-bottom: 24px;
        }
        /* ↑ Aquí aparece tu nombre completo */
        label { font-size: 13px; color: #333; }
        input {
            width: 100%;
            padding: 10px;
            margin: 6px 0 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }
        button {
            width: 100%;
            padding: 11px;
            background: #1a1a2e;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
        }
        .error { color: red; font-size: 12px; margin-bottom: 10px; }
    </style>
</head>
<body>
<div class="card">
    <h1>Sistema de Roles</h1>
    <!-- Tu nombre completo va aquí -->
    <p class="subtitulo">TU NOMBRE COMPLETO</p>

    @if ($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    @if (session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <label>Usuario:</label>
        <input type="text" name="username"
               value="{{ old('username') }}" required autofocus>

        <label>Contraseña:</label>
        <input type="password" name="password" required>

        <button type="submit">Ingresar</button>
    </form>
</div>
</body>
</html>