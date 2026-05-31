<x-app-layout>
    <x-slot name="header">
        <h2 class="section-title">
            {{ __('Mis Rutinas de Ejercicio') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="app-container">
            @if(session('success'))
                <div class="alert alert-success mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex flex-col gap-6">
                <div class="flex items-center justify-between">
                    <p class="text-slate-600">Organiza tus días de entrenamiento y revisa tus rutinas.</p>
                    <a href="{{ route('routines.create') }}" class="btn btn-primary">
                        + Crear Nueva Rutina
                    </a>
                </div>

                <div style="padding: 15px; background: #f9fafb; border-radius: 8px; border: 1px solid #e5e7eb;">
                    <form action="{{ route('routines.report') }}" method="GET" target="_blank" style="display: flex; gap: 10px; align-items: center; justify-content: space-between;">
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <label for="dia" class="font-semibold text-slate-700">Filtrar Reporte por Día:</label>
                            <select name="dia" id="dia" style="padding: 6px; border-radius: 5px; border: 1px solid #ccc;">
                                <option value="">Todos</option>
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miércoles">Miércoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                                <option value="Sábado">Sábado</option>
                                <option value="Domingo">Domingo</option>
                            </select>
                        </div>
                        <button type="submit" style="padding: 8px 15px; background-color: #2563eb; color: white; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; transition: background 0.3s;" onmouseover="this.style.backgroundColor='#1d4ed8'" onmouseout="this.style.backgroundColor='#2563eb'">
                            📄 Generar Reporte PDF
                        </button>
                    </form>
                </div>
                <div class="card p-6 fade-up">
                    <div class="overflow-x-auto">
                        <table class="table">
                        <thead>
                            <tr>
                                <th>Atleta</th>
                                <th>Nombre de la Rutina</th>
                                <th>Día</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($routines as $routine)
                            <tr>
                                <td>{{ $routine->user->name }}</td>
                                <td class="font-semibold text-slate-900">{{ $routine->nombre }}</td>
                                <td><span class="badge">{{ $routine->dia }}</span></td>
                                <td>
                                    <div class="flex flex-wrap items-center gap-3">
                                        <a href="{{ route('routines.show', $routine) }}" class="text-slate-700 font-semibold hover:text-slate-900">Ver</a>
                                        <a href="{{ route('routines.edit', $routine) }}" class="text-amber-700 font-semibold hover:text-amber-900">Editar</a>
                                        <form action="{{ route('routines.destroy', $routine) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres borrarla?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-rose-600 font-semibold hover:text-rose-700">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>