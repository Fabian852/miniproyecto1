<x-app-layout>
    @if(auth()->user()->role === 'gerente' || auth()->user()->role === 'empleado')
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-4 mt-3">
            <!-- Encabezado -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-gray-800">Lista de Clientes</h2>
                <a href="{{ route('clientes.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-black text-sm font-semibold rounded-lg shadow hover:bg-green-700 transition">
                    <i class="fas fa-user-plus mr-2"></i> Crear Cliente
                </a>
            </div>

            <!-- Mensaje de éxito -->
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Lista vacía -->
            @if($clientes->isEmpty())
                <div class="p-6 bg-blue-100 text-blue-800 rounded-lg text-center">
                    <i class="fas fa-info-circle mr-2"></i> No hay clientes registrados.
                </div>
            @else
                <!-- Tabla -->
                <div class=" bg-white shadow rounded-lg">
                    <table class="w-full table-auto text-sm border-collapse">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left font-semibold">ID</th>
                                <th class="px-6 py-3 text-left font-semibold">Nombre</th>
                                <th class="px-6 py-3 text-left font-semibold">Email</th>
                                <th class="px-6 py-3 text-left font-semibold">Subrol</th>
                                <th class="px-6 py-3 text-center font-semibold">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td class="px-6 py-4">{{ $cliente->id }}</td>
                                    <td class="px-6 py-4">{{ $cliente->name }}</td>
                                    <td class="px-6 py-4">{{ $cliente->email }}</td>
                                    <td class="px-6 py-4">{{ ucfirst($cliente->subrol) }}</td>
                                    <td class="px-6 py-4 text-center space-x-2">
                                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="inline-flex items-center px-3 py-1 bg-yellow-500 text-black text-xs font-medium rounded hover:bg-yellow-600 transition">
                                            <i class="fas fa-edit mr-1"></i> Editar
                                        </a>
                                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-600 text-white text-xs font-medium rounded hover:bg-red-700 transition">
                                                <i class="fas fa-trash-alt mr-1"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    @else 
        <div class="max-w-xl mx-auto mt-20 text-center">
            <h2 class="text-2xl font-semibold text-red-600">No puedes estar aquí.</h2>
        </div>
    @endif
</x-app-layout>
