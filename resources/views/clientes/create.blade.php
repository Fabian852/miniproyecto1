<x-app-layout>
    @if(auth()->user()->role === 'gerente' || auth()->user()->role === 'empleado')
        <div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-10 px-6 sm:px-8">
            <div class="w-full max-w-xl bg-white p-8 rounded-lg shadow-md">
                <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Nuevo Cliente</h1>

                <form action="{{ route('clientes.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <!-- Nombre -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" name="name" id="name" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 py-4">Email</label>
                        <input type="email" name="email" id="email" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Contraseña -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 py-4">Contraseña</label>
                        <input type="password" name="password" id="password" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Subrol -->
                    <div>
                        <label for="subrol" class="block text-sm font-medium text-gray-700 py-4">Elige un Subrol</label>
                        <select name="subrol" id="subrol" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="comprador">Comprador</option>
                            <option value="vendedor">Vendedor</option>
                        </select>
                        @error('subrol')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botón -->
                    <div class="text-right">
                        <button type="submit"
                            class="bg-green-600 text-white px-6 py-2 rounded-md shadow hover:bg-green-700 transition">
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
