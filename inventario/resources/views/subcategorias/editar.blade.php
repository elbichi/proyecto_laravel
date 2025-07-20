<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Subcategoría') }}
        </h2>
    </x-slot>


    <div class="max-w-md mx-auto bg-white dark:bg-gray-800 p-6 rounded shadow mt-6">
        <form action="{{ route('subcategorias.update', $subcategoria->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200 mb-2" >Nombre:</label>
                <input type="text" name="nombre" value="{{ old('nombre', $subcategoria->nombre) }}" class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white"><br>
            </div>
            <div class="mb-4">
                
                <label class="block text-gray-700 dark:text-gray-200 mb-2">Categoría:</label>
                <select name="categoria_id" class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white">
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                            {{ $subcategoria->categoria_id == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select><br>
            </div>
            <div class="flex space-x-2">
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Actualizar</button>
                <a href="{{ route('subcategorias.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">Volver</a>
            </div>
        </form>
    </div>
</x-app-layout>
