@extends('layouts.app')
@section('title', 'Mis Tickets')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Mis Tickets de Soporte</h2>
    <a href="{{ route('usuario.tickets.create') }}" class="btn btn-primary">+ Nuevo Ticket</a>
</div>

@if($tickets->isEmpty())
    <div class="alert alert-info text-center">
        No tienes tickets registrados actualmente.
    </div>
@else
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th># Reporte</th>
                        <th>Asunto</th>
                        <th>Categoría</th>
                        <th>Urgencia</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td><code>{{ $ticket->numero_reporte }}</code></td>
                            <td>{{ $ticket->descripcion_corta }}</td>
                            <td>{{ ucfirst($ticket->categoria) }}</td>
                            <td>{{ ucfirst($ticket->nivel_urgencia) }}</td>
                            <td>
                                <span class="badge bg-secondary">
                                    {{ ucfirst(str_replace('_', ' ', $ticket->status)) }}
                                </span>
                            </td>
                            <td>{{ $ticket->fecha_reporte ? $ticket->fecha_reporte->format('d/m/Y') : '-' }}</td>
                            <td>
                                <a href="{{ route('usuario.tickets.show', $ticket) }}" class="btn btn-sm btn-outline-primary">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@endsection