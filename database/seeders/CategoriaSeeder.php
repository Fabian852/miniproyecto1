<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        // Crea categorías de ejemplo
        Categoria::create([
            'nombre' => 'Útiles Escolares',
            'descripcion' => 'Material básico para el uso escolar',
        ]);

        Categoria::create([
            'nombre' => 'Material de Oficina',
            'descripcion' => 'Artículos usados comúnmente en oficinas',
        ]);

        Categoria::create([
            'nombre' => 'Arte y Dibujo',
            'descripcion' => 'Materiales para actividades artísticas y creativas',
        ]);
        */
        Categoria::factory()->count(10)->create();
    }
}