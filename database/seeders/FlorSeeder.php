<?php

namespace Database\Seeders;

use App\Models\Flor;
use Illuminate\Database\Seeder;

class FlorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Flor::create([
        //     'nombre' => 'Ramo de flores',
        //     'descripcion' => 'Hermoso detalle',
        //     'precio' => 400,
        //     'imagen' => 'rosas.jpg',
        //     'disponible' => true,
        // ]);

        // Flor::create([
        //     'nombre' => 'Ramo de rosas',
        //     'descripcion' => 'Hermoso detalle',
        //     'precio' => 450,
        //     'imagen' => 'girasoles.jpg',
        //     'disponible' => true,
        // ]);

        // Flor::create([
        //     'nombre' => 'Ramo de tulipanes',
        //     'descripcion' => 'Hermoso detalle',
        //     'precio' => 500,
        //     'imagen' => 'tulipanes.jpg',
        //     'disponible' => false,
        // ]);

        Flor::create([
            'nombre' => 'Ramo de girasoles',
            'descripcion' => 'Hermoso ramo',
            'precio' => 800,
            'imagen' => 'tulipanes.jpg',
            'disponible' => true,
        ]);
    }
}
