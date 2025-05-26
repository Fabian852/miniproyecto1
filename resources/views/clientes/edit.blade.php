<x-app-layout>
    @if(auth()->user()->role === 'gerente' || auth()->user()->role === 'empleado')
        <div class="flex justify-center items-center min-h-screen bg-gray-50">
            <div class="w-full max-w-xl bg-white p-8 rounded-lg shadow-md">
                <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Editar Cliente</h1>

                <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <!-- Nombre -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" name="name" id="name" value="{{ $cliente->name }}" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" value="{{ $cliente->email }}" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Subrol -->
                    <div>
                        <label for="subrol" class="block text-sm font-medium text-gray-700">Subrol</label>
                        <select name="subrol" id="subrol" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="comprador" {{ $cliente->subrol === 'comprador' ? 'selected' : '' }}>Comprador</option>
                            <option value="vendedor" {{ $cliente->subrol === 'vendedor' ? 'selected' : '' }}>Vendedor</option>
                        </select>
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
