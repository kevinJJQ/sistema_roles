<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Administrador</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, sans-serif; background: #f4f6f8; }
        .navbar {
            background: #1a1a2e; color: white;
            padding: 14px 30px;
            display: flex; justify-content: space-between; align-items: center;
        }
        .navbar form button {
            background: #e74c3c; color: white;
            border: none; padding: 8px 16px;
            border-radius: 5px; cursor: pointer;
        }
        .container { padding: 30px; }
        h2 { color: #1a1a2e; margin-bottom: 20px; }
        .btn-nuevo {
            background: #27ae60; color: white;
            padding: 9px 18px; border-radius: 5px;
            text-decoration: none; font-size: 14px;
            display: inline-block; margin-bottom: 20px;
        }
        table {
            width: 100%; border-collapse: collapse;
            background: white; border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        th {
            background: #1a1a2e; color: white;
            padding: 12px; text-align: left;
        }
        td { padding: 11px 12px; border-bottom: 1px solid #eee; }
        .btn-edit {
            background: #f39c12; color: white;
            padding: 5px 12px; border-radius: 4px;
            text-decoration: none; font-size: 13px;
        }
        .btn-del {
            background: #e74c3c; color: white;
            padding: 5px 12px; border-radius: 4px;
            border: none; cursor: pointer; font-size: 13px;
        }
        .alert-ok {
            background: #d4edda; color: #155724;
            padding: 10px; border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<div class="navbar">
    <span>👤 Admin: <strong>{{ Auth::user()->name }}</strong></span>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Cerrar Sesión</button>
    </form>
</div>

<div class="container">
    <h2>Gestión de Usuarios — ABM</h2>

    @if(session('success'))
        <div class="alert-ok">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.crear') }}" class="btn-nuevo">+ Agregar Usuario</a>

    <table>
        <thead>
            <tr>
                <th>N°</th>
                <th>Nombre Completo</th>
                <th>Usuario</th>
                <th>Correo</th>
                <th>Carnet</th>
                <th>Celular</th>
                <th>Gmail</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $i => $u)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $u->name }}</td>
                <td>{{ $u->username }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->carnet ?? '—' }}</td>
                <td>{{ $u->celular ?? '—' }}</td>
                <td>{{ $u->gmail ?? '—' }}</td>
                <td>
                    <a href="{{ route('admin.editar', $u->id) }}"
                       class="btn-edit">Editar</a>

                    <form method="POST"
                          action="{{ route('admin.eliminar', $u->id) }}"
                          style="display:inline"
                          onsubmit="return confirm('¿Eliminar a {{ $u->name }}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-del">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>