<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nueva Subcategoría') }}
        </h2>
    </x-slot>


    <div class="max-w-md mx-auto bg-white dark:bg-gray-800 p-6 rounded shadow mt-6">

        <form action="{{ route('subcategorias.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200 mb-2">Nombre:</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}"  
                class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white">
                
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200 mb-2" for="categoria_id" >Categoría:</label>
                <select name="categoria_id" id="categoria_id"  class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white">
                    <option value="">Selecciona una categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                            {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex space-x-2">
                <button type="submit"
                    class="px-4 py-2 bg-green-500 text-black rounded hover:bg-green-900 transition">Guardar</button>
                <a href="{{ route('categorias.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">Volver</a>
            </div>
        </form>
    </div>
</x-app-layout>
