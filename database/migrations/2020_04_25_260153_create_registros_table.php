<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro', function (Blueprint $table) {
            $table->increments('contar');
            $table->datetime('fecha');
            $table->datetime('hora');
            $table->integer('numcarril');
            $table->integer('distan');
            $table->integer('ejes');
            $table->integer('id_ubic')->unsigned();
            $table->foreign('id_ubic')-> references('id_ubicacion')->on('ubicacion')->onDelete('cascade');
            $table->integer('id_veh')->unsigned();
            $table->foreign('id_veh')-> references('id_tipo')-> on('vehiculo')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('registros');
    }
}
