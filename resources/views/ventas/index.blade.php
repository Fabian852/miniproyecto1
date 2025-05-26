<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-blue-700">Lista de Ventas</h2>
            @can('create', App\Models\Venta::class)
                <a href="{{ route('ventas.create') }}" class="inline-flex items-center bg-green-600 hover:bg-green-700 text-black font-medium py-2 px-4 rounded-md shadow-sm transition">
                    <i class="fas fa-plus-circle mr-2"></i> Crear Venta
                </a>
            @endcan
        </div>

        @if($ventas->isEmpty())
            <div class="bg-blue-50 border border-blue-200 text-blue-700 px-6 py-4 rounded-md text-center shadow">
                <i class="fas fa-info-circle mr-2"></i> No hay ventas registradas.
            </div>
        @else
            <div class=" bg-white shadow-md rounded-lg">
                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Usuario</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Total</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Estado</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Ticket</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Fecha</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($ventas as $venta)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $venta->id }}</td>
                                <td class="px-6 py-4">{{ $venta->usuario->name }}</td>
                                <td class="px-6 py-4">${{ number_format($venta->total, 2) }}</td>
                                <td class="px-6 py-4">
                                    <span class="inline-block px-2 py-1 rounded-full text-xs font-medium
                                        {{ $venta->estado === 'aprobado' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ ucfirst($venta->estado) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    @if($venta->ticket)
                                        <a href="{{ route('ventas.ticket', $venta->id) }}" target="_blank" class="text-blue-600 hover:underline">Ver ticket</a>
                                    @else
                                        <span class="text-gray-500">Sin ticket</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">{{ $venta->created_at->format('d-m-Y') }}</td>
                                <td class="px-6 py-4 text-center space-x-2">
                                    @can('update', $venta)
                                        <a href="{{ route('ventas.edit', $venta->id) }}" class="inline-flex items-center px-3 py-1 bg-yellow-400 hover:bg-yellow-500 text-black text-sm rounded-md shadow">
                                            <i class="fas fa-edit mr-1"></i> Editar
                                        </a>
                                    @endcan
                                    @can('delete', $venta)
                                        <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('¿Estás seguro?')" class="inline-flex items-center px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-sm rounded-md shadow">
                                                <i class="fas fa-trash-alt mr-1"></i> Eliminar
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>
