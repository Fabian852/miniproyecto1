<x-app-layout>
    @if(auth()->user()->role === 'gerente')
        <div class=" max-w-xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-10 px-6 sm:px-8">
            <h1 class=" text-3xl font-extrabold text-gray-800 mb-6 border-b-2 border-indigo-600 pb-2">Nuevo Empleado</h1>

            <form action="{{ route('empleados.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="name" class="block text-gray-700 font-semibold mb-1">Nombre</label>
                    <input type="text" name="name" id="name" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-1">Email</label>
                    <input type="email" name="email" id="email" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label for="password" class="block text-gray-700 font-semibold mb-1">Contraseña</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-black font-semibold py-3 rounded-lg shadow-md hover:bg-indigo-700 transition duration-300">
                    Guardar
                </button>
            </form>
        </div>
    @else 
        <div class="max-w-xl mx-auto mt-20 p-6 bg-red-100 border border-red-400 text-red-700 rounded-lg shadow-md text-center px-6 sm:px-8">
            <h2 class="text-2xl font-bold mb-2">Acceso Denegado</h2>
            <p>No puedes estar aquí.</p>
        </div>
    @endif
</x-app-layout>