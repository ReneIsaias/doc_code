<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformantePacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informante_paciente', function (Blueprint $table) {
            $table->id();

            $table->foreignId('informante_id')->references('id')->on('informantes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('paciente_id')->references('id')->on('pacientes')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('informante_paciente');
    }
}
