<x-app-layout>
    <div class="max-w-3xl mx-auto bg-black shadow-lg rounded-lg p-8 mt-10 px-4">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-4 border-b-2 border-green-600 pb-2">Panel de Comprador</h2>
        <p class="text-gray-600 mb-6">Bienvenido, <span class="font-semibold text-green-600">{{ auth()->user()->name }}</span>.</p>
        <div>
            <a href="{{ route('productos.index') }}"
                class="inline-block px-6 py-3 bg-green-600 text-black font-semibold rounded-lg shadow-md hover:bg-green-700 transition duration-300">
                Explorar Productos
            </a>
        </div>
    </div>
</x-app-layout>
