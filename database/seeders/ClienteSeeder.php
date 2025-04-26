<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        $clientes = [
            ['name' => 'Valeria Mendoza',   'email' => 'valeria@example.com', 'password' => 'valeria123'],
            ['name' => 'Diego Torres',      'email' => 'diego@example.com',   'password' => 'diego123'],
            ['name' => 'Sofía Castillo',    'email' => 'sofia@example.com',   'password' => 'sofia123'],
            ['name' => 'Emilio Fernández',  'email' => 'emilio@example.com',  'password' => 'emilio123'],
            ['name' => 'Camila Navarro',    'email' => 'camila@example.com',  'password' => 'camila123'],
        ];

        foreach ($clientes as $cliente) {
            Cliente::create([
                'name' => $cliente['name'],
                'email' => $cliente['email'],
                'password' => Hash::make($cliente['password']),
            ]);
        }
    }
}
