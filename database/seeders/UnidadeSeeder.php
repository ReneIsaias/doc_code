<?php

namespace Database\Seeders;
use App\Models\Unidade;

use Illuminate\Database\Seeder;

class UnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unidades = Unidade::create([
            'rfc'           => 'unidad1',
            'name'          => 'Unidad numero uno',
            'description'   => 'Es la unidad numero uno que esta disponible 24/7 horas todos los dias, en caso de emergencia',
            'cp'            => '54385',
            'address'       => 'Jilotepec  de La merced, Avenida principal, localidad La Merced a un lado del mercado',
        ]);

        $unidades = Unidade::create([
            'rfc'           => 'unidad2',
            'name'          => 'Unidad numero dos',
            'description'   => 'Es la unidad numero dos encargada de atender a todas las personas que sufren accidentes de emergencia',
            'cp'            => '54385',
            'address'       => 'Jilotepec  de El centro, Calle Matamoros, numero 13, pizo 2',
        ]);

        $unidades = Unidade::create([
            'rfc'           => 'unida3',
            'name'          => 'Unidad numero tres',
            'description'   => 'Es la unidad numero tres que se especializa en atender a todos los casos de Coranavirus',
            'cp'            => '54385',
            'address'       => 'Canalejas  de Doxhicho, le Magdalena, numero 44 enfrente de la iglesia',
        ]);

        $unidades = Unidade::create([
            'rfc'           => 'unidad4',
            'name'          => 'Unidad numero cuatro',
            'description'   => 'Es la unidad numero cuatro en donde hacen los mejores rayos X',
            'cp'            => '54385',
            'address'       => 'Chapa de Mota  de El corral, le municpal, numero 12, atras de un restaurante',
        ]);
    }
}
