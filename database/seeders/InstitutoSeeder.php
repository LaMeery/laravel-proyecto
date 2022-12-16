<?php

namespace Database\Seeders;

use App\Models\Instituto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstitutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Instituto::create([
            'name_ies' => 'IES RIBERA DE LOS MOLINOS'
        ]);
        
        Instituto::create([
            'name_ies' => 'IES FRANCISCO SALZILLO'
        ]);

        Instituto::factory(28)->create();
    }
}
