<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketWebController extends Controller
{
    // GET /tickets
    public function index()
    {
        $tickets = Ticket::orderBy('fecha_reporte', 'desc')->get();
        return view('tickets.index', compact('tickets'));
    }

    // GET /tickets/create
    public function create()
    {
        return view('tickets.create');
    }

    // POST /tickets
    public function store(Request $request)
    {
        Ticket::create($request->all());
        return redirect()->route('tickets.index')
            ->with('success', 'Ticket creado exitosamente.');
    }

    // GET /tickets/{ticket}
    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    // GET /tickets/{ticket}/edit
    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }

    // PUT/PATCH /tickets/{ticket}
    public function update(Request $request, Ticket $ticket)
    {
        $ticket->update($request->all());
        return redirect()->route('tickets.index')
            ->with('success', 'Ticket actualizado correctamente.');
    }

    // DELETE /tickets/{ticket}
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')
            ->with('success', 'Ticket eliminado.');
    }

    // PATCH /tickets/{ticket}/close (MÉTODO DEL EXAMEN PARCIAL 2)
    public function close(Ticket $ticket)
    {
        // PUNTOS EXTRAS: Validación del estado actual del ticket
        if ($ticket->status !== 'pendiente' && $ticket->status !== 'en_curso') {
            return back()->with('error', 'Solo se puede cerrar un ticket que esté pendiente o en curso.');
        }

        // REQUISITOS OBLIGATORIOS: Cambiar status y asignar la fecha actual
        $ticket->update([
            'status' => 'finalizada',
            'fecha_resolucion' => now()
        ]);

        // Redirigir con mensaje de éxito
        return back()->with('success', 'Ticket cerrado exitosamente.');
    }
}