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