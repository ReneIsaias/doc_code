<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Especialidade;

class EspecialidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $especialidad = Especialidade::create([
            'description'   => 'Cirujano',
        ]);

        $especialidad = Especialidade::create([
            'description'   => 'Ortpedico',
        ]);

        $especialidad = Especialidade::create([
            'description'   => 'Dentista',
        ]);

        $especialidad = Especialidade::create([
            'description'   => 'Plastico',
        ]);

        $especialidad = Especialidade::create([
            'description'   => 'Quimioterapico',
        ]);
    }
}
