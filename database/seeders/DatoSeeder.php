<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dato;
use App\Models\Tipo;

class DatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Se agregan los tipos que pueden haber un los datos */

        $tipo = Tipo::create([
            'description'   => 'Peso',
        ]);

        $tipo = Tipo::create([
            'description'   => 'Talla',
        ]);

        $tipo = Tipo::create([
            'description'   => 'IMC (Indice de masa muscular)',
        ]);

        $tipo = Tipo::create([
            'description'   => 'Temperatura',
        ]);

        $tipo = Tipo::create([
            'description'   => 'Frecuencia Cardiaca (FC)',
        ]);

        $tipo = Tipo::create([
            'description'   => 'Habitus exterior',
        ]);

        $tipo = Tipo::create([
            'description'   => 'Cabeza y cuello',
        ]);

        $tipo = Tipo::create([
            'description'   => 'Torax',
        ]);

        $tipo = Tipo::create([
            'description'   => 'Abdomen',
        ]);

        $tipo = Tipo::create([
            'description'   => 'Extremidades',
        ]);

        $tipo = Tipo::create([
            'description'   => 'Urogenital',
        ]);

        /* Se pueden agregar un dato para sincronizarlo con todos los tipos y actualizar sus registros o datos */
        
    }
}
