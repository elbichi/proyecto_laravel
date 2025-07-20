<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Categoría') }}
        </h2>
    </x-slot>
    <div class="max-w-md mx-auto bg-white dark:bg-gray-800 p-6 rounded shadow mt-6"
    
        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">Nombre</label>
                <input type="text" name="nombre" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-700 dark:text-white" value="{{ $categoria->nombre }}" required>
            </div>
            <div class="flex space-x-2">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Actualizar</button>
                <a href="{{ route('categorias.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">Volver</a>
            </div>
        </form>
    </div>
</x-app-layout>