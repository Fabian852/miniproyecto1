<x-app-layout>
    @if(auth()->user()->role === 'gerente' || auth()->user()->role === 'empleado' || auth()->user()->subrol === 'vendedor')
        <div class="flex justify-center items-center min-h-screen bg-gray-50 px-6 sm:px-12 lg:px-24">
            <div class="w-full max-w-2xl bg-white p-4 rounded-lg shadow-lg">
                <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Editar Producto</h1>

                <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <!-- Nombre -->
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $producto->nombre) }}" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Descripción -->
                    <div>
                        <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                        <textarea name="descripcion" id="descripcion" required rows="4"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 resize-none">{{ old('descripcion', $producto->descripcion) }}</textarea>
                    </div>

                    <!-- Precio -->
                    <div>
                        <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
                        <input type="number" step="0.01" name="precio" id="precio" value="{{ old('precio', $producto->precio) }}" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Stock -->
                    <div>
                        <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                        <input type="number" name="stock" id="stock" value="{{ old('stock', $producto->stock) }}" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Imágenes actuales -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Imágenes actuales</label>
                        <div class="flex gap-4 flex-wrap">
                            @foreach ($producto->imagenes ?? [] as $index => $img)
                                <div class="relative w-20 h-20">
                                    <img src="{{ asset('storage/' . $img) }}" alt="Imagen del producto"
                                        class="w-full h-full object-cover rounded-md shadow-sm border">
                                    <label class="absolute top-0 right-0 bg-red-600 text-white text-xs px-2 py-1 rounded-tr-md rounded-bl-md cursor-pointer hover:bg-red-700">
                                        <input type="checkbox" name="imagenes_a_borrar[]" value="{{ $img }}" class="hidden">
                                        ✕
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Nuevas imágenes -->
                    <div>
                        <label for="imagenes" class="block text-sm font-medium text-gray-700">Agregar nuevas imágenes</label>
                        <input type="file" name="imagenes[]" id="imagenes" multiple
                            class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4
                                file:rounded-md file:border-0 file:text-sm file:font-semibold
                                file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>

                    <!-- Categorías -->
                    <div>
                        <label for="categorias" class="block text-sm font-medium text-gray-700">Categorías</label>
                        <select name="categorias[]" id="categorias" multiple
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}"
                                    {{ $producto->categorias->contains($categoria->id) ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}
                                </option>
                            @endforeach
                        </select>
                        <p class="text-xs text-gray-500 mt-1">Usa Ctrl (o Cmd) para seleccionar varias categorías.</p>
                    </div>

                    <!-- Botón -->
                    <div class="text-right">
                        <button type="submit"
                            class="bg-blue-600 text-black px-6 py-2 rounded-md shadow hover:bg-blue-700 transition">
                            Actualizar
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
