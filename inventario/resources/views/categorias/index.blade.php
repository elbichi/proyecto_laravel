<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
        <a href="{{ route('categorias.create') }}" class="inline-block mb-3 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Nueva Categoría</a>
        @if(session('success'))
            <div class="mb-4 p-2 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
        @endif
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800 rounded shadow">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b dark:border-gray-700 text-left">ID</th>
                        <th class="px-4 py-2 border-b dark:border-gray-700 text-left">Nombre</th>
                        <th class="px-4 py-2 border-b dark:border-gray-700 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                    <tr class="border-b dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <td class="px-4 py-2">{{ $categoria->id }}</td>
                        <td class="px-4 py-2">{{ $categoria->nombre }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('categorias.show', $categoria->id) }}" class="inline-block px-3 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600 transition">Ver</a>
                            <a href="{{ route('categorias.edit', $categoria->id) }}" class="inline-block px-3 py-1 bg-yellow-500 text-white text-xs rounded hover:bg-yellow-600 transition">Editar</a>
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="inline-block px-3 py-1 bg-red-600 text-white text-xs rounded hover:bg-red-700 transition" onclick="return confirm('Eliminar?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>    
            </table>
        </div>
    </div>
</x-app-layout>