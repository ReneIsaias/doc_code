<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estado;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estado = Estado::create([
            'description'   => 'Casado',
        ]);

        $estado = Estado::create([
            'description'   => 'Soltero',
        ]);

        $estado = Estado::create([
            'description'   => 'Viudo',
        ]);

        $estado = Estado::create([
            'description'   => 'Divorciado',
        ]);

        $estado = Estado::create([
            'description'   => 'Unio libre',
        ]);
    }
}
