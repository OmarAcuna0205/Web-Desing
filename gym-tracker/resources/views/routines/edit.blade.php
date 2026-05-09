<x-app-layout>
    <x-slot name="header">
        <h2 class="section-title">
            {{ __('Editar Rutina') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="app-container">
            <div class="card p-8 fade-up">
                
                <form action="{{ route('routines.update', $routine) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="form-label mb-2">Nombre de la Rutina:</label>
                        <input type="text" name="nombre" value="{{ old('nombre', $routine->nombre) }}" class="form-input">
                        @error('nombre') <span class="text-rose-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label mb-2">Día de la semana:</label>
                        <select name="dia" class="form-select">
                            <option value="Lunes" {{ $routine->dia == 'Lunes' ? 'selected' : '' }}>Lunes</option>
                            <option value="Martes" {{ $routine->dia == 'Martes' ? 'selected' : '' }}>Martes</option>
                            <option value="Miércoles" {{ $routine->dia == 'Miércoles' ? 'selected' : '' }}>Miércoles</option>
                            <option value="Jueves" {{ $routine->dia == 'Jueves' ? 'selected' : '' }}>Jueves</option>
                            <option value="Viernes" {{ $routine->dia == 'Viernes' ? 'selected' : '' }}>Viernes</option>
                            <option value="Sábado" {{ $routine->dia == 'Sábado' ? 'selected' : '' }}>Sábado</option>
                            <option value="Domingo" {{ $routine->dia == 'Domingo' ? 'selected' : '' }}>Domingo</option>
                        </select>
                        @error('dia') <span class="text-rose-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex gap-4 mt-6">
                        <button type="submit" class="btn btn-primary">
                            Actualizar
                        </button>
                        <a href="{{ route('routines.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>