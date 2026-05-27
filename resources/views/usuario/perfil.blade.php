<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Perfil</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, sans-serif; background: #f4f6f8; }
        .navbar {
            background: #16213e; color: white;
            padding: 14px 30px;
            display: flex; justify-content: space-between; align-items: center;
        }
        .navbar form button {
            background: #e74c3c; color: white;
            border: none; padding: 8px 16px;
            border-radius: 5px; cursor: pointer;
        }
        .container { max-width: 520px; margin: 50px auto; }
        .card {
            background: white; border-radius: 10px;
            padding: 35px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .avatar {
            width: 80px; height: 80px;
            background: #16213e; color: white;
            border-radius: 50%;
            display: flex; align-items: center;
            justify-content: center;
            font-size: 32px; margin: 0 auto 16px;
        }
        h2 {
            text-align: center; color: #16213e;
            margin-bottom: 4px;
        }
        .badge {
            display: block; text-align: center;
            background: #e8f5e9; color: #2e7d32;
            padding: 3px 12px; border-radius: 20px;
            font-size: 12px; margin: 0 auto 24px;
            width: fit-content;
        }
        .info-item {
            padding: 12px 0;
            border-bottom: 1px solid #eee;
            font-size: 14px; color: #333;
        }
        .info-item:last-child { border-bottom: none; }
        .info-item span {
            color: #888; font-size: 11px;
            display: block; margin-bottom: 2px;
        }
    </style>
</head>
<body>

<div class="navbar">
    <span>Sistema de Roles</span>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Cerrar Sesión</button>
    </form>
</div>

<div class="container">
    <div class="card">
        <div class="avatar">
            {{ strtoupper(substr($usuario->name, 0, 1)) }}
        </div>

        <h2>{{ $usuario->name }}</h2>
        <span class="badge">● Usuario</span>

        <div class="info-item">
            <span>Usuario</span>
            {{ $usuario->username }}
        </div>
        <div class="info-item">
            <span>Correo institucional</span>
            {{ $usuario->email }}
        </div>
        <div class="info-item">
            <span>Carnet de identidad</span>
            {{ $usuario->carnet ?? 'No registrado' }}
        </div>
        <div class="info-item">
            <span>Celular</span>
            {{ $usuario->celular ?? 'No registrado' }}
        </div>
        <div class="info-item">
            <span>Gmail</span>
            {{ $usuario->gmail ?? 'No registrado' }}
        </div>
        <div class="info-item">
            <span>Miembro desde</span>
            {{ $usuario->created_at->format('d/m/Y') }}
        </div>
    </div>
</div>
</body>
</html>