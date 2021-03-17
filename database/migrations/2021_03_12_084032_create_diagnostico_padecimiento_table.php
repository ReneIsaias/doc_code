<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosticoPadecimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnostico_padecimiento', function (Blueprint $table) {
            $table->id();

            $table->foreignId('diagnostico_id')->references('id')->on('diagnosticos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('padecimiento_id')->references('id')->on('padecimientos')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('diagnostico_padecimiento');
    }
}
