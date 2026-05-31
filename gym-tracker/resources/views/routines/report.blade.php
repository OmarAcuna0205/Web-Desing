<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Rutinas - Gym Tracker</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; color: #333; }
        .header { text-align: center; border-bottom: 2px solid #333; padding-bottom: 10px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; font-size: 14px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; vertical-align: top; }
        th { background-color: #f4f4f4; }
        .btn-print { padding: 10px 20px; background-color: #000; color: #fff; border: none; cursor: pointer; font-size: 16px; margin-bottom: 20px;}
        
        /* Estilos para que la lista de ejercicios se vea limpia */
        .exercise-list { margin: 0; padding-left: 20px; }
        .exercise-list li { margin-bottom: 5px; }
        
        /* Ocultar el botón al momento de imprimir */
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>

    <button onclick="window.print()" class="btn-print no-print">Imprimir Reporte / Guardar PDF</button>

    <div class="header">
        <h1>Reporte de Rutinas - Gym Tracker</h1>
        <p>Fecha de generación: {{ date('d/m/Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="25%">Nombre de la Rutina</th>
                <th width="15%">Día</th>
                <th width="55%">Ejercicios a realizar</th>
            </tr>
        </thead>
        <tbody>
            @forelse($routines as $routine)
                <tr>
                    <td><strong>{{ $routine->nombre }}</strong></td>
                    <td>{{ $routine->dia }}</td>
                    <td>
                        @if($routine->exercises->count() > 0)
                            <ul class="exercise-list">
                                @foreach($routine->exercises as $exercise)
                                    <li><strong>{{ $exercise->nombre }}</strong> &mdash; {{ $exercise->series }} series de {{ $exercise->repeticiones }} reps</li>
                                @endforeach
                            </ul>
                        @else
                            <em style="color: #888;">Sin ejercicios registrados en esta rutina.</em>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center; padding: 20px;">No hay rutinas registradas para este filtro.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>