<x-app-layout>
    <x-slot name="header">
        <h2 class="section-title">
            Rutina: {{ $routine->nombre }} ({{ $routine->dia }})
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="app-container flex flex-col lg:flex-row gap-8">
            
            <div class="w-full lg:w-2/3 card p-8 fade-up">
                <h3 class="text-lg font-semibold mb-4">Ejercicios de la rutina</h3>
                
                @if(session('success'))
                    <div class="alert alert-success mb-4">{{ session('success') }}</div>
                @endif

                <ul class="divide-y divide-slate-200/70">
                    @forelse($routine->exercises as $exercise)
                        <li class="py-3 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">
                            <div class="text-slate-700">
                                <span class="font-semibold text-slate-900">{{ $exercise->nombre }}</span> -
                                {{ $exercise->series }} series x {{ $exercise->repeticiones }} reps
                            </div>
                            <form action="{{ route('exercises.destroy', $exercise) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-rose-600 text-sm font-semibold hover:text-rose-700">Quitar</button>
                            </form>
                        </li>
                    @empty
                        <li class="py-3 text-slate-500">No hay ejercicios agregados todavía.</li>
                    @endforelse
                </ul>
                
                <div class="mt-6">
                    <a href="{{ route('routines.index') }}" class="text-slate-600 font-semibold hover:text-slate-900"><- Volver a mis rutinas</a>
                </div>
            </div>

            <div class="w-full lg:w-1/3 card-soft p-6 fade-up fade-up-delay">
                <h3 class="text-lg font-semibold mb-4 text-slate-700">+ Agregar Ejercicio</h3>
                
                <form action="{{ route('exercises.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="routine_id" value="{{ $routine->id }}">

                    <div class="mb-3">
                        <label class="form-label mb-1">Nombre del ejercicio</label>
                        <input type="text" name="nombre" class="form-input" required>
                    </div>
                    <div class="mb-3 flex gap-2">
                        <div class="w-1/2">
                            <label class="form-label mb-1">Series</label>
                            <input type="number" name="series" class="form-input" required>
                        </div>
                        <div class="w-1/2">
                            <label class="form-label mb-1">Reps</label>
                            <input type="number" name="repeticiones" class="form-input" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-full justify-center">
                        Agregar
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>