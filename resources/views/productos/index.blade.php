<x-app-layout>
    <div class="container mt-5">
        <div class=" flex justify-between max-w-5xl mx-auto mt-10 px-4 py-3 sm:px-6 lg:px-8">
            <h2 class=" items-center px-4">Lista de Productos</h2>
            @if(auth()->user()->role === 'gerente' || auth()->user()->role === 'empleado' || auth()->user()->subrol === 'vendedor')
                <a href="{{ route('productos.create') }}" class="bg-green-600 text-black px-4 py-2 rounded-md shadow hover:bg-green-700 transition duration-300">
                    <i class="fas fa-plus"></i> Crear Producto
                </a>
            @endif
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($productos->isEmpty())
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle"></i> No hay productos registrados.
            </div>
        @else
            <div class="w-full px-4 bg-white shadow rounded-lg overflow-x-auto">
                <table class="w-full table-auto divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-6 py-3 text-sm font-semibold tracking-wider">ID</th>
                            <th class="px-6 py-3 text-sm font-semibold tracking-wider">Nombre</th>
                            <th class="px-6 py-3 text-sm font-semibold tracking-wider">Descripción</th>
                            <th class="px-6 py-3 text-sm font-semibold tracking-wider">Precio</th>
                            <th class="px-6 py-3 text-sm font-semibold tracking-wider">Stock</th>
                            <th class="px-6 py-3 text-sm font-semibold tracking-wider">Imágenes</th>
                            <th class="px-6 py-3 text-sm font-semibold tracking-wider">Categorías</th>
                            @if(auth()->user()->role === 'gerente' || auth()->user()->role === 'empleado')
                                <th class="px-6 py-3 text-sm font-semibold tracking-wider">Vendedor</th>
                            @endif
                            @if(auth()->user()->role === 'cliente')
                                <th class="px-6 py-3 text-sm font-semibold tracking-wider">Agregar al carrito</th>
                            @endif
                            @if(auth()->user()->role === 'gerente' || auth()->user()->role === 'empleado' || auth()->user()->subrol === 'vendedor')
                                <th class="px-6 py-3 text-sm font-semibold tracking-wider">Acciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                            <tr>
                                <td class="px-4 py-2">{{ $producto->id }}</td>
                                <td class="px-4 py-2">{{ $producto->nombre }}</td>
                                <td class="px-4 py-2">{{ $producto->descripcion }}</td>
                                <td class="px-4 py-2">{{ number_format($producto->precio, 2) }}</td>
                                <td class="px-4 py-2">{{ $producto->stock }}</td>
                                <td class="px-4 py-2">
                                    @if(is_array($producto->imagenes) && count($producto->imagenes) > 0)
                                        @foreach($producto->imagenes as $img)
                                            <img src="{{ asset('storage/' . $img) }}" alt="Imagen del producto" width="60" height="60" class="me-1 mb-1 rounded" style="object-fit: cover;">
                                        @endforeach
                                    @else
                                        <span class="text-muted">Sin imagen</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2">
                                    @forelse ($producto->categorias as $categoria)
                                        <span class="badge bg-primary">{{ $categoria->nombre }}</span>
                                    @empty
                                        <span class="text-muted">Sin categoría</span>
                                    @endforelse
                                </td class="px-4 py-2">
                                @if(auth()->user()->role === 'gerente' || auth()->user()->role === 'empleado')
                                <td class="px-4 py-2">{{ $producto->vendedor->name ?? 'Desconocido' }}</td>
                                @endif
                                @if(auth()->user()->role === 'gerente' || auth()->user()->role === 'empleado' || auth()->user()->subrol === 'vendedor')
                                <td class="px-4 py-2">
                                    <a href="{{ route('productos.edit', $producto->id) }}" class="inline-flex items-center px-2 py-1 btn-sm font-semibold">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-2 py-1 bg-red-600 hover:bg-red-700 text-white font-semibold" onclick="return confirm('¿Estás seguro de eliminar el producto?')">
                                            <i class="fas fa-trash-alt"></i> Eliminar
                                        </button>
                                    </form>
                                </td>
                                @endif
                                @if(auth()->user()->role === 'cliente')
                                    <td class="text-center">
                                        <form method="POST" action="{{ route('carritos.store') }}" class="d-flex justify-content-center align-items-center">
                                            @csrf
                                            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                            <input type="number" name="cantidad" value="1" min="1" class="form-control w-25 me-2" />
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fas fa-cart-plus"></i> Agregar
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>