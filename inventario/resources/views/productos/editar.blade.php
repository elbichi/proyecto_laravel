<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Producto') }}
        </h2>
    </x-slot>

    <div class="max-w-md mx-auto bg-white dark:bg-gray-800 p-6 rounded shadow mt-6">
        <form action="{{ route('productos.update', $producto->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200 mb-2">Nombre:</label>
                <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}" 
                    class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200 mb-2">Categoría:</label>
                <select name="categoria_id" class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white">
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" 
                            {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200 mb-2">Subcategoría:</label>
                <select name="subcategoria_id" class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white">
                    @foreach ($subcategorias as $subcategoria)
                        <option value="{{ $subcategoria->id }}" 
                            {{ $producto->subcategoria_id == $subcategoria->id ? 'selected' : '' }}>
                            {{ $subcategoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-between">
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    Actualizar
                </button>
                <a href="{{ route('productos.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                    Volver
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
