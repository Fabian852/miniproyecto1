<x-app-layout>
    @if(auth()->user()->role === 'gerente' || auth()->user()->role === 'empleado' || auth()->user()->subrol === 'vendedor')
        <div class="flex justify-center items-center min-h-screen bg-gray-50 px-6 sm:px-12 lg:px-24">
            <div class="w-full max-w-2xl bg-white p-4 rounded-lg shadow-lg">
                <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Nuevo Producto</h1>

                <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    <!-- Nombre -->
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" name="nombre" id="nombre" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Descripción -->
                    <div>
                        <label for="descripcion" class="block text-sm font-medium text-gray-700 py-4">Descripción</label>
                        <textarea name="descripcion" id="descripcion" required rows="4"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 resize-none"></textarea>
                    </div>

                    <!-- Precio -->
                    <div>
                        <label for="precio" class="block text-sm font-medium text-gray-700 py-4">Precio</label>
                        <input type="number" step="0.01" name="precio" id="precio" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Stock -->
                    <div>
                        <label for="stock" class="block text-sm font-medium text-gray-700 py-4">Stock</label>
                        <input type="number" name="stock" id="stock" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Imágenes -->
                    <div>
                        <label for="imagenes" class="block text-sm font-medium text-gray-700 py-2">Imágenes</label>
                        <input type="file" name="imagenes[]" id="imagenes" multiple required
                            class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4
                                file:rounded-md file:border-0 file:text-sm file:font-semibold
                                file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>

                    <!-- Botón -->
                    <div class="text-right">
                        <button type="submit"
                            class="bg-green-600 text-black px-6 py-2 rounded-md shadow hover:bg-green-700 transition">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @else 
        <div class="max-w-xl mx-auto mt-20 text-center">
            <h2 class="text-2xl font-semibold text-red-600">No puedes estar aquí.</h2>
        </div>
    @endif
</x-app-layout>
