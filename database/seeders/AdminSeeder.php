<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::firstOrCreate(
            ['email' => 'gerente@gmail.com'],
            [
                'name' => 'Gerente',
                'password' => Hash::make('geren12345'), // Cambia la contraseña después de la prueba
                'role' => 'gerente',
            ]
        );
    }
}
