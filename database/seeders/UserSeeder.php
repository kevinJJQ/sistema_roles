<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['username' => 'admin'],
            [
                'name'     => 'TU NOMBRE COMPLETO',
                'email'    => 'admin@correo.com',
                'password' => Hash::make('Admin411*'),
                'rol'      => 'admin',
                'carnet'   => '12345678',
                'celular'  => '77712345',
                'gmail'    => 'admin@gmail.com',
            ]
        );

        User::firstOrCreate(
            ['username' => 'omarqm'],
            [
                'name'     => 'Omar Quispe Mita',
                'email'    => 'omar@correo.com',
                'password' => Hash::make('Omar411*'),
                'rol'      => 'usuario',
                'carnet'   => '87654321',
                'celular'  => '76543210',
                'gmail'    => 'omar@gmail.com',
            ]
        );

        User::firstOrCreate(
            ['username' => 'juanpv'],
            [
                'name'     => 'Juan Perez Vargas',
                'email'    => 'juan@correo.com',
                'password' => Hash::make('Juan411*'),
                'rol'      => 'usuario',
                'carnet'   => '11111111',
                'celular'  => '71111111',
                'gmail'    => 'juan@gmail.com',
            ]
        );

        User::firstOrCreate(
            ['username' => 'marialr'],
            [
                'name'     => 'Maria Lopez Rios',
                'email'    => 'maria@correo.com',
                'password' => Hash::make('Maria411*'),
                'rol'      => 'usuario',
                'carnet'   => '22222222',
                'celular'  => '72222222',
                'gmail'    => 'maria@gmail.com',
            ]
        );

        User::firstOrCreate(
            ['username' => 'carlosmf'],
            [
                'name'     => 'Carlos Mamani Flores',
                'email'    => 'carlos@correo.com',
                'password' => Hash::make('Carlos411*'),
                'rol'      => 'usuario',
                'carnet'   => '33333333',
                'celular'  => '73333333',
                'gmail'    => 'carlos@gmail.com',
            ]
        );

        User::firstOrCreate(
            ['username' => 'anach'],
            [
                'name'     => 'Ana Condori Huanca',
                'email'    => 'ana@correo.com',
                'password' => Hash::make('Ana411*'),
                'rol'      => 'usuario',
                'carnet'   => '44444444',
                'celular'  => '74444444',
                'gmail'    => 'ana@gmail.com',
            ]
        );
    }
}