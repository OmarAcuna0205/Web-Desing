<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model {
    use HasFactory;

    /**
     * Tabla asociada al modelo.
     */
    protected $table = 'tickets';

    /**
     * Campos que PUEDEN ser asignados masivamente.
     */
    protected $fillable = [
        'numero_reporte',
        'cliente_nombre',
        'cliente_email',
        'departamento',
        'categoria',
        'nivel_urgencia',
        'descripcion_corta',
        'descripcion_detallada',
        'tecnico_asignado',
        'fecha_reporte',
        'fecha_promesa',
        'fecha_resolucion',
        'comentarios_tecnico',
        'status',
    ];

    /**
     * Casting automatico de tipos.
     */
    protected $casts = [
        'fecha_reporte' => 'datetime',
        'fecha_promesa' => 'datetime',
        'fecha_resolucion' => 'datetime',
    ];

    public function attachments()
    {
        return $this->hasMany(TicketAttachment::class);
    }

}