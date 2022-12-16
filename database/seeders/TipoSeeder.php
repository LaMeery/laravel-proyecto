<?php

namespace Database\Seeders;

use App\Models\Tipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo::create([
            'tipo_incidencia' => 'Torre',
            'descripcion' => 'Incidencia en un ordenador'
        ]);
        
        Tipo::create([
            'tipo_incidencia' => 'Monitor',
            'descripcion' => 'Incidencia en un monitor'
        ]);
        
        Tipo::create([
            'tipo_incidencia' => 'Teclado',
            'descripcion' => 'Incidencia en un teclado'
        ]);
        
        Tipo::create([
            'tipo_incidencia' => 'Ratón',
            'descripcion' => 'Incidencia en un ratón'
        ]);
        
        Tipo::create([
            'tipo_incidencia' => 'Proyector',
            'descripcion' => 'Incidencia en un proyector'
        ]);
        
        Tipo::create([
            'tipo_incidencia' => 'Mobiliario',
            'descripcion' => 'Incidencia en mesas, sillas, pizarras, etc.'
        ]);
        
        Tipo::create([
            'tipo_incidencia' => 'Otros',
            'descripcion' => 'Indícanos el tipo de incidencia en la descripción'
        ]);
    }
}
