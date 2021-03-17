<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentarioDiagnosticoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario_diagnostico', function (Blueprint $table) {
            $table->id();

            $table->foreignId('comentario_id')->references('id')->on('comentarios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('diagnostico_id')->references('id')->on('diagnosticos')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('comentario_diagnostico');
    }
}
