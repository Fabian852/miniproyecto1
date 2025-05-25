<x-app-layout>
    <div class="container mx-auto mt-10 px-4">
        <div class="max-w-xl mx-auto bg-white shadow-xl rounded-2xl p-8 border border-gray-200">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">🛒 Crear Nuevo Carrito</h2>

            <form method="POST" action="{{ route('carritos.store') }}">
                @csrf

                <!-- Usuario -->
                <div class="mb-5">
                    <x-input-label for="user_id" :value="__('Usuario')" class="text-gray-700 font-semibold" />
                    <x-text-input 
                        id="user_id" 
                        class="block mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                        type="number" 
                        name="user_id" 
                        value="{{ old('user_id') }}" 
                        required 
                    />
                    <x-input-error :messages="$errors->get('user_id')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Producto -->
                <div class="mb-5">
                    <x-input-label for="producto_id" :value="__('Producto')" class="text-gray-700 font-semibold" />
                    <x-text-input 
                        id="producto_id" 
                        class="block mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                        type="number" 
                        name="producto_id" 
                        value="{{ old('producto_id') }}" 
                        required 
                    />
                    <x-input-error :messages="$errors->get('producto_id')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Cantidad -->
                <div class="mb-5">
                    <x-input-label for="cantidad" :value="__('Cantidad')" class="text-gray-700 font-semibold" />
                    <x-text-input 
                        id="cantidad" 
                        class="block mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                        type="number" 
                        name="cantidad" 
                        value="{{ old('cantidad') }}" 
                        required 
                    />
                    <x-input-error :messages="$errors->get('cantidad')" class="mt-2 text-sm text-red-600" />
                </div>

                <div class="flex items-center justify-end mt-6">
                    <x-primary-button class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow">
                        {{ __('Crear Carrito') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
