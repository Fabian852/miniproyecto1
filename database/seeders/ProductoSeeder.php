<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $productos = [
            ['nombre' => 'Tablet Samsung Galaxy Tab A8', 'descripcion' => 'Pantalla 10.5" Full HD, 64GB', 'precio' => 5800.00, 'stock' => 18],
            ['nombre' => 'Cámara Canon EOS Rebel T7', 'descripcion' => 'Cámara réflex digital con lente 18-55mm', 'precio' => 9200.00, 'stock' => 10],
            ['nombre' => 'Batería portátil Anker', 'descripcion' => 'Power Bank 20000mAh carga rápida', 'precio' => 1200.00, 'stock' => 35],
            ['nombre' => 'Silla Gamer Cougar Armor', 'descripcion' => 'Silla ergonómica para gaming', 'precio' => 4500.00, 'stock' => 8],
            ['nombre' => 'Procesador AMD Ryzen 7 5800X', 'descripcion' => '8 núcleos, 16 hilos', 'precio' => 7600.00, 'stock' => 14],
            ['nombre' => 'Disco Duro Externo Seagate 2TB', 'descripcion' => 'USB 3.0 para copias de seguridad', 'precio' => 1750.00, 'stock' => 22],
            ['nombre' => 'Router TP-Link Archer AX10', 'descripcion' => 'Router WiFi 6 de alta velocidad', 'precio' => 1900.00, 'stock' => 20],
            ['nombre' => 'Monitor Gamer Asus 27"', 'descripcion' => '144Hz, 1ms, Full HD', 'precio' => 5400.00, 'stock' => 9],
            ['nombre' => 'SSD Kingston NV2 1TB', 'descripcion' => 'Disco sólido NVMe PCIe 4.0', 'precio' => 1700.00, 'stock' => 30],
            ['nombre' => 'Auriculares HyperX Cloud Stinger', 'descripcion' => 'Sonido envolvente para gaming', 'precio' => 1300.00, 'stock' => 25],
        ];

        foreach ($productos as $producto) {
            Producto::create($producto);
        }
    }
}
