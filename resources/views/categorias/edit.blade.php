<x-app-layout>
    <div class="flex justify-center items-start mt-10">
        <div class="w-full max-w-xl bg-white shadow-lg rounded-2xl p-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-2">Editar Categoría</h2>

            <form method="POST" action="{{ route('categorias.update', $categoria->id) }}">
                @csrf
                @method('PUT')

                <!-- Nombre -->
                <div class="mb-5">
                    <x-input-label for="nombre" :value="__('Nombre')" class="text-lg text-gray-700 font-semibold" />
                    <x-text-input 
                        id="nombre" 
                        class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                        type="text" 
                        name="nombre" 
                        value="{{ old('nombre', $categoria->nombre) }}" 
                        required 
                        autofocus 
                    />
                    <x-input-error :messages="$errors->get('nombre')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Descripción -->
                <div class="mb-5">
                    <x-input-label for="descripcion" :value="__('Descripción')" class="text-lg text-gray-700 font-semibold" />
                    <x-text-input 
                        id="descripcion" 
                        class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                        type="text" 
                        name="descripcion" 
                        value="{{ old('descripcion', $categoria->descripcion) }}" 
                        required 
                    />
                    <x-input-error :messages="$errors->get('descripcion')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Botón -->
                <div class="flex justify-end mt-6">
                    <x-primary-button class="px-6 py-2 rounded-lg text-white bg-blue-600 hover:bg-blue-700 transition ease-in-out duration-200">
                        {{ __('Actualizar Categoría') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
