<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'gerente@gmail.com'],
            [
                'name' => 'admin',
                'password' => Hash::make('nimda'), 
                'role' => 'gerente',
            ]
        );

        // Crear usuarios con contraseñas
        User::create([
            'name' => 'cliente',
            'email' => 'paco@example.com',
            'password' => Hash::make('etneilc'),
        ]);

        User::create([
            'name' => 'Isabela García',
            'email' => 'isabela@example.com',
            'password' => Hash::make('password123'),
        ]);
        User::create([
        'name' => 'Ana Torres',
        'email' => 'ana.torres@empleado.com',
        'password' => Hash::make('torres456'),
        'role' => 'empleado'
    ]);

    User::create([
        'name' => 'Carlos Ramírez',
        'email' => 'carlos.ramirez@empleado.com',
        'password' => Hash::make('ramirez789'),
        'role' => 'empleado'
    ]);
    }
}
