<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalles del Usuario') }}
        </h2>
    </x-slot>
    <div class="max-w-md mx-auto bg-white dark:bg-gray-800 p-6 rounded shadow mt-6">
        <p class="mb-2"><span class="font-bold text-gray-700 dark:text-gray-200">ID:</span> {{ $usuario->id }}</p>
        <p class="mb-2"><span class="font-bold text-gray-700 dark:text-gray-200">Nombre:</span> {{ $usuario->name }}</p>
        <p class="mb-2"><span class="font-bold text-gray-700 dark:text-gray-200">Email:</span> {{ $usuario->email }}</p>
        <p class="mb-2"><span class="font-bold text-gray-700 dark:text-gray-200">Rol:</span> 
            <span class="px-2 py-1 text-xs rounded-full 
                {{ $usuario->role === 'admin' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800' }}">
                {{ ucfirst($usuario->role) }}
            </span>
        </p>
        <div class="flex space-x-2">
            <a href="{{ route('usuarios.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">Volver</a>
        </div>
    </div>
</x-app-layout>
    