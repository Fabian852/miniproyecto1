<x-app-layout>
    <div class="max-w-7xl mx-auto p-6 space-y-8">
        <!-- Título principal -->
        <div class="flex items-center justify-between">
            <h2 class="text-3xl font-extrabold text-gray-800 flex items-center gap-3">
                <i class="fas fa-chart-line text-blue-600 text-2xl"></i>
                Dashboard Administrativo
            </h2>
            <span class="text-sm text-gray-400">Actualizado: {{ now()->format('d/m/Y H:i') }}</span>
        </div>

        <!-- Tarjetas estadísticas -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-2xl shadow-md border-t-4 border-blue-600">
                <p class="text-gray-500 text-sm mb-1">Usuarios Registrados</p>
                <p class="text-3xl font-bold text-blue-700">{{ $totalUsuarios }}</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-md border-t-4 border-green-600">
                <p class="text-gray-500 text-sm mb-1">Vendedores</p>
                <p class="text-3xl font-bold text-green-700">{{ $vendedores }}</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-md border-t-4 border-cyan-600">
                <p class="text-gray-500 text-sm mb-1">Compradores</p>
                <p class="text-3xl font-bold text-cyan-700">{{ $compradores }}</p>
            </div>
        </div>

        <!-- Productos por categoría y producto más vendido -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h4 class="text-lg font-semibold text-gray-800 flex items-center gap-2 mb-4">
                    <i class="fas fa-boxes text-indigo-600"></i>
                    Productos por Categoría
                </h4>
                <table class="min-w-full text-sm text-left border border-gray-200 rounded overflow-hidden">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="p-2">Categoría</th>
                            <th class="p-2">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categoriasConConteo as $categoria)
                            <tr class="hover:bg-gray-50">
                                <td class="p-2 border-t">{{ $categoria->nombre }}</td>
                                <td class="p-2 border-t">{{ $categoria->productos_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md">
                <h4 class="text-lg font-semibold text-gray-800 flex items-center gap-2 mb-4">
                    <i class="fas fa-star text-yellow-500"></i>
                    Producto Más Vendido
                </h4>
                @if ($productoMasVendido)
                    <div class="p-4 bg-green-100 text-green-800 rounded">
                        <strong>{{ $productoMasVendido->nombre }}</strong> con <strong>{{ $productoMasVendido->total_vendido }}</strong> unidades vendidas.
                    </div>
                @else
                    <div class="p-4 bg-yellow-100 text-yellow-800 rounded">
                        No hay productos vendidos aún.
                    </div>
                @endif
            </div>
        </div>

        <!-- Comprador frecuente por categoría -->
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h4 class="text-lg font-semibold text-gray-800 flex items-center gap-2 mb-4">
                <i class="fas fa-user-tag text-purple-600"></i>
                Comprador Más Frecuente por Categoría
            </h4>
            <table class="min-w-full text-sm text-left border border-gray-200 rounded overflow-hidden">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="p-2">Categoría</th>
                        <th class="p-2">Comprador</th>
                        <th class="p-2">Compras</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($compradoresFrecuentes as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="p-2 border-t">{{ $item['categoria'] }}</td>
                            <td class="p-2 border-t">{{ $item['comprador'] }}</td>
                            <td class="p-2 border-t">{{ $item['compras'] }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-gray-500 p-4">No hay compras registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
