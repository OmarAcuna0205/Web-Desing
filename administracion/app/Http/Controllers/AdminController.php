<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return "HOLA JEFE. Bienvenido al panel de Administrador.";  
    }
}
