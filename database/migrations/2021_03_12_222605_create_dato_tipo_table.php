<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatoTipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dato_tipo', function (Blueprint $table) {
            $table->id();

            $table->foreignId('dato_id')->references('id')->on('datos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('tipo_id')->references('id')->on('tipos')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('dato_tipo');
    }
}
