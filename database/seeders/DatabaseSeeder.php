<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DatoSeeder::class);

        $this->call(EnfermedadeSeeder::class);

        $this->call(EscolaridadeSeeder::class);

        $this->call(EspecialidadeSeeder::class);

        $this->call(EstadoSeeder::class);

        $this->call(GrupoSeeder::class);

        $this->call(InterrogatorioSeeder::class);

        $this->call(OcupacioneSeeder::class);

        $this->call(ParentescoSeeder::class);

        $this->call(RolUserSeeder::class);

        $this->call(UnidadeSeeder::class);
    }
}
