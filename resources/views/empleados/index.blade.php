<x-app-layout>
    @if(auth()->user()->role === 'gerente')
        <div class="max-w-5xl mx-auto mt-10 px-4 py-3 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-extrabold text-blue-700">Lista de Empleados</h2>
                <a href="{{ route('empleados.create') }}"
                    class="bg-green-600 text-black px-4 py-2 rounded-md shadow hover:bg-green-700 transition duration-300">
                    <i class="fas fa-user-plus mr-2"></i> Crear Empleado
                </a>
            </div>

            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    <strong class="font-bold">Éxito:</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if($empleados->isEmpty())
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded text-center">
                    <i class="fas fa-info-circle mr-2"></i> No hay empleados registrados.
                </div>
            @else
                <div class="bg-white shadow-md rounded-lg">
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="bg-gray-800 text-white text-center">
                            <tr>
                                <th class="px-6 py-3 text-sm font-semibold tracking-wider">ID</th>
                                <th class="px-6 py-3 text-sm font-semibold tracking-wider">Nombre</th>
                                <th class="px-6 py-3 text-sm font-semibold tracking-wider">Email</th>
                                <th class="px-6 py-3 text-sm font-semibold tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 text-center">
                            @foreach ($empleados as $empleado)
                                <tr>
                                    <td class="px-6 py-4">{{ $empleado->id }}</td>
                                    <td class="px-6 py-4 text-left">{{ $empleado->name }}</td>
                                    <td class="px-6 py-4 text-left">{{ $empleado->email }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('empleados.edit', $empleado->id) }}"
                                                class="bg-yellow-600 text-black px-3 py-1 rounded shadow hover:bg-yellow-500 transition">
                                                <i class="fas fa-edit"></i> Editar
                                            </a>

                                            <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST"
                                                    onsubmit="return confirm('¿Estás seguro?')" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-600 text-white px-3 py-1 rounded shadow hover:bg-red-700 transition">
                                                    <i class="fas fa-trash-alt"></i> Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    @else 
        <div class="max-w-xl mx-auto mt-20 p-6 bg-red-100 border border-red-400 text-red-700 rounded-lg shadow-md text-center">
            <h2 class="text-2xl font-bold mb-2">Acceso Denegado</h2>
            <p>No deberías estar aquí.</p>
        </div>
    @endif
</x-app-layout>
