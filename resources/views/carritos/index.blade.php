<x-app-layout>
    <div class="container mx-auto mt-10 px-4">
        <h2 class="text-3xl font-bold text-indigo-700 mb-6 text-center">🛒 Lista de Carritos</h2>

        @if($carritos->isEmpty())
            <div class="bg-blue-100 border border-blue-300 text-blue-800 px-4 py-4 rounded-lg text-center shadow-sm">
                <i class="fas fa-info-circle mr-2"></i> No hay carritos registrados.
            </div>
        @else
            <form action="{{ route('ventas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="overflow-x-auto rounded-xl shadow-lg border border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700">
                        <thead class="bg-indigo-600 text-black">
                            <tr>
                                <th class="px-6 py-3 text-left font-semibold">ID</th>
                                <th class="px-6 py-3 text-left font-semibold">Usuario</th>
                                <th class="px-6 py-3 text-left font-semibold">Producto</th>
                                <th class="px-6 py-3 text-left font-semibold">Cantidad</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach ($carritos as $carrito)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">{{ $carrito->id }}</td>
                                    <td class="px-6 py-4">{{ $carrito->user->name }}</td>
                                    <td class="px-6 py-4">{{ $carrito->producto->nombre }}</td>
                                    <td class="px-6 py-4">{{ $carrito->cantidad }}</td>

                                    <input type="hidden" name="productos[{{ $loop->index }}][id]" value="{{ $carrito->producto->id }}">
                                    <input type="hidden" name="productos[{{ $loop->index }}][cantidad]" value="{{ $carrito->cantidad }}">
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="flex justify-between items-center">
                    <a href="{{ route('productos.index') }}" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-black font-medium rounded-lg shadow">
                        <i class="fas fa-plus-circle mr-2"></i> Agregar más Productos
                    </a>
                </div>

                <div>
                    <label for="ticket" class="block text-sm font-medium text-gray-700 mb-1">📄 Subir ticket bancario (imagen):</label>
                    <input type="file" name="ticket" id="ticket" class="block w-full text-sm text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-700" required>
                    @error('ticket')
                        <small class="text-red-600">{{ $message }}</small>
                    @enderror
                </div>

                <div class="flex justify-start items-center gap-x-2 mt-4">
                    <button type="submit" class="inline-flex items-center px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-black font-semibold rounded-lg shadow">
                        <i class="fas fa-shopping-cart mr-2"></i> Finalizar Compra
                    </button>
                    
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-6 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold rounded-lg shadow">
                        <i class="fas fa-arrow-left mr-2"></i> Cancelar
                    </a>
                </div>
            </form>
        @endif
    </div>
</x-app-layout>
