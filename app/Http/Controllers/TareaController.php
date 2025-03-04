<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea; // Asegúrate de importar el modelo

class TareaController extends Controller
{
    public function index()
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
    }
}
