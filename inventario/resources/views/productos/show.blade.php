<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalles del Producto') }}
        </h2>
    </x-slot>

    <div class="max-w-md mx-auto bg-white dark:bg-gray-800 p-6 rounded shadow mt-6">
        <p class="mb-2">
            <span class="font-bold text-gray-700 dark:text-gray-200">ID:</span>
            {{ $producto->id }}
        </p>

        <p class="mb-2">
            <span class="font-bold text-gray-700 dark:text-gray-200">Nombre:</span>
            {{ $producto->nombre }}
        </p>

        <p class="mb-2">
            <span class="font-bold text-gray-700 dark:text-gray-200">Categoría:</span>
            {{ $producto->categoria->nombre ?? 'No definida' }}
        </p>

        <p class="mb-4">
            <span class="font-bold text-gray-700 dark:text-gray-200">Subcategoría:</span>
            {{ $producto->subcategoria->nombre ?? 'No definida' }}
        </p>

        <a href="{{ route('productos.index') }}"
           class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
            Volver
        </a>
    </div>
</x-app-layout>
