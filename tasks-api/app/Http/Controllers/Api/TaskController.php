<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // GET: Lista de registros
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks, 200);
    }

    // POST: Creación de registro
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $task = Task::create($request->all());
        return response()->json($task, 201);
    }

    // GET: Mostrar un solo registro
    public function show(string $id)
    {
        $task = Task::findOrFail($id);
        return response()->json($task, 200);
    }

    // PUT/PATCH: Actualización de registro
    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        
        return response()->json($task, 200);
    }

    // DELETE: Eliminación de registro
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(['message' => 'Tarea eliminada con éxito'], 200);
    }
}