<x-app-layout>
    <h2 class="text-xl font-semibold">Panel de Comprador</h2>
    <p>Bienvenido, {{ auth()->user()->name }}.</p>
    <div class="mb-4">
        <a href="{{ route('productos.index') }}" class="btn btn-success">Explorar Productos</a>
    </div>
</x-app-layout>