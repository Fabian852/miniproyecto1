<x-app-layout>
    @if(auth()->user()->role === 'empleado')
        <div class="max-w-3xl mx-auto bg-black shadow-lg rounded-lg p-8 mt-10 px-4">
            <h2 class="text-3xl font-extrabold text-gray-800 mb-6 border-b-2 border-blue-600 pb-2">Panel de Empleado</h2>
            <p class="text-gray-600 mb-8">Bienvenido, <span class="font-semibold text-blue-600">{{ auth()->user()->name }}</span>.</p>

            <div class="space-y-4">
                <a href="{{ route('clientes.index') }}" 
                    class="block w-full text-center px-6 py-3 bg-blue-600 text-black font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                    Gestión de Clientes
                </a>

                <a href="{{ route('productos.index') }}" 
                    class="block w-full text-center px-6 py-3 bg-blue-600 text-black font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                    Gestión de Productos
                </a>
            </div>
        </div>
    @else 
        <div class="max-w-xl mx-auto mt-20 p-6 bg-red-100 border border-red-400 text-red-700 rounded-lg shadow-md text-center">
            <h2 class="text-2xl font-bold mb-2">Acceso Denegado</h2>
            <p>No puedes estar aquí.</p>
        </div>
    @endif
</x-app-layout>