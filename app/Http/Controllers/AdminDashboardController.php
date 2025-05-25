<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsuarios = User::count();
        $vendedores = User::has('productos')->count();
        $compradores = User::has('ventas')->count();
        $categoriasConConteo = Categoria::withCount('productos')->get();
        $productoMasVendido = Producto::withSum('ventas as total_vendido', 'producto_venta.cantidad')
            ->orderByDesc('total_vendido')
            ->first();
        $categorias = Categoria::with('productos.ventas.comprador')->get();
        $compradoresFrecuentes = [];
        foreach ($categorias as $categoria) {
            $frecuencias = [];
            foreach ($categoria->productos as $producto) {
                foreach ($producto->ventas as $venta) {
                    $compradorId = $venta->comprador->id ?? null;
                    if ($compradorId) {
                        $frecuencias[$compradorId] = ($frecuencias[$compradorId] ?? 0) + 1;
                    }
                }
            }
            if (!empty($frecuencias)) {
                arsort($frecuencias);
                $compradorId = array_key_first($frecuencias);
                $compradoresFrecuentes[$categoria->id] = [
                    'categoria' => $categoria->nombre,
                    'comprador' => User::find($compradorId)->name ?? 'Desconocido',
                    'compras' => $frecuencias[$compradorId],
                ];
            } else {
                $compradoresFrecuentes[$categoria->id] = [
                    'categoria' => $categoria->nombre,
                    'comprador' => 'Ninguno',
                    'compras' => 0,
                ];
            }
        }
        return view('admin.dashboard', compact(
            'totalUsuarios',
            'vendedores',
            'compradores',
            'categoriasConConteo',
            'productoMasVendido',
            'compradoresFrecuentes'
        ));
    }
}
