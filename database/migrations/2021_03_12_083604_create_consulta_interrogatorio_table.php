<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultaInterrogatorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulta_interrogatorio', function (Blueprint $table) {
            $table->id();

            $table->foreignId('consulta_id')->references('id')->on('consultas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('interrogatorios_id')->references('id')->on('interrogatorios')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('consulta_interrogatorio');
    }
}
