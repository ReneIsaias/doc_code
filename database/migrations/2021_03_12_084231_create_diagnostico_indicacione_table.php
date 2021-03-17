<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosticoIndicacioneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnostico_indicacione', function (Blueprint $table) {
            $table->id();

            $table->foreignId('diagnostico_id')->references('id')->on('diagnosticos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('indicacione_id')->references('id')->on('indicaciones')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('diagnostico_indicacione');
    }
}
