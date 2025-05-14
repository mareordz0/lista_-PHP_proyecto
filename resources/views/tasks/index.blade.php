@extends('layouts.app')

@section('content')
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold text-white bg-gray-800 px-3 py-1 rounded">Mis Tareas</h1>
    <a href="{{ route('tasks.create') }}"
       class="px-4 py-2 bg-blue-600 text-white rounded">Nueva Tarea</a>
  </div>

  {{-- Tareas Activas --}}
  <h2 class="text-xl mt-6 text-white bg-green-600 px-2 py-1 rounded">Activas</h2>
  <ul class="space-y-2 mt-2">
    @forelse ($activeTasks as $task)
      <li class="p-4 bg-white rounded shadow flex justify-between items-center">
        <div>
          <strong class="text-gray-900">{{ $task->title }}</strong>
          @if($task->description)
            <p class="text-gray-600">{{ $task->description }}</p>
          @endif
        </div>
        <div class="flex items-center space-x-2">
          <!-- Completar -->
          <form action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf @method('PUT')
            <input type="hidden" name="is_completed" value="1">
            <button type="submit" class="text-green-600 hover:underline">Completar</button>
          </form>
          <!-- Editar -->
          <a href="{{ route('tasks.edit', $task) }}"
             class="text-blue-600 hover:underline">Editar</a>
          <!-- Borrar -->
          <form action="{{ route('tasks.destroy', $task) }}" method="POST">
            @csrf @method('DELETE')
            <button type="submit"
                    class="text-red-600 hover:underline"
                    onclick="return confirm('¿Eliminar tarea?')">Borrar</button>
          </form>
        </div>
      </li>
    @empty
      <li class="text-gray-200">No hay tareas activas.</li>
    @endforelse
  </ul>

  {{-- Tareas Completadas --}}
  <h2 class="text-xl mt-8 text-white bg-blue-600 px-2 py-1 rounded">Completadas</h2>
  <ul class="space-y-2 mt-2">
    @forelse ($completedTasks as $task)
      <li class="p-4 bg-gray-200 rounded flex justify-between items-center">
        <div>
          <strong class="text-gray-900 line-through">{{ $task->title }}</strong>
          @if($task->description)
            <p class="text-gray-600">{{ $task->description }}</p>
          @endif
          <span class="text-sm text-gray-600">Completada el {{ $task->updated_at->format('d/m/Y') }}</span>
        </div>
        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
          @csrf @method('DELETE')
          <button type="submit"
                  class="text-red-600 hover:underline"
                  onclick="return confirm('¿Eliminar tarea completada?')">Borrar</button>
        </form>
      </li>
    @empty
      <li class="text-gray-200">No hay tareas completadas.</li>
    @endforelse
  </ul>
@endsection