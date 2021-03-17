<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grupo;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grupo = Grupo::create([
            'description'   => 'O +',
        ]);

        $grupo = Grupo::create([
            'description'   => 'O -',
        ]);

        $grupo = Grupo::create([
            'description'   => 'A +',
        ]);

        $grupo = Grupo::create([
            'description'   => 'A -',
        ]);

        $grupo = Grupo::create([
            'description'   => 'AB +',
        ]);
    }
}
