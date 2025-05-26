<x-app-layout>
    <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-8 mt-12 px-6 sm:px-8">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-5 border-b-2 border-purple-600 pb-2">Panel de Vendedor</h2>
        <p class="text-gray-700 mb-8">Bienvenido, <span class="font-semibold text-green-600">{{ auth()->user()->name }}</span>.</p>
        <div>
            <a href="{{ route('productos.index') }}"
                class="inline-block w-full text-center px-6 py-3 bg-purple-600 text-black font-semibold rounded-lg shadow-md hover:bg-purple-700 transition duration-300">
                Gestionar Productos
            </a>
        </div>
    </div>
</x-app-layout>
