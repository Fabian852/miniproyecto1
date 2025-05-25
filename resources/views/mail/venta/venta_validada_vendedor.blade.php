@component('mail::message')
# ¡Tienes una nueva venta validada!
Hola {{ $producto->vendedor->name }},
Tu producto "{{ $producto->nombre }}" ha sido vendido.
Detalles de la venta:
**ID Venta:** {{ $venta->id }}
**Producto:** {{ $venta->producto->nombre }}  
**Cliente:** {{ $venta->comprador->name }}  
**Cantidad vendida:** {{ $producto->pivot->cantidad }}
**Total venta:** ${{ number_format($venta->total, 2) }}
**Correo del comprador:** {{ $venta->comprador->email }}
**Dirección:** {{ $venta->comprador->direccion ?? 'No proporcionada' }}  
Por favor, prepara el producto para el envío lo antes posible.
Gracias,<br>
{{ config('app.name') }}
@endcomponent