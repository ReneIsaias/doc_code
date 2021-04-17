<?php

namespace Database\Seeders;
use App\Models\Enfermedade;
use App\Models\Antecedente;

use Illuminate\Database\Seeder;

class EnfermedadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Se crean el antecedente numero uno con sus enfermedades respectivamente */
        
        $antecedente1 = Antecedente::create([
            'description'   => 'Antecedentes Heredofamiliares',
            'other'         => null,
        ]);

        $enfermedades1 = Enfermedade::create([
            'description'   => 'Diabetes',
            'other'         => null,
        ]);
        $antecedente1->enfermedades()->attach([$enfermedades1->id]);

        $enfermedades1 = Enfermedade::create([
            'description'   => 'Hipertención',
            'other'         => null,
        ]);
        $antecedente1->enfermedades()->attach([$enfermedades1->id]);

        $enfermedades1 = Enfermedade::create([
            'description'   => 'Neurológico',
            'other'         => null,
        ]);
        $antecedente1->enfermedades()->attach([$enfermedades1->id]);

        $enfermedades1 = Enfermedade::create([
            'description'   => 'Endocrinas',
            'other'         => null,
        ]);
        $antecedente1->enfermedades()->attach([$enfermedades1->id]);

        $enfermedades1 = Enfermedade::create([
            'description'   => 'Cardiopatías',
            'other'         => null,
        ]);
        $antecedente1->enfermedades()->attach([$enfermedades1->id]);

        $enfermedades1 = Enfermedade::create([
            'description'   => 'Vascular',
            'other'         => null,
        ]);
        $antecedente1->enfermedades()->attach([$enfermedades1->id]);

        $enfermedades1 = Enfermedade::create([
            'description'   => 'Hematológico',
            'other'         => null,
        ]);
        $antecedente1->enfermedades()->attach([$enfermedades1->id]);

        $enfermedades1 = Enfermedade::create([
            'description'   => 'Nervioso',
            'other'         => null,
        ]);
        $antecedente1->enfermedades()->attach([$enfermedades1->id]);

        $enfermedades1 = Enfermedade::create([
            'description'   => 'Nefropata',
            'other'         => null,
        ]);
        $antecedente1->enfermedades()->attach([$enfermedades1->id]);

        $enfermedades1 = Enfermedade::create([
            'description'   => 'Oncológico',
            'other'         => null,
        ]);
        $antecedente1->enfermedades()->attach([$enfermedades1->id]);

        $enfermedades1 = Enfermedade::create([
            'description'   => 'Alérgico',
            'other'         => null,
        ]);
        $antecedente1->enfermedades()->attach([$enfermedades1->id]);

        $enfermedades1 = Enfermedade::create([
            'description'   => 'Reumáticos',
            'other'         => null,
        ]);
        $antecedente1->enfermedades()->attach([$enfermedades1->id]);

        $enfermedades1 = Enfermedade::create([
            'description'   => 'Infeccioso',
            'other'         => null,
        ]);
        $antecedente1->enfermedades()->attach([$enfermedades1->id]);

        $enfermedades1 = Enfermedade::create([
            'description'   => 'Tubercolosis',
            'other'         => null,
        ]);
        $antecedente1->enfermedades()->attach([$enfermedades1->id]);

        $enfermedades1 = Enfermedade::create([
            'description'   => 'Hepatopatías',
            'other'         => null,
        ]);
        $antecedente1->enfermedades()->attach([$enfermedades1->id]);

        $enfermedades1 = Enfermedade::create([
            'description'   => 'Negados',
            'other'         => null,
        ]);
        $antecedente1->enfermedades()->attach([$enfermedades1->id]);


        /* Se crean el antecedente numero dos con sus enfermedades respectivamente, algo asi va esto */
        $antecedente2 = Antecedente::create([
            'description'   => 'Antecedentes Personales Patológicos',
            'other'         => null,
        ]);

        $enfermedades2 = Enfermedade::create([
            'description'   => 'Diabetes',
            'other'         => null,
        ]);
        $antecedente2->enfermedades()->attach([$enfermedades2->id]);

        $enfermedades2 = Enfermedade::create([
            'description'   => 'Hipertención',
            'other'         => null,
        ]);
        $antecedente2->enfermedades()->attach([$enfermedades2->id]);

        $enfermedades2 = Enfermedade::create([
            'description'   => 'Neurológico',
            'other'         => null,
        ]);
        $antecedente2->enfermedades()->attach([$enfermedades2->id]);

        $enfermedades2 = Enfermedade::create([
            'description'   => 'Endocrinas',
            'other'         => null,
        ]);
        $antecedente2->enfermedades()->attach([$enfermedades2->id]);

        $enfermedades2 = Enfermedade::create([
            'description'   => 'Traumatismos',
            'other'         => null,
        ]);
        $antecedente2->enfermedades()->attach([$enfermedades2->id]);

        $enfermedades2 = Enfermedade::create([
            'description'   => 'Metabólicos',
            'other'         => null,
        ]);
        $antecedente2->enfermedades()->attach([$enfermedades2->id]);

        $enfermedades2 = Enfermedade::create([
            'description'   => 'Cardiopatías',
            'other'         => null,
        ]);
        $antecedente2->enfermedades()->attach([$enfermedades2->id]);

        $enfermedades2 = Enfermedade::create([
            'description'   => 'Vascular',
            'other'         => null,
        ]);
        $antecedente2->enfermedades()->attach([$enfermedades2->id]);

        $enfermedades2 = Enfermedade::create([
            'description'   => 'Hematológicos',
            'other'         => null,
        ]);
        $antecedente2->enfermedades()->attach([$enfermedades2->id]);

        $enfermedades2 = Enfermedade::create([
            'description'   => 'Parasitosis',
            'other'         => null,
        ]);
        $antecedente2->enfermedades()->attach([$enfermedades2->id]);

        $enfermedades2 = Enfermedade::create([
            'description'   => 'Quirurgicos',
            'other'         => null,
        ]);
        $antecedente2->enfermedades()->attach([$enfermedades2->id]);

        $enfermedades2 = Enfermedade::create([
            'description'   => 'Exantemáticas',
            'other'         => null,
        ]);
        $antecedente2->enfermedades()->attach([$enfermedades2->id]);

        $enfermedades2 = Enfermedade::create([
            'description'   => 'Nefropata',
            'other'         => null,
        ]);
        $antecedente2->enfermedades()->attach([$enfermedades2->id]);

        $enfermedades2 = Enfermedade::create([
            'description'   => 'Oncológico',
            'other'         => null,
        ]);
        $antecedente2->enfermedades()->attach([$enfermedades2->id]);

        $enfermedades2 = Enfermedade::create([
            'description'   => 'Dermatológicos',
            'other'         => null,
        ]);
        $antecedente2->enfermedades()->attach([$enfermedades2->id]);

        $enfermedades2 = Enfermedade::create([
            'description'   => 'Reumáticos',
            'other'         => null,
        ]);
        $antecedente2->enfermedades()->attach([$enfermedades2->id]);

        $enfermedades2 = Enfermedade::create([
            'description'   => 'Transfucionales',
            'other'         => null,
        ]);
        $antecedente2->enfermedades()->attach([$enfermedades2->id]);

        $enfermedades2 = Enfermedade::create([
            'description'   => 'Infeccioso',
            'other'         => null,
        ]);
        $antecedente2->enfermedades()->attach([$enfermedades2->id]);

        $enfermedades2 = Enfermedade::create([
            'description'   => 'Tubercolosis',
            'other'         => null,
        ]);
        $antecedente2->enfermedades()->attach([$enfermedades2->id]);

        $enfermedades2 = Enfermedade::create([
            'description'   => 'Hepatopatías',
            'other'         => null,
        ]);
        $antecedente2->enfermedades()->attach([$enfermedades2->id]);

        $enfermedades2 = Enfermedade::create([
            'description'   => 'Inmunológicos',
            'other'         => null,
        ]);
        $antecedente2->enfermedades()->attach([$enfermedades2->id]);

        $enfermedades2 = Enfermedade::create([
            'description'   => 'Gastropatías',
            'other'         => null,
        ]);
        $antecedente2->enfermedades()->attach([$enfermedades2->id]);


        /* Se crean el antecedente numero tres con sus enferemades respectivamente, algo asi va esto */
        $antecedente3 = Antecedente::create([
            'description'   => 'Antecedentes Personales No Patológicos',
            'other'         => null,
        ]);

        $enfermedad3 = Enfermedade::create([
            'description'   => 'Toxicomanías',
            'other'         => null,
        ]);
        $antecedente3->enfermedades()->attach([$enfermedad3->id]);

        $enfermedad3 = Enfermedade::create([
            'description'   => 'Zoonosis',
            'other'         => null,
        ]);
        $antecedente3->enfermedades()->attach([$enfermedad3->id]);

        $enfermedad3 = Enfermedade::create([
            'description'   => 'Alcoholismo',
            'other'         => null,
        ]);
        $antecedente3->enfermedades()->attach([$enfermedad3->id]);

        $enfermedad3 = Enfermedade::create([
            'description'   => 'Tabaquismo',
            'other'         => null,
        ]);
        $antecedente3->enfermedades()->attach([$enfermedad3->id]);

        $enfermedad3 = Enfermedade::create([
            'description'   => 'Nutricional',
            'other'         => null,
        ]);
        $antecedente3->enfermedades()->attach([$enfermedad3->id]);



        /* Se crean el antecedente numero cuatro con sus enferemades respectivamente, algo asi va esto */
        $antecedente4 = Antecedente::create([
            'description'   => 'Gineco - Obstétricos',
            'other'         => null,
        ]);

        $enfermedad4 = Enfermedade::create([
            'description'   => 'Menarca',
            'other'         => null,
        ]);
        $antecedente4->enfermedades()->attach([$enfermedad4->id]);

        $enfermedad4 = Enfermedade::create([
            'description'   => 'Gestas',
            'other'         => null,
        ]);
        $antecedente4->enfermedades()->attach([$enfermedad4->id]);

        $enfermedad4 = Enfermedade::create([
            'description'   => 'Método PF',
            'other'         => null,
        ]);
        $antecedente4->enfermedades()->attach([$enfermedad4->id]);

        $enfermedad4 = Enfermedade::create([
            'description'   => 'Ritmo',
            'other'         => null,
        ]);
        $antecedente4->enfermedades()->attach([$enfermedad4->id]);

        $enfermedad4 = Enfermedade::create([
            'description'   => 'Parto',
            'other'         => null,
        ]);
        $antecedente4->enfermedades()->attach([$enfermedad4->id]);

        $enfermedad4 = Enfermedade::create([
            'description'   => 'Fecha ultimo parto',
            'other'         => null,
        ]);
        $antecedente4->enfermedades()->attach([$enfermedad4->id]);

        $enfermedad4 = Enfermedade::create([
            'description'   => 'Disemenorrea',
            'other'         => null,
        ]);
        $antecedente4->enfermedades()->attach([$enfermedad4->id]);

        $enfermedad4 = Enfermedade::create([
            'description'   => 'Cesárea',
            'other'         => null,
        ]);
        $antecedente4->enfermedades()->attach([$enfermedad4->id]);

        $enfermedad4 = Enfermedade::create([
            'description'   => 'Papanicolau',
            'other'         => null,
        ]);
        $antecedente4->enfermedades()->attach([$enfermedad4->id]);

        $enfermedad4 = Enfermedade::create([
            'description'   => 'FUM',
            'other'         => null,
        ]);
        $antecedente4->enfermedades()->attach([$enfermedad4->id]);

        $enfermedad4 = Enfermedade::create([
            'description'   => 'Aborto',
            'other'         => null,
        ]);
        $antecedente4->enfermedades()->attach([$enfermedad4->id]);

        $enfermedad4 = Enfermedade::create([
            'description'   => 'Mastografia',
            'other'         => null,
        ]);
        $antecedente4->enfermedades()->attach([$enfermedad4->id]);
    }
}