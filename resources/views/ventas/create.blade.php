<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">Confirmar Compra</h2>

        <form action="{{ route('ventas.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6 space-y-6">
            @csrf

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Producto</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Cantidad</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Precio unitario</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @php $total = 0; @endphp
                        @foreach($carritos as $item)
                            @php
                                $subtotal = $item->producto->precio * $item->cantidad;
                                $total += $subtotal;
                            @endphp
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item->producto->nombre }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item->cantidad }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">${{ number_format($item->producto->precio, 2) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">${{ number_format($subtotal, 2) }}</td>
                            </tr>

                            <!-- Campos ocultos -->
                            <input type="hidden" name="productos[{{ $loop->index }}][id]" value="{{ $item->producto->id }}">
                            <input type="hidden" name="productos[{{ $loop->index }}][cantidad]" value="{{ $item->cantidad }}">
                        @endforeach
                    </tbody>
                    <tfoot class="bg-gray-100">
                        <tr>
                            <th colspan="3" class="text-right px-6 py-4 text-gray-700 font-semibold">Total:</th>
                            <th class="px-6 py-4 text-gray-900">${{ number_format($total, 2) }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div>
                <label for="ticket" class="block text-sm font-medium text-gray-700 mb-1">Subir Ticket Bancario</label>
                <input type="file" name="ticket" id="ticket" class="block w-full text-sm text-gray-900 file:mr-4 file:py-2 file:px-4
                    file:rounded-lg file:border-0 file:text-sm file:font-semibold
                    file:bg-blue-50 file:text-blue-700
                    hover:file:bg-blue-100" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition">
                    Finalizar Compra
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
