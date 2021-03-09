<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historiales', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('historia_id')->references('id')->on('historias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('enfermedade_id')->references('id')->on('enfermedades')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('unidade_id')->references('id')->on('unidades')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('revisione_id')->references('id')->on('revisiones')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('historiales');
    }
}
