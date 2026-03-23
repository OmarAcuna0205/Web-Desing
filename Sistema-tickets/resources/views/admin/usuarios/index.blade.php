@extends('layouts.app')
@section('title', 'Gestión de Usuarios')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-primary">Gestión de Usuarios</h2>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Volver al Dashboard</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol Actual</th>
                    <th>Cambiar Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $user)
                    <tr>
                        <td class="align-middle">{{ $user->id }}</td>
                        <td class="align-middle">{{ $user->name }}</td>
                        <td class="align-middle">{{ $user->email }}</td>
                        <td class="align-middle">
                            <span class="badge bg-info text-dark">{{ strtoupper($user->rol) }}</span>
                        </td>
                        <td class="align-middle">
                            <form action="{{ route('admin.usuarios.cambiar-rol', $user) }}" method="POST" class="d-flex gap-2 mb-0">
                                @csrf
                                @method('PATCH')
                                <select name="rol" class="form-select form-select-sm" style="width: 120px;" required>
                                    <option value="admin" {{ $user->rol === 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="gerente" {{ $user->rol === 'gerente' ? 'selected' : '' }}>Gerente</option>
                                    <option value="usuario" {{ $user->rol === 'usuario' ? 'selected' : '' }}>Usuario</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-success">Guardar</button>
                            </form>
                        </td>
                        <td class="align-middle">
                            <form action="{{ route('admin.usuarios.destroy', $user) }}" method="POST" class="mb-0" onsubmit="return confirm('¿Seguro que deseas eliminar a este usuario?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection