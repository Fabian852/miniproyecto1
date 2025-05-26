<x-app-layout>
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <h2 class="text-2xl font-bold text-blue-700 mb-6 border-b pb-2">Editar Venta</h2>

        <form action="{{ route('ventas.update', $venta->id) }}" method="POST" class="bg-white shadow-lg rounded-lg p-6 space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="id" class="block text-sm font-medium text-gray-700 mb-1">ID de la Venta</label>
                <input type="text" class="block w-full bg-gray-100 border border-gray-300 rounded-md px-3 py-2 text-gray-700" value="{{ $venta->id }}" readonly>
            </div>

            <div>
                <label for="user" class="block text-sm font-medium text-gray-700 mb-1">Comprador</label>
                <input type="text" class="block w-full bg-gray-100 border border-gray-300 rounded-md px-3 py-2 text-gray-700" value="{{ $venta->usuario->name }}" readonly>
            </div>

            <div>
                <label for="total" class="block text-sm font-medium text-gray-700 mb-1">Total</label>
                <input type="text" class="block w-full bg-gray-100 border border-gray-300 rounded-md px-3 py-2 text-gray-700" value="${{ number_format($venta->total, 2) }}" readonly>
            </div>

            <div>
                <label for="estado" class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                <select name="estado" id="estado" class="block w-full border border-gray-300 rounded-md px-3 py-2 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="pendiente" {{ $venta->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="validada" {{ $venta->estado == 'validada' ? 'selected' : '' }}>Validada</option>
                </select>
            </div>

            <div class="flex justify-between pt-4">
                <button type="submit" class="inline-flex items-center bg-green-600 hover:bg-green-700 text-black font-medium py-2 px-4 rounded-md shadow">
                    <i class="fas fa-save mr-2"></i> Guardar Cambios
                </button>
                <a href="{{ route('ventas.index') }}" class="inline-flex items-center border border-gray-300 hover:bg-gray-100 text-black py-2 px-4 rounded-md shadow">
                    <i class="fas fa-arrow-left mr-2"></i> Volver
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
