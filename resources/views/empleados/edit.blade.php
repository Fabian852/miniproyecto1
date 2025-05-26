<x-app-layout>
    @if(auth()->user()->role === 'gerente')
        <div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-10 px-6 sm:px-8">
            <h2 class="text-3xl font-extrabold text-gray-800 mb-6 border-b-2 border-blue-600 pb-2">Editar Empleado</h2>

            @if ($errors->any())
                <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('empleados.update', $empleado->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-gray-700 font-semibold mb-1">Nombre</label>
                    <input type="text" id="name" name="name" value="{{ $empleado->name }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-1">Correo Electrónico</label>
                    <input type="email" id="email" name="email" value="{{ $empleado->email }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="flex justify-between items-center">
                    <button type="submit"
                        class="bg-blue-600 text-black font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                        Actualizar
                    </button>

                    <a href="{{ route('empleados.index') }}"
                        class="text-blue-600 hover:text-blue-800 font-medium underline transition duration-200">
                        Volver
                    </a>
                </div>
            </form>
        </div>
    @else 
        <div class="max-w-xl mx-auto mt-20 p-6 bg-red-100 border border-red-400 text-red-700 rounded-lg shadow-md text-center px-6 sm:px-8">
            <h2 class="text-2xl font-bold mb-2">Acceso Denegado</h2>
            <p>No puedes estar aquí.</p>
        </div>
    @endif
</x-app-layout>
