<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use App\Models\Carrito;
use App\Mail\VentaValidadaVendedor;
use App\Mail\VentaValidadaComprador;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;

class VentaController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Venta::with('usuario', 'productos')->get();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        return redirect()->route('carritos.index');
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'productos' => 'required|array',
            'productos.*.id' => 'required|exists:productos,id',
            'productos.*.cantidad' => 'required|integer|min:1',
            'ticket' => 'required|image|max:2048',
        ]);

        if (!$request->hasFile('ticket') || !$request->file('ticket')->isValid()) {
        return back()->withErrors(['ticket' => 'El archivo del ticket es obligatorio y debe ser válido.']);
        }
        $pathTicket = $request->file('ticket')->store('tickets', 'privado');
    
        $total = 0;
        foreach ($request->productos as $item) {
            $producto = Producto::find($item['id']);
            $total += $producto->precio * $item['cantidad'];
        }
    
        // Crear la venta
        $venta = Venta::create([
            'user_id' => auth()->id(),
            'total' => $total,
            'ticket' => $pathTicket,
            'estado' => 'pendiente',
        ]);
    
        // Asociar productos a la venta
        foreach ($request->productos as $item) {
            $venta->productos()->attach($item['id'], ['cantidad' => $item['cantidad']]);
        }
    
        return redirect()->route('ventas.index')->with('success', 'Venta registrada con Exito.');
    }

    public function ticket($id)
    {
        $venta = Venta::findOrFail($id);
        if (!$venta->ticket || !Storage::disk('app/privado')->exists($venta->ticket)) {
            abort(404, 'Ticket no encontrado');
        }
        return Storage::disk('app/privado')->download($venta->ticket);
    }

    public function edit($id)
    {
        $venta = Venta::findOrFail($id);
        return view('ventas.edit', compact('venta'));
    }


    public function update(Request $request, $id)
    {
        $venta = Venta::findOrFail($id);
        $request->validate([
            'estado' => 'required|in:pendiente,validada',
        ]);
        if ($venta->estado !== $request->estado) {
            if ($request->estado === 'validada'){
                $this->authorize('validar', $venta);
            }
            $venta->estado = $request->estado;
        }
        $venta->save();
        return redirect()->route('ventas.index')->with('success', 'El Estado de la Venta fue actualizada correctamente.');
    }



    public function show($id)
    {
        $venta = Venta::with('productos')->findOrFail($id);
        return view('ventas.show', compact('venta'));
    }

    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();

        return redirect()->route('ventas.index')->with('success', 'Venta eliminada Exitosamente.');
    }

    public function validar($id)
    {
        $venta = Venta::with('productos.vendedor', 'comprador')->findOrFail($id);
        $venta->estado = 'validada';
        $venta->save();

        foreach ($venta->productos as $producto) {
            if ($producto->vendedor) {
                try {
                    Mail::to($producto->vendedor->email)
                        ->send(new VentaValidadaVendedor($venta, $producto));
                } catch (\Exception $e) {
                    \Log::error("Error al enviar correo al vendedor (Producto ID {$producto->id}): " . $e->getMessage());
                }
            } else {
                \Log::error("Producto {$producto->id} sin vendedor asignado.");
            }
        }
        try {
            Mail::to($venta->comprador->email)
                ->send(new VentaValidadaComprador($venta));
        } catch (\Exception $e) {
            \Log::error("Error al enviar correo al comprador (Venta ID {$venta->id}): " . $e->getMessage());
        }
        return redirect()->back()->with('success', 'Venta validada y correos enviados.');
    }
    public function showTicket(Venta $venta)
    {
        $this->authorize('view', $venta);
        if (!$venta->ticket || !\Storage::disk('privado')->exists($venta->ticket)){
            abort(404, 'Ticket no encontrado.');
        }
        $file = \Storage::disk('privado')->get($venta->ticket);
        $mime = \Storage::disk('privado')->mimeType($venta->ticket);
        return response($file, 200)->header('Content-Type', $mime);
    }
}