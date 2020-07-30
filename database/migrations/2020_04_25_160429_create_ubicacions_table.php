<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUbicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicacion', function (Blueprint $table) {
            $table->increments('id_ubicacion');
            $table->string('activo',300);
            $table->string('foto',300);
            $table->integer('usr_id');
            $table->foreing('usr_id')->references('id_usr')->on('usr')->onDelete('cascade');
            $table->integer('id_disp')->unsigned();
            $table->foreign('id_disp')-> references('id_sensor')->on('sensor')->onDelete('cascade');
            $table->integer('via_id');
            $table->foreign('via_id')-> references('id_via')->on('via')->onDelete('cascade');
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
        Schema::dropIfExists('ubicacions');
    }
}
