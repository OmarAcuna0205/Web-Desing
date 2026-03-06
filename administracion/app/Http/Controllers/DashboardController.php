<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return "HOLA USUARIO. Este es el dashboard general para todos.";
    }   
}
