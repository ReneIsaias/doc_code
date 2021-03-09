<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historias', function (Blueprint $table) {
            $table->id();

            $table->string('noexpediente')->unique();
            $table->date('fecha');
            $table->integer('edad');
            $table->string('sexo');
            $table->string('estadocivil');
            $table->string('domicilio');
            $table->string('ocupacion');
            $table->string('escolaridad');

            $table->boolean('estado')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historias');
    }
}
