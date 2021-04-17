<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntecedenteEnfermedadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedente_enfermedade', function (Blueprint $table) {
            $table->id();

            $table->foreignId('antecedente_id')->references('id')->on('antecedentes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('enfermedade_id')->references('id')->on('enfermedades')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('antecedente_enfermedade');
    }
}
