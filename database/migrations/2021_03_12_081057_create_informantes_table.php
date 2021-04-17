<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informantes', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('lastnames');
            $table->string('phone');
            $table->boolean('status')->default(true);
            $table->foreignId('parentesco_id')->references('id')->on('parentescos')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('informantes');
    }
}
