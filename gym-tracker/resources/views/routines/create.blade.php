<x-app-layout>
    <x-slot name="header">
        <h2 class="section-title">
            {{ __('Crear Rutina') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="app-container">
            <div class="card p-8 fade-up">
                
                <form action="{{ route('routines.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="form-label mb-2">Nombre de la Rutina:</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-input">
                        @error('nombre') <span class="text-rose-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label mb-2">Día de la semana:</label>
                        <select name="dia" class="form-select">
                            <option value="">Selecciona un día</option>
                            <option value="Lunes">Lunes</option>
                            <option value="Martes">Martes</option>
                            <option value="Miércoles">Miércoles</option>
                            <option value="Jueves">Jueves</option>
                            <option value="Viernes">Viernes</option>
                            <option value="Sábado">Sábado</option>
                            <option value="Domingo">Domingo</option>
                        </select>
                        @error('dia') <span class="text-rose-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex gap-4 mt-6">
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                        <a href="{{ route('routines.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>