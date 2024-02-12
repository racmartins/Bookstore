<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Administrador',
                'email' => 'admin@dominio.pt',
                'password' => Hash::make('12345678'),
                'role' => 'admin', // Asumindo que você tem uma coluna 'role' para definir o tipo de utilizador
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rui',
                'email' => 'rui@dominio.pt',
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Afonso',
                'email' => 'afonso@dominio.pt',
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Goncalo',
                'email' => 'goncalo@dominio.pt',
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
