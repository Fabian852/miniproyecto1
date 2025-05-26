<x-app-layout>
    @if(auth()->user()->role === 'gerente' || auth()->user()->role === 'empleado')
        <div class="container mx-auto mt-10 px-4 max-w-6xl">
            <div class="flex justify-between max-w-5xl mx-auto mt-10 px-4 py-3 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-indigo-700">📂 Lista de Categorías</h2>
                <a href="{{ route('categorias.create') }}" class="inline-flex items-center px-6 py-2 bg-green-600 hover:bg-green-700 text-black font-semibold rounded-lg shadow">
                    <i class="fas fa-plus-circle mr-2"></i> Crear Categoría
                </a>
            </div>

            @if(session('success'))
                <div class="mb-6 px-4 py-3 bg-green-100 border border-green-400 text-green-700 rounded-lg shadow relative" role="alert">
                    {{ session('success') }}
                    <button type="button" onclick="this.parentElement.style.display='none';" class="absolute top-2 right-3 text-green-700 hover:text-green-900 focus:outline-none" aria-label="Close">
                        &times;
                    </button>
                </div>
            @endif

            @if($categorias->isEmpty())
                <div class="bg-blue-50 border border-blue-300 text-blue-800 px-6 py-4 rounded-lg text-center shadow">
                    <i class="fas fa-info-circle mr-2"></i> No hay categorías registradas.
                </div>
            @else
                <div class="rounded-xl shadow-lg border border-gray-200">
                    <table class="w-full divide-y divide-gray-200 text-gray-700">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Descripción</th>
                                <th class="px-6 py-3 text-center text-sm font-semibold">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach ($categorias as $categoria)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $categoria->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">{{ $categoria->nombre }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $categoria->descripcion }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm space-x-2">
                                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="inline-flex items-center px-3 py-1.5 bg-yellow-400 hover:bg-yellow-500 text-black rounded-lg shadow text-sm font-semibold">
                                            <i class="fas fa-edit mr-1"></i> Editar
                                        </a>
                                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    onclick="return confirm('¿Estás seguro?')" 
                                                    class="inline-flex items-center px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white rounded-lg shadow text-sm font-semibold">
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
        <div class="container mx-auto mt-10 px-4 max-w-3xl">
            <h2 class="text-xl font-semibold text-red-600 mb-4 text-center">
                ⚠️ No tienes permiso para acceder a esta página.
            </h2>
        </div>
    @endif
</x-app-layout>
