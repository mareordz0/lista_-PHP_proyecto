@extends('layouts.app')

@section('content')
  <h1 class="text-2xl font-bold mb-4">Crear Tarea</h1>

  <form action="{{ route('tasks.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
    @csrf

    <div>
      <label class="block font-medium">Título</label>
      <input type="text" name="title"
             class="w-full border rounded px-3 py-2"
             value="{{ old('title') }}" required>
      @error('title')
        <p class="text-red-600 text-sm">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label class="block font-medium">Descripción</label>
      <textarea name="description"
                class="w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
    </div>

    <div class="flex space-x-4">
      <a href="{{ route('tasks.index') }}"
         class="px-4 py-2 bg-gray-400 text-white rounded">Cancelar</a>
      <button type="submit"
              class="px-4 py-2 bg-blue-600 text-white rounded">Guardar</button>
    </div>
  </form>
@endsection
