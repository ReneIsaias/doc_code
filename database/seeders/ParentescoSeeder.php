<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Parentesco;

class ParentescoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parentesco = Parentesco::create([
            'description'   => 'Madre',
        ]);

        $parentesco = Parentesco::create([
            'description'   => 'Padre',
        ]);

        $parentesco = Parentesco::create([
            'description'   => 'Hermano',
        ]);

        $parentesco = Parentesco::create([
            'description'   => 'Hermana',
        ]);

        $parentesco = Parentesco::create([
            'description'   => 'Abuelo',
        ]);

        $parentesco = Parentesco::create([
            'description'   => 'Abuela',
        ]);
    }
}
