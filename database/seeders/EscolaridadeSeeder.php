<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Escolaridade;

class EscolaridadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $escolaridad = Escolaridade::create([
            'description'   => 'Primaria',
        ]);

        $escolaridad = Escolaridade::create([
            'description'   => 'Secundaria',
        ]);

        $escolaridad = Escolaridade::create([
            'description'   => 'Preparatoria',
        ]);

        $escolaridad = Escolaridade::create([
            'description'   => 'Licenciatura',
        ]);

        $escolaridad = Escolaridade::create([
            'description'   => 'Ingeniería',
        ]);

        $escolaridad = Escolaridade::create([
            'description'   => 'Doctorado',
        ]);
    }
}
