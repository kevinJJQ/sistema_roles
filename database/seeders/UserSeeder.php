<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'TU NOMBRE COMPLETO',
            'username' => 'admin',
            'email'    => 'admin@correo.com',
            'password' => Hash::make('Admin411*'),
            'rol'      => 'admin',
            'carnet'   => '12345678',
            'celular'  => '77712345',
            'gmail'    => 'admin@gmail.com',
        ]);

        User::create([
            'name'     => 'Omar Quispe Mita',
            'username' => 'omarqm',
            'email'    => 'omar@correo.com',
            'password' => Hash::make('Omar411*'),
            'rol'      => 'usuario',
            'carnet'   => '87654321',
            'celular'  => '76543210',
            'gmail'    => 'omar@gmail.com',
        ]);

        User::create([
            'name'     => 'Juan Perez Vargas',
            'username' => 'juanpv',
            'email'    => 'juan@correo.com',
            'password' => Hash::make('Juan411*'),
            'rol'      => 'usuario',
            'carnet'   => '11111111',
            'celular'  => '71111111',
            'gmail'    => 'juan@gmail.com',
        ]);

        User::create([
            'name'     => 'Maria Lopez Rios',
            'username' => 'marialr',
            'email'    => 'maria@correo.com',
            'password' => Hash::make('Maria411*'),
            'rol'      => 'usuario',
            'carnet'   => '22222222',
            'celular'  => '72222222',
            'gmail'    => 'maria@gmail.com',
        ]);

        User::create([
            'name'     => 'Carlos Mamani Flores',
            'username' => 'carlosmf',
            'email'    => 'carlos@correo.com',
            'password' => Hash::make('Carlos411*'),
            'rol'      => 'usuario',
            'carnet'   => '33333333',
            'celular'  => '73333333',
            'gmail'    => 'carlos@gmail.com',
        ]);

        User::create([
            'name'     => 'Ana Condori Huanca',
            'username' => 'anach',
            'email'    => 'ana@correo.com',
            'password' => Hash::make('Ana411*'),
            'rol'      => 'usuario',
            'carnet'   => '44444444',
            'celular'  => '74444444',
            'gmail'    => 'ana@gmail.com',
        ]);
    }
}