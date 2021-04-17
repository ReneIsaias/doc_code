<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ocupacione;

class OcupacioneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ocupacion = Ocupacione::create([
            'description'   => 'Obrero',
        ]);

        $ocupacion = Ocupacione::create([
            'description'   => 'Maestro',
        ]);

        $ocupacion = Ocupacione::create([
            'description'   => 'Trabajador industrial',
        ]);

        $ocupacion = Ocupacione::create([
            'description'   => 'Conductor',
        ]);

        $ocupacion = Ocupacione::create([
            'description'   => 'Campesino',
        ]);

        $ocupacion = Ocupacione::create([
            'description'   => 'Chef',
        ]);
    }
}
