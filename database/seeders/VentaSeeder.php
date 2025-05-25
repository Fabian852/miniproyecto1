<?php

namespace Database\Seeders;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $venta = Venta::create([
            'user_id' => 2,
            'total' => 200.00,
            'ticket' => 'storage\app\privado\tickets\prueba1',
        ]);

        $venta->productos()->attach([
            1 => ['cantidad' => 2], // Producto con ID 1, cantidad 2
            2 => ['cantidad' => 1], // Producto con ID 2, cantidad 1
        ]);
    }
}