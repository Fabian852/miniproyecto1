<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::with('categorias')->get();
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productos.create');  // Asegurarse de que retorna la vista 'create'
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'precio' => 'required|numeric',
        'stock' => 'required|integer',
        'imagenes.*' => 'image|max:2048',
    ]);
    $imagenes = [];

    if ($request->hasFile('imagenes')){
        foreach ($request->file('imagenes') as $imagen){
            $imagenes[] = $imagen->store('productos', 'public');
        }
    }

    Producto::create([
        'nombre' => $validated['nombre'],
        'descripcion' => $validated['descripcion'] ?? null,
        'precio' => $validated['precio'],
        'stock' => $validated['stock'],
        'user_id' => auth()->id(),
        'imagenes' => $imagenes,
    ]);
    return redirect()->route('productos.index')->with('success', 'Producto registrado correctamente');
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        return view('productos.show', compact('producto'));
    }

    // Mostrar el formulario para editar un producto
    public function edit($id)
    {
        $producto = Producto::with('categorias')->findOrFail($id);
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    // Actualizar un producto específico
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'imagenes.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imagenes_a_borrar' => 'array',
            'imagenes_a_borrar.*' => 'string',
            'categorias' => 'nullable|array',
            'categorias.*' => 'exists:categorias,id',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update([
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'],
            'precio' => $validated['precio'],
            'stock' => $validated['stock'],
        ]);

        $imagenesExistentes = $producto->imagenes ?? [];
        if ($request->has('imagenes_a_borrar')){
            foreach ($request->imagenes_a_borrar as $imgABorrar){
                if (in_array($imgABorrar, $imagenesExistentes)){
                    \Storage::disk('public')->delete($imgABorrar);
                    $imagenesExistentes = array_filter($imagenesExistentes, fn($img) => $img !== $imgABorrar);
                }
            }
        }

        if ($request->hasFile('imagenes')){
            foreach ($request->file('imagenes') as $imagen){
                $ruta = $imagen->store('appproductos', 'public');
                $imagenesExistentes[] = $ruta;
            }
        }

        $producto->imagenes = array_values($imagenesExistentes);
        $producto->save();

        if ($request->has('categorias')){
            $producto->categorias()->sync($request->categorias);
        }

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    // Eliminar un producto
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}
