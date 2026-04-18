<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class UsuarioController extends Controller
{
    public function dashboard() {
        $misTickets = Ticket::where('cliente_email', auth()->user()->email)
            ->orderBy('fecha_reporte', 'desc')
            ->take(5)->get();
        return view('usuario.dashboard', compact('misTickets'));
    }

    public function index() {
        $tickets = Ticket::where('cliente_email', auth()->user()->email)
            ->orderBy('fecha_reporte', 'desc')->get();
        return view('usuario.tickets.index', compact('tickets'));
    }

    public function create() {
        return view('usuario.tickets.create');
    }

    public function store(Request $request) {
        $datos = $request->validate([
            'descripcion_corta' => 'required|max:255',
            'categoria' => 'required|in:software,hardware,comunicaciones,plataformas,email,otro',
            'nivel_urgencia' => 'required|in:baja,media,alta,critica',
            'descripcion_detallada' => 'nullable',
            'departamento' => 'required|max:100',
            'attachments.*' => 'nullable|file|max:10240', 
        ]);

        $datos['numero_reporte'] = 'TKT-' . date('Y') . '-' . str_pad(Ticket::count() + 1, 4, '0', STR_PAD_LEFT);
        $datos['cliente_nombre'] = auth()->user()->name;
        $datos['cliente_email'] = auth()->user()->email;
        $datos['fecha_reporte'] = now();
        $datos['status'] = 'pendiente';

        // 1. Creamos el ticket
        $ticket = Ticket::create($datos);

        // 2. Procesamos los archivos e IA
        if ($request->hasFile('attachments')) {
            $primeraImagenPath = null; 

            foreach ($request->file('attachments') as $file) {
                $path = $file->store('ticket-attachments', 'public');
                $mime = $file->getMimeType();
                
                $ticket->attachments()->create([
                    'original_name' => $file->getClientOriginalName(),
                    'file_path'     => $path,
                    'mime_type'     => $mime,
                    'size'          => $file->getSize(),
                    'type'          => str_starts_with($mime, 'image/') ? 'image' : 'document',
                ]);

                // Guardamos la ruta física de la primera imagen encontrada para la IA
                if (!$primeraImagenPath && str_starts_with($mime, 'image/')) {
                    $primeraImagenPath = storage_path('app/public/' . $path);
                }
            }

            // 3. Llamada a Hugging Face (Solo si hay imagen y Token)
            if ($primeraImagenPath && env('HF_API_TOKEN')) {
                try {
                    $response = Http::withoutVerifying()
                        ->timeout(30)
                        ->withHeaders([
                            'Authorization' => 'Bearer ' . env('HF_API_TOKEN'),
                        ])->post('https://api-inference.huggingface.co/models/microsoft/Florence-2-large', [
                            'inputs' => base64_encode(file_get_contents($primeraImagenPath)),
                            'parameters' => ['prompt' => '<MORE_DETAILED_CAPTION>']
                        ]);

                    $result = $response->json();
                    
                    if ($response->successful() && isset($result[0]['generated_text'])) {
                        $ticket->update(['ai_analysis' => $result[0]['generated_text']]);
                    }
                } catch (\Exception $e) {
                    // Si la IA falla, el ticket se queda con ai_analysis en null
                }
            }
        }

        return redirect()->route('usuario.tickets.index')
            ->with('success', 'Ticket creado exitosamente.');
    }

    public function show(Ticket $ticket) {
        if ($ticket->cliente_email !== auth()->user()->email) {
            abort(403, 'No tienes acceso a este ticket.');
        }
        return view('usuario.tickets.show', compact('ticket'));
    }
}