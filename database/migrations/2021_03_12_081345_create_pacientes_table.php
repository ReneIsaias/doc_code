<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();

            $table->string('curp')->unique();
            $table->string('name');
            $table->string('lastnames')->nullable();
            $table->integer('age');
            $table->date('birthday');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('sexo');
            $table->text('address');
            $table->foreignId('escolaridade_id')->references('id')->on('escolaridades')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('ocupacione_id')->references('id')->on('ocupaciones')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('estado_id')->references('id')->on('estados')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('grupo_id')->references('id')->on('grupos')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('pacientes');
    }
}
