<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefiendesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defiendes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_Abg');
            $table->unsignedBigInteger('id_Exp');
            $table->string('fecha');
            $table->foreign('id_Abg')->references('id')->on('abogados')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_Exp')->references('id')->on('expedientes')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('defiendes');
    }
}
