@extends('layouts.app')

@section('title', 'Detalles del Ticket')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Detalles del Ticket: {{ $ticket->numero_reporte }}</h5>
                <span class="badge bg-light text-dark">{{ ucfirst(str_replace('_', ' ', $ticket->status)) }}</span>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <p class="mb-1 text-muted small">Cliente</p>
                        <strong>{{ $ticket->cliente_nombre }}</strong>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1 text-muted small">Departamento</p>
                        <strong>{{ $ticket->departamento }}</strong>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1 text-muted small">Categoría</p>
                        <strong>{{ ucfirst($ticket->categoria) }}</strong>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1 text-muted small">Urgencia</p>
                        <strong>{{ ucfirst($ticket->nivel_urgencia) }}</strong>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1 text-muted small">Fecha de Reporte</p>
                        <strong>{{ $ticket->fecha_reporte ? $ticket->fecha_reporte->format('d/m/Y H:i') : '-' }}</strong>
                    </div>
                    
                    {{-- AQUI DESTACAMOS LA FECHA DE RESOLUCIÓN PARA TU EXAMEN --}}
                    <div class="col-md-6 bg-light rounded p-2 border-start border-4 border-success">
                        <p class="mb-1 text-muted small">Fecha de Resolución</p>
                        <strong class="text-success fs-5">
                            {{ $ticket->fecha_resolucion ? $ticket->fecha_resolucion->format('d/m/Y H:i:s') : 'Aún no resuelto' }}
                        </strong>
                    </div>

                    <div class="col-12 mt-3">
                        <p class="mb-1 text-muted small">Descripción Corta</p>
                        <strong>{{ $ticket->descripcion_corta }}</strong>
                    </div>
                    <div class="col-12">
                        <p class="mb-1 text-muted small">Descripción Detallada</p>
                        <p>{{ $ticket->descripcion_detallada ?? 'Sin detalles adicionales.' }}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex gap-2">
                {{-- RUTAS CORREGIDAS CON ADMIN --}}
                <a href="{{ route('admin.tickets.edit', $ticket) }}" class="btn btn-warning">Editar</a>
                <a href="{{ route('admin.tickets.index') }}" class="btn btn-secondary">Volver a la Lista</a>
                <form action="{{ route('admin.tickets.destroy', $ticket) }}" method="POST" class="ms-auto" onsubmit="return confirm('¿Seguro que deseas eliminar este ticket?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection