<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('idStudent');
            $table->unsignedBigInteger('idCost');

            $table->foreign('idStudent')    // agregando ala referencia a la tabla "alumnos"
                ->references('id')
                ->on('alumnos');

            $table->foreign('idCost')   // agregando ala referencia a la tabla "precios"
                ->references('id')
                ->on('precios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
