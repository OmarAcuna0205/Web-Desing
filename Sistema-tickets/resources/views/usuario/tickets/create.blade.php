@extends('layouts.app')
@section('title', 'Nuevo Ticket')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Crear Nuevo Ticket</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('usuario.tickets.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Departamento *</label>
                            <input type="text" name="departamento" class="form-control" placeholder="Ej. Sistemas, Recursos Humanos..." required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Categoría *</label>
                            <select name="categoria" class="form-select" required>
                                <option value="">-- Selecciona --</option>
                                @foreach(['software', 'hardware', 'comunicaciones', 'plataformas', 'email', 'otro'] as $cat)
                                    <option value="{{ $cat }}">{{ ucfirst($cat) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nivel de Urgencia *</label>
                            <select name="nivel_urgencia" class="form-select" required>
                                <option value="">-- Selecciona --</option>
                                @foreach(['baja', 'media', 'alta', 'critica'] as $nivel)
                                    <option value="{{ $nivel }}">{{ ucfirst($nivel) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Descripción Corta *</label>
                            <input type="text" name="descripcion_corta" class="form-control" maxlength="255" placeholder="Resumen del problema" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Descripción Detallada</label>
                            <textarea name="descripcion_detallada" class="form-control" rows="3" placeholder="Explica a detalle qué está fallando..."></textarea>
                        </div>
                    </div>
                    <div class="mt-4 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Guardar Ticket</button>
                        <a href="{{ route('usuario.dashboard') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection