<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Estado::create([
            'estado' => 'Sin Respuesta'
        ]);

        Estado::create([
            'estado' => 'En Curso'
        ]);

        Estado::create([
            'estado' => 'Pausada'
        ]);

        Estado::create([
            'estado' => 'Entregada'
        ]);

    }
}
