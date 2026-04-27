@extends('layouts.app')

@section('titulo', 'Videojuegos')

@section('estilos')
    <style>
        .estrellas { color: gold; font-size: 1.2rem; }
    </style>
@endsection

@section('contenido')
    <h1> Mis Videojuegos Favoritos</h1>

    @foreach($juegos as $juego)
        <div class="card">
            <small style="color:#a78bfa">Juego #{{ $loop->index + 1 }}</small>
            <h3>{{ $juego['nombre'] }}</h3>
            <p>Género: {{ $juego['genero'] }}</p>

            {{-- Forma infalible de declarar la variable en Blade --}}
            @php($estrellas = intval($juego['calificacion'] / 2))
            
            <div class="estrellas">
                @for($i = 1; $i <= 5; $i++)
                    {{ $i <= $estrellas ? '⭐' : '☆' }}
                @endfor
                <small style="color: white; font-size: 0.9rem;">({{ $juego['calificacion'] }}/10)</small>
            </div>

            @break($juego['calificacion'] === 10 && !$loop->first)
        </div>
    @endforeach
@endsection