<x-app-layout>
    @if(auth()->user()->role === 'gerente')
        <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-10 px-6 sm:px-8">
            <h2 class="text-3xl font-extrabold text-gray-800 mb-6 border-b-2 border-indigo-600 pb-2">Panel de Gerente</h2>
            <p class="text-gray-600 mb-8">Bienvenido, <span class="font-semibold text-indigo-600">{{ Auth::user()->name }}</span>.</p>

            <div class="space-y-4">
                <a href="{{ route('empleados.index') }}"
                    class="block w-full text-center px-6 py-3 bg-indigo-600 text-black font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition duration-300">
                    Gestión de Empleados
                </a>

                <a href="{{ route('clientes.index') }}"
                    class="block w-full text-center px-6 py-3 bg-indigo-600 text-black font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition duration-300">
                    Gestión de Clientes
                </a>

                <a href="{{ route('productos.index') }}"
                    class="block w-full text-center px-6 py-3 bg-indigo-600 text-black font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition duration-300">
                    Gestión de Productos
                </a>

                <a href="{{ route('categorias.index') }}"
                    class="block w-full text-center px-6 py-3 bg-indigo-600 text-black font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition duration-300">
                    Gestión de Categorías
                </a>

                <a href="{{ route('ventas.index') }}"
                    class="block w-full text-center px-6 py-3 bg-indigo-600 text-black font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition duration-300">
                    Gestión de Ventas
                </a>

                <a href="{{ route('administrador.index') }}"
                    class="block w-full text-center px-6 py-3 bg-yellow-500 text-panel font-semibold rounded-lg shadow-md hover:bg-yellow-600 transition duration-300">
                    Panel Administrativo
                </a>
            </div>
        </div>
    @else
        <div class="max-w-xl mx-auto mt-20 p-6 bg-red-100 border border-red-400 text-red-700 rounded-lg shadow-md text-center px-6 sm:px-8">
            <h2 class="text-2xl font-bold mb-2">Acceso Denegado</h2>
            <p>No deberías estar aquí.</p>
        </div>
    @endif
</x-app-layout>
