<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAparatoInterrogatorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aparato_interrogatorio', function (Blueprint $table) {
            $table->id();

            $table->foreignId('aparato_id')->references('id')->on('aparatos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('interrogatorio_id')->references('id')->on('interrogatorios')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('aparato_interrogatorio');
    }
}
