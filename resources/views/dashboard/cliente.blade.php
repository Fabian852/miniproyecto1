<x-app-layout>
    @if(auth()->user()->role === 'cliente')
        <div class="max-w-3xl mx-auto bg-black shadow-lg rounded-lg p-8 mt-10 px-4">
            <h2 class="text-3xl font-extrabold text-gray-800 mb-4 border-b-2 border-indigo-600 pb-2">Panel de Cliente</h2>
            <p class="text-gray-600 mb-6">Bienvenido, <span class="font-semibold text-indigo-600">{{ auth()->user()->name }}</span>.</p>
            <div>
                <a href="{{ route('productos.index') }}" 
                    class="inline-block px-6 py-3 bg-indigo-600 text-black font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition duration-300">
                    Ver Productos
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