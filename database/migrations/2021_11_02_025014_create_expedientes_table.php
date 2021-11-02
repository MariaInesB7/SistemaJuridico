<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_Cliente');
            $table->string('causa');
            $table->string('codigo');
            $table->string('proceso');
            $table->string('demandante');
            $table->string('demandado');
            $table->string('tribunal')->nullable();
            $table->string('juez')->nullable();
            $table->string('secretario');
            $table->string('fecha');
            $table->string('hora');
            $table->foreign('id_Cliente')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('expedientes');
    }
}
