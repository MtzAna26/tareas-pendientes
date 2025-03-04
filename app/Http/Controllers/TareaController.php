<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea; // Asegúrate de importar el modelo

class TareaController extends Controller
{
    /*public function index()
    {
        $tareas = Tarea::all();
        return view('tareas.index', compact('tareas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        Tarea::create([
            'title' => $request->title,
            'completed' => false
        ]);

        return redirect()->route('tareas.index');
    }

    public function update(Tarea $tarea)
    {
        $tarea->update(['completed' => true]);
        return redirect()->route('tareas.index');
    }

    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return redirect()->route('tareas.index');
    }*/
    public function index()
    {
        // Obtener las tareas del usuario autenticado
        $tareas = auth()->user()->tareas;  // Relación con el usuario

        return view('tareas.index', compact('tareas'));
    }

    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // Crear una nueva tarea asociada al usuario autenticado
        auth()->user()->tareas()->create([
            'title' => $request->title,
            'completed' => false,  // Estado inicial de la tarea
        ]);

        return redirect()->route('tareas.index');
    }

    public function update(Tarea $tarea)
    {
        // Marcar la tarea como completada
        $tarea->update(['completed' => true]);
        return redirect()->route('tareas.index');
    }

    public function destroy(Tarea $tarea)
    {
        // Eliminar la tarea
        $tarea->delete();
        return redirect()->route('tareas.index');
    }
}
