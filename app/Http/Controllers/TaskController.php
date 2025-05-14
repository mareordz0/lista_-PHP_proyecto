<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $activeTasks    = $user->tasks()->where('is_completed', false)->orderBy('created_at','desc')->get();
        $completedTasks = $user->tasks()->where('is_completed', true)->orderBy('updated_at','desc')->get();
        return view('tasks.index', compact('activeTasks', 'completedTasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable'
        ]);
    
        auth()->user()->tasks()->create($data);
    
        return redirect()->route('tasks.index')
                        ->with('success', 'Tarea creada.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        // $this->authorize('update', $task);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        // Si viene el botón “Completar”, sólo marcamos completada
        if ($request->has('is_completed')) {
            $task->update(['is_completed' => true]);
            return redirect()->route('tasks.index')
                            ->with('success', 'Tarea marcada como completada.');
        }

        // Si no, es edición de título/desc
        $data = $request->validate([
            'title'       => 'required|max:255',
            'description' => 'nullable',
        ]);

        $task->update($data);

        return redirect()->route('tasks.index')
                        ->with('success', 'Tarea actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada.');
    }
}
