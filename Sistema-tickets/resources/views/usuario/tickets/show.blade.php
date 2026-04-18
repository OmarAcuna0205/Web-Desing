@extends('layouts.app')
@section('title', 'Detalle de Ticket')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Ticket: {{ $ticket->numero_reporte }}</h5>
                <span class="badge bg-light text-dark">{{ ucfirst(str_replace('_', ' ', $ticket->status)) }}</span>
            </div>
            <div class="card-body">
                <div class="row g-3">
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
                    <div class="col-12">
                        <p class="mb-1 text-muted small">Descripción Corta</p>
                        <strong>{{ $ticket->descripcion_corta }}</strong>
                    </div>
                    <div class="col-12">
                        <p class="mb-1 text-muted small">Descripción Detallada</p>
                        <p>{{ $ticket->descripcion_detallada ?? 'Sin detalles adicionales.' }}</p>
                    </div>

                    {{-- --- BLOQUE DE ANALISIS IA --- --}}
                    @if($ticket->ai_analysis)
                    <div class="col-12 mt-3">
                        <div class="alert alert-warning border-warning">
                            <h6 class="fw-bold"><i class="fas fa-robot"></i> Análisis Automático de IA:</h6>
                            <p class="mb-0 fst-italic">"{{ $ticket->ai_analysis }}"</p>
                        </div>
                    </div>
                    @endif

                    @if($ticket->comentarios_tecnico)
                    <div class="col-12 mt-3">
                        <div class="alert alert-info">
                            <p class="mb-1 text-muted small fw-bold">Comentarios del Técnico:</p>
                            <p class="mb-0">{{ $ticket->comentarios_tecnico }}</p>
                        </div>
                    </div>
                    @endif

                    <hr class="my-4">
                    <h5 class="fw-bold mb-3">Adjuntos del ticket</h5>
                    <div class="row">
                        @forelse($ticket->attachments as $attachment)
                            <div class="col-md-4 mb-3 text-center">
                                @if(str_starts_with($attachment->mime_type, 'image/'))
                                    <a href="{{ Storage::url($attachment->file_path) }}" target="_blank">
                                        <img src="{{ Storage::url($attachment->file_path) }}" 
                                             class="img-fluid rounded shadow-sm border" 
                                             style="height: 150px; width: 100%; object-fit: cover;">
                                    </a>
                                @else
                                    <a href="{{ Storage::url($attachment->file_path) }}" target="_blank" 
                                       class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center" style="height: 150px;">
                                        <div class="text-truncate px-2">
                                            📄<br>{{ $attachment->original_name }}
                                        </div>
                                    </a>
                                @endif
                                <small class="text-muted d-block mt-1 text-truncate">
                                    {{ $attachment->original_name }}
                                </small>
                            </div>
                        @empty
                            <div class="col-12">
                                <p class="text-muted fst-italic">Este ticket no tiene archivos adjuntos.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('usuario.tickets.index') }}" class="btn btn-secondary">Volver a Mis Tickets</a>
            </div>
        </div>
    </div>
</div>
@endsection