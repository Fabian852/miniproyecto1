<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\User;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $productos = [
            ['nombre' => 'Cuaderno Profesional Raya', 'descripcion' => 'Cuaderno de 100 hojas tamaño carta', 'precio' => 45.00, 'stock' => 50,'user_id' => 2, 'imagenes' => ['/productos/p1.jpg']],
            ['nombre' => 'Lápiz HB #2', 'descripcion' => 'Lápiz de grafito con goma', 'precio' => 5.00, 'stock' => 200,'user_id' => 3, 'imagenes' => ['/productos/p2.jpg']],
            /*['nombre' => 'Bolígrafo Azul BIC', 'descripcion' => 'Bolígrafo de tinta azul punto medio', 'precio' => 7.50, 'stock' => 150],
            ['nombre' => 'Marcadores Permanentes Sharpie', 'descripcion' => 'Set de 4 colores surtidos', 'precio' => 65.00, 'stock' => 30],
            ['nombre' => 'Carpeta Plástica Tamaño Carta', 'descripcion' => 'Carpeta con broche de presión', 'precio' => 12.00, 'stock' => 80],
            ['nombre' => 'Goma de Borrar Blanca', 'descripcion' => 'Goma escolar libre de PVC', 'precio' => 4.00, 'stock' => 100],
            ['nombre' => 'Tijeras Escolares', 'descripcion' => 'Tijeras punta redonda para niños', 'precio' => 18.00, 'stock' => 60],
            ['nombre' => 'Pegamento en Barra 40g', 'descripcion' => 'Pegamento no tóxico, ideal para papel', 'precio' => 22.00, 'stock' => 90],
            ['nombre' => 'Regla de 30 cm', 'descripcion' => 'Regla transparente de plástico resistente', 'precio' => 10.00, 'stock' => 70],
            ['nombre' => 'Caja de Colores Maped', 'descripcion' => '12 colores largos de madera', 'precio' => 38.00, 'stock' => 40],*/
        ];

        foreach ($productos as $producto) {
            Producto::create($producto);
        }
        $producto = Producto::first();
        $producto->categorias()->attach([1, 2]);
    }
}
