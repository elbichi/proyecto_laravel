<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
        <a href="{{ route('usuarios.create') }}" class="inline-block mb-3 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Nuevo Usuario</a>
        @if(session('success'))
            <div class="mb-4 p-2 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="mb-4 p-2 bg-red-100 text-red-800 rounded">{{ session('error') }}</div>
        @endif
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800 rounded shadow">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b dark:border-gray-700 text-left">ID</th>
                        <th class="px-4 py-2 border-b dark:border-gray-700 text-left">Nombre</th>
                        <th class="px-4 py-2 border-b dark:border-gray-700 text-left">Email</th>
                        <th class="px-4 py-2 border-b dark:border-gray-700 text-left">Rol</th>
                        <th class="px-4 py-2 border-b dark:border-gray-700 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($usuarios as $usuario)
                    <tr class="border-b dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <td class="px-4 py-2">{{ $usuario->id }}</td>
                        <td class="px-4 py-2">{{ $usuario->name }}</td>
                        <td class="px-4 py-2">{{ $usuario->email }}</td>
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 text-xs rounded-full 
                                {{ $usuario->role === 'admin' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800' }}">
                                {{ ucfirst($usuario->role) }}
                            </span>
                        </td>
            
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('usuarios.show', $usuario->id) }}" class="inline-block px-3 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600 transition">Ver</a>
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="inline-block px-3 py-1 bg-yellow-500 text-white text-xs rounded hover:bg-yellow-600 transition">Editar</a>
                            @if($usuario->id !== auth()->id())
                            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="inline-block px-3 py-1 bg-red-600 text-white text-xs rounded hover:bg-red-700 transition" onclick="return confirm('¿Eliminar este usuario?')">Eliminar</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-2 text-center text-gray-500 dark:text-gray-400">No hay usuarios registrados</td>
                    </tr>
                    @endforelse
                </tbody>    
            </table>
        </div>
    </div>
</x-app-layout>