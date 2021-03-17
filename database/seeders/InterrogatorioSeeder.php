<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Interrogatorio;
use App\Models\Aparato;

class InterrogatorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Se agregan los diferentes aparatos para los interrogatorios */

        $aparato = Aparato::create([
            'description'   => 'Respiratorio',
        ]);

        $aparato = Aparato::create([
            'description'   => 'Cardiovascular',
        ]);

        $aparato = Aparato::create([
            'description'   => 'Digestivo',
        ]);

        $aparato = Aparato::create([
            'description'   => 'Urogenital',
        ]);

        $aparato = Aparato::create([
            'description'   => 'Hematologo',
        ]);

        $aparato = Aparato::create([
            'description'   => 'Endócrino',
        ]);

        $aparato = Aparato::create([
            'description'   => 'Osteomuscular',
        ]);
        
        $aparato = Aparato::create([
            'description'   => 'Nervioco',
        ]);


        /*Ahora se pueden agregar las descripciones de un interrogatorio y sync() con los aparatos */
    }
}
