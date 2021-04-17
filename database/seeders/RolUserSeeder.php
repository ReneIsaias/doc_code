<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\User;

class RolUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        DB::table('role_user')->truncate();
        Role::truncate();
        DB::statement("SET foreign_key_checks=1");

        $useradmin = User::where('email', 'admin@admin.com')->first();
        if ($useradmin) {
            $useradmin->delete();
        }
        $useradmin = User::create([
            'name'              => 'Administrador',
            'email'             => 'admin@admin.com',
            'password'          => Hash::make('maquiabelico'),
        ]);

        $roladmin = Role::create([
            'name'            => 'Administrador',
            'description'     => 'Rol para el usuario administrador',
        ]);

        $useradmin->roles()->sync([$roladmin->id]);

        $roldoctor = Role::create([
            'name'            => 'Doctor',
            'description'     => 'Rol designado para los doctores',
        ]);

        $rolpacie = Role::create([
            'name'            => 'Paciente',
            'description'     => 'Rol designado para los pacientes',
        ]);
    }
}
